<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Product;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class InvoiceController extends Controller
{
    /**
     * Liste des factures.
     */
    public function index()
    {
        $invoices = Invoice::with([
            'user',
            'client',
            'items',
        ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.invoices.index',
            compact('invoices')
        );
    }


    /**
     * Afficher une facture.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load([
            'user',
            'client',
            'items',
        ]);

        return view(
            'admin.invoices.show',
            compact('invoice')
        );
    }


    /**
     * Valider une facture.
     */
    public function validateInvoice(Invoice $invoice)
    {
        try {

            DB::transaction(
                function () use ($invoice) {

                    /*
                    |--------------------------------------------------------------------------
                    | VERROUILLER LA FACTURE
                    |--------------------------------------------------------------------------
                    */

                    $lockedInvoice = Invoice::whereKey(
                        $invoice->id
                    )
                        ->lockForUpdate()
                        ->firstOrFail();


                    /*
                    |--------------------------------------------------------------------------
                    | VÉRIFIER LE STATUT
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $lockedInvoice->status !==
                        'EN_ATTENTE'
                    ) {
                        throw new DomainException(
                            'Cette facture a déjà été traitée.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | CHARGER LES LIGNES
                    |--------------------------------------------------------------------------
                    */

                    $lockedInvoice->load([
                        'items',
                    ]);


                    if ($lockedInvoice->items->isEmpty()) {

                        throw new DomainException(
                            'Cette facture ne contient aucun produit.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | VÉRIFIER CHAQUE PRODUIT
                    |--------------------------------------------------------------------------
                    |
                    | Les produits sont maintenant saisis manuellement
                    | dans la facture avec product_name.
                    |
                    | On cherche donc le produit dans le catalogue
                    | en utilisant son nom.
                    |
                    */

                    foreach (
                        $lockedInvoice->items
                        as $item
                    ) {

                        $productName = trim(
                            (string) $item->product_name
                        );


                        if ($productName === '') {

                            throw new DomainException(
                                'Une ligne de la facture ne contient pas de nom de produit.'
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | RECHERCHER LE PRODUIT PAR NOM
                        |--------------------------------------------------------------------------
                        */

                        $product = Product::whereRaw(
                            'LOWER(name) = ?',
                            [
                                mb_strtolower(
                                    $productName
                                )
                            ]
                        )->first();


                        /*
                        |--------------------------------------------------------------------------
                        | PRODUIT INTROUVABLE
                        |--------------------------------------------------------------------------
                        */

                        if (!$product) {

                            throw new DomainException(
                                'Le produit "' .
                                $productName .
                                '" n’existe pas dans le catalogue.'
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | DISPONIBILITÉ
                        |--------------------------------------------------------------------------
                        */

                        if (
                            $product->availability !==
                            'EN_STOCK'
                        ) {

                            throw new DomainException(
                                'Le produit "' .
                                $productName .
                                '" est actuellement en rupture de stock.'
                            );
                        }
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | VALIDER LA FACTURE
                    |--------------------------------------------------------------------------
                    */

                    $lockedInvoice->update([
                        'status' =>
                            'VALIDEE',

                        'admin_note' =>
                            null,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | NOTIFICATION UTILISATEUR
                    |--------------------------------------------------------------------------
                    */

                    Notification::create([
                        'user_id' =>
                            $lockedInvoice->user_id,

                        'invoice_id' =>
                            $lockedInvoice->id,

                        'message' =>
                            'Votre facture #' .
                            $lockedInvoice->id .
                            ' a été validée par l’administrateur.',

                        'is_read' =>
                            false,
                    ]);

                }
            );


            return redirect()
                ->route(
                    'admin.invoices.show',
                    $invoice
                )
                ->with(
                    'success',
                    'La facture #' .
                    $invoice->id .
                    ' a été validée avec succès.'
                );

        } catch (DomainException $e) {

            return redirect()
                ->route(
                    'admin.invoices.show',
                    $invoice
                )
                ->with(
                    'error',
                    $e->getMessage()
                );

        } catch (Throwable $e) {

            report($e);


            return redirect()
                ->route(
                    'admin.invoices.show',
                    $invoice
                )
                ->with(
                    'error',
                    'Une erreur est survenue pendant la validation de la facture.'
                );
        }
    }


    /**
     * Refuser une facture.
     */
    public function refuseInvoice(
        Request $request,
        Invoice $invoice
    ) {

        $validated = $request->validate(
            [
                'admin_note' => [
                    'required',
                    'string',
                    'max:1000',
                ],
            ],
            [
                'admin_note.required' =>
                    'Veuillez indiquer la raison du refus.',

                'admin_note.string' =>
                    'La raison du refus doit être un texte.',

                'admin_note.max' =>
                    'La raison du refus ne doit pas dépasser 1000 caractères.',
            ]
        );


        try {

            DB::transaction(
                function () use (
                    $invoice,
                    $validated
                ) {

                    /*
                    |--------------------------------------------------------------------------
                    | VERROUILLER LA FACTURE
                    |--------------------------------------------------------------------------
                    */

                    $lockedInvoice = Invoice::whereKey(
                        $invoice->id
                    )
                        ->lockForUpdate()
                        ->firstOrFail();


                    /*
                    |--------------------------------------------------------------------------
                    | VÉRIFIER LE STATUT
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $lockedInvoice->status !==
                        'EN_ATTENTE'
                    ) {

                        throw new DomainException(
                            'Cette facture a déjà été traitée.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | REFUSER
                    |--------------------------------------------------------------------------
                    */

                    $lockedInvoice->update([
                        'status' =>
                            'REFUSEE',

                        'admin_note' =>
                            $validated['admin_note'],
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | NOTIFICATION UTILISATEUR
                    |--------------------------------------------------------------------------
                    */

                    Notification::create([
                        'user_id' =>
                            $lockedInvoice->user_id,

                        'invoice_id' =>
                            $lockedInvoice->id,

                        'message' =>
                            'Votre facture #' .
                            $lockedInvoice->id .
                            ' a été refusée. Raison : ' .
                            $validated['admin_note'],

                        'is_read' =>
                            false,
                    ]);

                }
            );


            return redirect()
                ->route(
                    'admin.invoices.show',
                    $invoice
                )
                ->with(
                    'success',
                    'La facture #' .
                    $invoice->id .
                    ' a été refusée.'
                );

        } catch (DomainException $e) {

            return redirect()
                ->route(
                    'admin.invoices.show',
                    $invoice
                )
                ->with(
                    'error',
                    $e->getMessage()
                );

        } catch (Throwable $e) {

            report($e);


            return redirect()
                ->route(
                    'admin.invoices.show',
                    $invoice
                )
                ->with(
                    'error',
                    'Une erreur est survenue pendant le refus de la facture.'
                );
        }
    }
}