<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Liste des clients de l'utilisateur connecté.
     */
    public function index()
    {
        $clients = Client::where(
            'user_id',
            Auth::id()
        )
            ->latest()
            ->get();

        return view(
            'user.clients.index',
            compact('clients')
        );
    }


    /**
     * Formulaire de création d'un client.
     */
    public function create()
    {
        return view(
            'user.clients.create'
        );
    }


    /**
     * Enregistrer un nouveau client.
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
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'cin' => [
                    'nullable',
                    'string',
                    'max:50',
                ],

                'phone' => [
                    'required',
                    'string',
                    'max:30',
                ],

                'email' => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'address' => [
                    'required',
                    'string',
                ],
            ],
            [
                'name.required' =>
                    'Le nom du client est obligatoire.',

                'phone.required' =>
                    'Le numéro de téléphone est obligatoire.',

                'email.email' =>
                    'Veuillez saisir une adresse e-mail valide.',

                'address.required' =>
                    'L’adresse du client est obligatoire.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | UTILISATEUR CONNECTÉ
        |--------------------------------------------------------------------------
        */

        $validated['user_id'] =
            Auth::id();


        /*
        |--------------------------------------------------------------------------
        | CRÉER LE CLIENT
        |--------------------------------------------------------------------------
        */

        $client = Client::create(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | REDIRECTION VERS CRÉATION FACTURE
        |--------------------------------------------------------------------------
        |
        | Le client créé est envoyé dans l'URL avec client_id.
        | Il pourra donc être sélectionné automatiquement
        | dans le formulaire de création de facture.
        |
        */

        return redirect()
            ->route(
                'user.invoices.create',
                [
                    'client_id' => $client->id,
                ]
            )
            ->with(
                'success',
                'Client ajouté avec succès. Vous pouvez maintenant ajouter les produits à sa facture.'
            );
    }


    /**
     * Afficher un client.
     */
    public function show(Client $client)
    {
        $this->authorizeClient(
            $client
        );


        return view(
            'user.clients.show',
            compact('client')
        );
    }


    /**
     * Formulaire de modification.
     */
    public function edit(Client $client)
    {
        $this->authorizeClient(
            $client
        );


        return view(
            'user.clients.edit',
            compact('client')
        );
    }


    /**
     * Modifier un client.
     */
    public function update(
        Request $request,
        Client $client
    ) {
        /*
        |--------------------------------------------------------------------------
        | SÉCURITÉ
        |--------------------------------------------------------------------------
        */

        $this->authorizeClient(
            $client
        );


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'cin' => [
                    'nullable',
                    'string',
                    'max:50',
                ],

                'phone' => [
                    'required',
                    'string',
                    'max:30',
                ],

                'email' => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'address' => [
                    'required',
                    'string',
                ],
            ],
            [
                'name.required' =>
                    'Le nom du client est obligatoire.',

                'phone.required' =>
                    'Le numéro de téléphone est obligatoire.',

                'email.email' =>
                    'Veuillez saisir une adresse e-mail valide.',

                'address.required' =>
                    'L’adresse du client est obligatoire.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | MODIFICATION
        |--------------------------------------------------------------------------
        */

        $client->update(
            $validated
        );


        return redirect()
            ->route(
                'user.clients.index'
            )
            ->with(
                'success',
                'Client modifié avec succès.'
            );
    }


    /**
     * Supprimer un client.
     *
     * Supprime également :
     * - ses notifications liées aux factures
     * - ses lignes de factures
     * - ses factures
     */
    public function destroy(Client $client)
    {
        /*
        |--------------------------------------------------------------------------
        | SÉCURITÉ
        |--------------------------------------------------------------------------
        */

        $this->authorizeClient(
            $client
        );


        $userId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | TRANSACTION
        |--------------------------------------------------------------------------
        */

        DB::transaction(
            function () use (
                $client,
                $userId
            ) {

                /*
                |--------------------------------------------------------------------------
                | RÉCUPÉRER LES FACTURES DU CLIENT
                |--------------------------------------------------------------------------
                */

                $invoiceIds = Invoice::where(
                    'client_id',
                    $client->id
                )
                    ->where(
                        'user_id',
                        $userId
                    )
                    ->pluck('id');


                /*
                |--------------------------------------------------------------------------
                | SUPPRIMER LES DONNÉES ASSOCIÉES
                |--------------------------------------------------------------------------
                */

                if ($invoiceIds->isNotEmpty()) {

                    /*
                    | Notifications liées aux factures
                    */

                    Notification::whereIn(
                        'invoice_id',
                        $invoiceIds
                    )->delete();


                    /*
                    | Lignes des factures
                    */

                    InvoiceItem::whereIn(
                        'invoice_id',
                        $invoiceIds
                    )->delete();


                    /*
                    | Factures
                    */

                    Invoice::whereIn(
                        'id',
                        $invoiceIds
                    )
                        ->where(
                            'user_id',
                            $userId
                        )
                        ->delete();
                }


                /*
                |--------------------------------------------------------------------------
                | SUPPRIMER LE CLIENT
                |--------------------------------------------------------------------------
                */

                $client->delete();
            }
        );


        return redirect()
            ->route(
                'user.clients.index'
            )
            ->with(
                'success',
                'Client et toutes ses données associées supprimés avec succès.'
            );
    }


    /**
     * Vérifier que le client appartient
     * bien à l'utilisateur connecté.
     */
    private function authorizeClient(
        Client $client
    ): void {
        abort_unless(
            (int) $client->user_id ===
            (int) Auth::id(),
            403
        );
    }
}