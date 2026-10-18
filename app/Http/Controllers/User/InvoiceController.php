<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class InvoiceController extends Controller
{
    /**
     * Liste des factures de l'utilisateur connecté.
     */
    public function index()
    {
        $invoices = Invoice::with([
            'client',
            'items',
        ])
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->get();

        return view(
            'user.invoices.index',
            compact('invoices')
        );
    }


    /**
     * Formulaire de création d'une facture.
     */
    public function create()
    {
        $clients = Client::where(
            'user_id',
            auth()->id()
        )
            ->latest()
            ->get();

        return view(
            'user.invoices.create',
            compact('clients')
        );
    }


    /**
     * Afficher une facture.
     */
    public function show(Invoice $invoice)
    {
        $this->authorizeInvoice(
            $invoice
        );

        $invoice->load([
            'client',
            'items',
        ]);

        return view(
            'user.invoices.show',
            compact('invoice')
        );
    }


    /**
     * Créer une nouvelle facture.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'client_id' => [
                    'required',
                    'integer',
                    'exists:clients,id',
                ],

                'items' => [
                    'required',
                    'array',
                    'min:1',
                ],

                'items.*.product_name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'items.*.unit_price' => [
                    'required',
                    'numeric',
                    'min:0.01',
                ],

                'items.*.quantity' => [
                    'required',
                    'numeric',
                    'min:0.01',
                ],
            ],
            [
                'client_id.required' =>
                    'Veuillez sélectionner un client.',

                'client_id.exists' =>
                    'Le client sélectionné est introuvable.',

                'items.required' =>
                    'Veuillez ajouter au moins un produit.',

                'items.min' =>
                    'Veuillez ajouter au moins un produit.',

                'items.*.product_name.required' =>
                    'Le nom du produit est obligatoire.',

                'items.*.product_name.max' =>
                    'Le nom du produit ne doit pas dépasser 255 caractères.',

                'items.*.unit_price.required' =>
                    'Le prix du produit est obligatoire.',

                'items.*.unit_price.numeric' =>
                    'Le prix doit être un nombre.',

                'items.*.unit_price.min' =>
                    'Le prix doit être supérieur à 0.',

                'items.*.quantity.required' =>
                    'La quantité est obligatoire.',

                'items.*.quantity.numeric' =>
                    'La quantité doit être un nombre.',

                'items.*.quantity.min' =>
                    'La quantité doit être supérieure à 0.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | VÉRIFIER LE CLIENT
        |--------------------------------------------------------------------------
        */

        $client = Client::where(
            'id',
            $validated['client_id']
        )
            ->where(
                'user_id',
                auth()->id()
            )
            ->firstOrFail();


        try {

            $invoice = DB::transaction(
                function () use (
                    $validated,
                    $client
                ) {

                    /*
                    |--------------------------------------------------------------------------
                    | PRÉPARER LES PRODUITS
                    |--------------------------------------------------------------------------
                    */

                    $invoiceTotal = 0;

                    $invoiceItems = [];


                    foreach (
                        $validated['items']
                        as $item
                    ) {

                        $productName =
                            trim(
                                $item['product_name']
                            );

                        $unitPrice =
                            round(
                                (float) $item['unit_price'],
                                2
                            );

                        $quantity =
                            (float) $item['quantity'];


                        $lineTotal =
                            round(
                                $unitPrice * $quantity,
                                2
                            );


                        $invoiceTotal +=
                            $lineTotal;


                        $invoiceItems[] = [
                            'product_name' =>
                                $productName,

                            'unit_price' =>
                                $unitPrice,

                            'quantity' =>
                                $quantity,
                        ];
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | TOTAL
                    |--------------------------------------------------------------------------
                    */

                    $invoiceTotal =
                        round(
                            $invoiceTotal,
                            2
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | CRÉER LA FACTURE
                    |--------------------------------------------------------------------------
                    */

                    $invoice = Invoice::create([
                        'user_id' =>
                            auth()->id(),

                        'client_id' =>
                            $client->id,

                        'total' =>
                            $invoiceTotal,

                        'status' =>
                            'EN_ATTENTE',

                        'admin_note' =>
                            null,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | CRÉER LES LIGNES
                    |--------------------------------------------------------------------------
                    */

                    foreach (
                        $invoiceItems
                        as $invoiceItem
                    ) {

                        $invoice
                            ->items()
                            ->create(
                                $invoiceItem
                            );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | ADMINISTRATEURS
                    |--------------------------------------------------------------------------
                    */

                    $admins = User::whereHas(
                        'role',
                        function ($query) {

                            $query->where(
                                'name',
                                'Administrateur'
                            );
                        }
                    )->get();


                    /*
                    |--------------------------------------------------------------------------
                    | NOTIFICATIONS ADMIN
                    |--------------------------------------------------------------------------
                    */

                    foreach (
                        $admins
                        as $admin
                    ) {

                        Notification::create([
                            'user_id' =>
                                $admin->id,

                            'invoice_id' =>
                                $invoice->id,

                            'message' =>
                                'Nouvelle facture #' .
                                $invoice->id .
                                ' créée par ' .
                                auth()->user()->name .
                                '.',

                            'is_read' =>
                                false,
                        ]);
                    }


                    return $invoice;
                }
            );


            /*
            |--------------------------------------------------------------------------
            | REDIRECTION
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'user.invoices.show',
                    $invoice
                )
                ->with(
                    'success',
                    'La facture #' .
                    $invoice->id .
                    ' a été créée avec succès et envoyée à l’administrateur.'
                );

        } catch (Throwable $e) {

            report($e);

            return back()
                ->withErrors([
                    'invoice' =>
                        'Une erreur est survenue lors de la création de la facture. Veuillez réessayer.',
                ])
                ->withInput();
        }
    }


    /**
     * Vérifier que la facture appartient
     * à l'utilisateur connecté.
     */
    private function authorizeInvoice(
        Invoice $invoice
    ): void {

        abort_unless(
            (int) $invoice->user_id ===
            (int) auth()->id(),
            403
        );
    }
}