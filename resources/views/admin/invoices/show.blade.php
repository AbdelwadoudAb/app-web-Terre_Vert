<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Facture #{{ $invoice->id }} | Terre Verte
    </title>


    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap"
        rel="stylesheet"
    >


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    <style>

        body {
            font-family: 'DM Sans', sans-serif;
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }


        @media print {

            @page {
                size: A4;
                margin: 10mm;
            }

            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
            }

            main {
                max-width: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .invoice-paper {
                width: 100% !important;
                max-width: none !important;
                border: none !important;
                border-radius: 0 !important;
                box-shadow: none !important;
            }

        }

    </style>

</head>


<body
    class="flex min-h-screen flex-col bg-[#F7F4E8] text-[#263A30]"
>


{{-- ========================================================= --}}
{{-- HEADER ADMIN --}}
{{-- ========================================================= --}}

<header
    class="no-print border-b border-[#e5dfcf] bg-white"
>

    <div
        class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4"
    >

        {{-- LOGO --}}
        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3"
        >

            <img
                src="{{ asset('images/logo-terre-verte.png') }}"
                alt="Terre Verte"
                class="h-12 w-auto"
            >

            <div>

                <h1
                    class="font-playfair text-xl font-bold text-[#245B45]"
                >
                    Terre Verte
                </h1>

                <p
                    class="text-xs text-gray-500"
                >
                    Espace Administrateur
                </p>

            </div>

        </a>



        {{-- NAVIGATION --}}
        <div
            class="flex items-center gap-3"
        >

            <a
                href="{{ route('admin.invoices.index') }}"
                class="hidden rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7] sm:inline-flex"
            >
                Factures
            </a>


            <a
                href="{{ route('admin.dashboard') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
            >
                Tableau de bord
            </a>


            <a
                href="{{ route('admin.notifications.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
            >
                Notifications
            </a>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="rounded-xl bg-[#245B45] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#194936]"
                >
                    Déconnexion
                </button>

            </form>

        </div>

    </div>

</header>



{{-- ========================================================= --}}
{{-- CONTENU --}}
{{-- ========================================================= --}}

<main
    class="mx-auto w-full max-w-6xl flex-1 px-6 py-8"
>


    {{-- ========================================================= --}}
    {{-- ACTIONS HAUT --}}
    {{-- ========================================================= --}}

    <div
        class="no-print mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
    >

        <a
            href="{{ route('admin.invoices.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-[#245B45] bg-white px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
        >
            Retour aux factures
        </a>


        <button
            type="button"
            onclick="window.print()"
            class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
        >
            Imprimer / PDF
        </button>

    </div>



    {{-- ========================================================= --}}
    {{-- MESSAGE SUCCÈS --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="no-print mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- MESSAGE ERREUR --}}
    {{-- ========================================================= --}}

    @if(session('error'))

        <div
            class="no-print mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 font-semibold text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- ERREURS VALIDATION --}}
    {{-- ========================================================= --}}

    @if($errors->any())

        <div
            class="no-print mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4"
        >

            <p
                class="font-bold text-red-700"
            >
                Veuillez corriger les erreurs suivantes :
            </p>

            <ul
                class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600"
            >

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- FACTURE --}}
    {{-- ========================================================= --}}

    <section
        class="invoice-paper overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >


        {{-- ========================================================= --}}
        {{-- EN-TÊTE --}}
        {{-- ========================================================= --}}

        <div
            class="relative overflow-hidden border-b border-gray-100 px-8 py-8 md:px-10"
        >

            <div
                class="absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#F5D85F]/25"
            ></div>


            <div
                class="relative flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between"
            >


                {{-- ENTREPRISE --}}
                <div
                    class="flex items-center gap-4"
                >

                    <img
                        src="{{ asset('images/logo-terre-verte.png') }}"
                        alt="Terre Verte"
                        class="h-16 w-auto"
                    >

                    <div>

                        <h1
                            class="font-playfair text-3xl font-bold text-[#245B45]"
                        >
                            Terre Verte
                        </h1>

                        <p
                            class="mt-1 text-xs font-bold uppercase tracking-[0.18em] text-[#789383]"
                        >
                            Agriculture & produits naturels
                        </p>

                    </div>

                </div>



                {{-- NUMÉRO --}}
                <div
                    class="relative z-10 sm:text-right"
                >

                    <p
                        class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400"
                    >
                        Facture
                    </p>

                    <p
                        class="mt-2 text-2xl font-black text-[#245B45]"
                    >
                        #{{ str_pad(
                            $invoice->id,
                            5,
                            '0',
                            STR_PAD_LEFT
                        ) }}
                    </p>

                    <p
                        class="mt-2 text-sm text-gray-500"
                    >
                        {{ $invoice->created_at?->format('d/m/Y à H:i') ?? '—' }}
                    </p>

                </div>

            </div>



            <div
                class="relative mt-8"
            >

                <h2
                    class="font-playfair text-4xl font-bold text-[#1F3A2D]"
                >
                    Détail de la facture
                </h2>

                <div
                    class="mt-3 h-1 w-20 rounded-full bg-[#F5D85F]"
                ></div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- CLIENT / UTILISATEUR / STATUT --}}
        {{-- ========================================================= --}}

        <div
            class="grid gap-6 bg-[#F7F4E8] px-8 py-7 md:grid-cols-3 md:px-10"
        >


            {{-- CLIENT --}}
            <div>

                <p
                    class="text-xs font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Client
                </p>


                <h3
                    class="mt-3 text-xl font-black text-[#1F3A2D]"
                >
                    {{ $invoice->client?->name ?? 'Client indisponible' }}
                </h3>


                @if($invoice->client)

                    <div
                        class="mt-3 space-y-2 text-sm text-gray-500"
                    >

                        @if($invoice->client->cin)

                            <p>
                                <span class="font-bold text-[#1F3A2D]">
                                    CIN :
                                </span>

                                {{ $invoice->client->cin }}
                            </p>

                        @endif


                        <p>

                            <span class="font-bold text-[#1F3A2D]">
                                Téléphone :
                            </span>

                            {{ $invoice->client->phone ?? '—' }}

                        </p>


                        <p>

                            <span class="font-bold text-[#1F3A2D]">
                                E-mail :
                            </span>

                            {{ $invoice->client->email ?? '—' }}

                        </p>


                        <p>

                            <span class="font-bold text-[#1F3A2D]">
                                Adresse :
                            </span>

                            {{ $invoice->client->address ?? '—' }}

                        </p>

                    </div>

                @endif

            </div>



            {{-- UTILISATEUR --}}
            <div>

                <p
                    class="text-xs font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Créée par
                </p>

                <h3
                    class="mt-3 font-black text-[#1F3A2D]"
                >
                    {{ $invoice->user?->name ?? 'Utilisateur indisponible' }}
                </h3>

                <p
                    class="mt-2 text-sm text-gray-500"
                >
                    {{ $invoice->user?->email ?? '—' }}
                </p>

            </div>



            {{-- STATUT --}}
            <div
                class="md:text-right"
            >

                <p
                    class="mb-3 text-xs font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Statut
                </p>


                @switch($invoice->status)


                    @case('VALIDEE')

                        <span
                            class="inline-flex rounded-full bg-green-100 px-5 py-2.5 text-sm font-black text-green-700"
                        >
                            Validée
                        </span>

                        @break



                    @case('REFUSEE')

                        <span
                            class="inline-flex rounded-full bg-red-100 px-5 py-2.5 text-sm font-black text-red-700"
                        >
                            Refusée
                        </span>

                        @break



                    @case('EN_ATTENTE')

                        <span
                            class="inline-flex rounded-full bg-yellow-100 px-5 py-2.5 text-sm font-black text-yellow-700"
                        >
                            En attente
                        </span>

                        @break



                    @default

                        <span
                            class="inline-flex rounded-full bg-gray-100 px-5 py-2.5 text-sm font-black text-gray-600"
                        >
                            {{ $invoice->status ?? 'Inconnu' }}
                        </span>

                @endswitch

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- NOTE DE REFUS EXISTANTE --}}
        {{-- ========================================================= --}}

        @if(
            $invoice->status === 'REFUSEE'
            && $invoice->admin_note
        )

            <div
                class="mx-8 mt-7 rounded-2xl border border-red-200 bg-red-50 p-6 md:mx-10"
            >

                <p
                    class="text-sm font-black uppercase tracking-wide text-red-700"
                >
                    Raison du refus
                </p>

                <p
                    class="mt-3 whitespace-pre-line text-sm leading-6 text-red-700"
                >
                    {{ $invoice->admin_note }}
                </p>

            </div>

        @endif



        {{-- ========================================================= --}}
        {{-- PRODUITS --}}
        {{-- ========================================================= --}}

        <div
            class="px-8 py-8 md:px-10"
        >

            <div
                class="mb-5"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Produits
                </p>

                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Détail des articles
                </h3>

            </div>



            <div
                class="overflow-x-auto rounded-2xl border border-[#e7e2d3]"
            >

                <table
                    class="w-full min-w-[700px]"
                >

                    <thead
                        class="bg-[#245B45] text-left text-sm text-white"
                    >

                        <tr>

                            <th class="px-5 py-4">
                                Produit
                            </th>

                            <th class="px-5 py-4 text-center">
                                Quantité
                            </th>

                            <th class="px-5 py-4 text-right">
                                Prix unitaire
                            </th>

                            <th class="px-5 py-4 text-right">
                                Total
                            </th>

                        </tr>

                    </thead>



                    <tbody>

                        @forelse($invoice->items as $item)

                            @php

                                /*
                                |--------------------------------------------------------------------------
                                | NOM DU PRODUIT
                                |--------------------------------------------------------------------------
                                |
                                | Compatible avec :
                                | - anciennes lignes : product_name
                                | - nouvelles lignes : relation product
                                |
                                */

                                $productName =
                                    $item->product_name
                                    ?? $item->product?->name
                                    ?? 'Produit indisponible';


                                /*
                                |--------------------------------------------------------------------------
                                | PRIX
                                |--------------------------------------------------------------------------
                                |
                                | Compatible avec :
                                | - price
                                | - unit_price
                                |
                                */

                                $itemPrice =
                                    $item->price
                                    ?? $item->unit_price
                                    ?? 0;


                                /*
                                |--------------------------------------------------------------------------
                                | TOTAL LIGNE
                                |--------------------------------------------------------------------------
                                */

                                $itemTotal =
                                    $item->total
                                    ?? (
                                        (float) $item->quantity
                                        * (float) $itemPrice
                                    );

                            @endphp


                            <tr
                                class="border-b border-gray-100 last:border-0"
                            >

                                {{-- PRODUIT --}}
                                <td
                                    class="px-5 py-5"
                                >

                                    <p
                                        class="font-bold text-[#1F3A2D]"
                                    >
                                        {{ $productName }}
                                    </p>


                                    @if($item->product?->availability)

                                        <p
                                            class="mt-1 text-xs text-gray-400"
                                        >
                                            Disponibilité :
                                            {{ $item->product->availability === 'EN_STOCK'
                                                ? 'En stock'
                                                : 'Rupture' }}
                                        </p>

                                    @endif

                                </td>



                                {{-- QUANTITÉ --}}
                                <td
                                    class="px-5 py-5 text-center text-gray-600"
                                >
                                    {{ number_format(
                                        (float) $item->quantity,
                                        0,
                                        ',',
                                        ' '
                                    ) }}
                                </td>



                                {{-- PRIX --}}
                                <td
                                    class="px-5 py-5 text-right text-gray-600"
                                >
                                    {{ number_format(
                                        (float) $itemPrice,
                                        2,
                                        ',',
                                        ' '
                                    ) }}
                                    DH
                                </td>



                                {{-- TOTAL --}}
                                <td
                                    class="px-5 py-5 text-right font-black text-[#245B45]"
                                >
                                    {{ number_format(
                                        (float) $itemTotal,
                                        2,
                                        ',',
                                        ' '
                                    ) }}
                                    DH
                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-5 py-12 text-center text-gray-400"
                                >
                                    Aucun produit dans cette facture.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- TOTAL + PAIEMENT --}}
        {{-- ========================================================= --}}

        <div
            class="grid gap-8 border-t border-gray-100 px-8 py-8 md:grid-cols-2 md:px-10"
        >


            {{-- MODE DE PAIEMENT --}}
            <div
                class="rounded-2xl bg-[#F7F4E8] p-6"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Mode de paiement
                </p>

                <p
                    class="mt-3 font-black text-[#1F3A2D]"
                >
                    Paiement à la livraison
                </p>

                <p
                    class="mt-2 max-w-md text-sm leading-6 text-gray-500"
                >
                    Le règlement est effectué directement
                    lors de la réception du produit.
                    Aucun paiement en ligne n'est réalisé
                    dans l'application.
                </p>

            </div>



            {{-- TOTAL --}}
            <div>

                <div
                    class="flex items-center justify-between border-b border-gray-200 py-3"
                >

                    <span
                        class="text-gray-500"
                    >
                        Sous-total
                    </span>

                    <span
                        class="font-bold text-gray-700"
                    >
                        {{ number_format(
                            (float) $invoice->total,
                            2,
                            ',',
                            ' '
                        ) }}
                        DH
                    </span>

                </div>


                <div
                    class="mt-4 flex items-center justify-between rounded-xl bg-[#F5D85F] px-5 py-4"
                >

                    <span
                        class="text-lg font-black text-[#1F3A2D]"
                    >
                        TOTAL
                    </span>

                    <span
                        class="text-2xl font-black text-[#245B45]"
                    >
                        {{ number_format(
                            (float) $invoice->total,
                            2,
                            ',',
                            ' '
                        ) }}
                        DH
                    </span>

                </div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- ACTIONS ADMIN --}}
        {{-- ========================================================= --}}

        <div
            id="refus"
            class="no-print border-t border-gray-100 bg-[#faf9f4] px-8 py-7 md:px-10"
        >

            <div
                class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Administration
                    </p>

                    <h3
                        class="font-playfair mt-1 text-xl font-bold text-[#1F3A2D]"
                    >
                        Validation administrative
                    </h3>

                    <p
                        class="mt-2 max-w-lg text-sm leading-6 text-gray-500"
                    >
                        Vérifiez attentivement le client,
                        les produits, les quantités et le montant
                        avant de prendre une décision.
                    </p>

                </div>



                {{-- ========================================================= --}}
                {{-- EN ATTENTE --}}
                {{-- ========================================================= --}}

                @if($invoice->status === 'EN_ATTENTE')

                    <div
                        class="grid w-full gap-4 lg:max-w-xl"
                    >


                        {{-- VALIDER --}}
                        <form
                            method="POST"
                            action="{{ route(
                                'admin.invoices.validate',
                                $invoice
                            ) }}"
                            onsubmit="return confirm('Confirmer la validation de cette facture ?');"
                        >

                            @csrf
                            @method('PATCH')


                            <button
                                type="submit"
                                class="w-full rounded-xl bg-[#245B45] px-7 py-3.5 font-black text-white transition hover:bg-[#194936]"
                            >
                                Valider la facture
                            </button>

                        </form>



                        {{-- REFUSER --}}
                        <form
                            method="POST"
                            action="{{ route(
                                'admin.invoices.refuse',
                                $invoice
                            ) }}"
                            class="rounded-2xl border border-red-200 bg-red-50 p-5"
                        >

                            @csrf
                            @method('PATCH')


                            <label
                                for="admin_note"
                                class="mb-2 block text-sm font-black text-gray-700"
                            >
                                Raison du refus
                                <span class="text-red-500">*</span>
                            </label>


                            <p
                                class="mb-3 text-xs leading-5 text-gray-500"
                            >
                                Expliquez clairement pourquoi cette facture
                                ne peut pas être validée.
                            </p>


                            <textarea
                                id="admin_note"
                                name="admin_note"
                                rows="4"
                                maxlength="1000"
                                required
                                placeholder="Exemple : informations du client incorrectes, produit indisponible..."
                                class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100 @error('admin_note') border-red-400 @enderror"
                            >{{ old('admin_note') }}</textarea>


                            @error('admin_note')

                                <p
                                    class="mt-2 text-sm font-semibold text-red-600"
                                >
                                    {{ $message }}
                                </p>

                            @enderror


                            <div
                                class="mt-2 text-right text-xs text-gray-400"
                            >
                                Maximum 1000 caractères
                            </div>


                            <button
                                type="submit"
                                onclick="return confirm('Voulez-vous vraiment refuser cette facture ?');"
                                class="mt-4 w-full rounded-xl bg-red-600 px-7 py-3.5 font-black text-white transition hover:bg-red-700"
                            >
                                Refuser la facture
                            </button>

                        </form>

                    </div>



                {{-- ========================================================= --}}
                {{-- VALIDÉE --}}
                {{-- ========================================================= --}}

                @elseif($invoice->status === 'VALIDEE')

                    <div
                        class="w-full rounded-2xl border border-green-200 bg-green-50 p-6 lg:max-w-md"
                    >

                        <p
                            class="font-black text-green-700"
                        >
                            Facture validée
                        </p>

                        <p
                            class="mt-2 text-sm leading-6 text-green-700"
                        >
                            Cette facture a déjà été traitée
                            et validée par l'administration.
                        </p>

                    </div>



                {{-- ========================================================= --}}
                {{-- REFUSÉE --}}
                {{-- ========================================================= --}}

                @elseif($invoice->status === 'REFUSEE')

                    <div
                        class="w-full rounded-2xl border border-red-200 bg-red-50 p-6 lg:max-w-md"
                    >

                        <p
                            class="font-black text-red-700"
                        >
                            Facture refusée
                        </p>

                        <p
                            class="mt-2 text-sm leading-6 text-red-700"
                        >
                            Cette facture a déjà été traitée.
                            La raison du refus est affichée
                            dans la facture.
                        </p>

                    </div>

                @endif

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- FOOTER FACTURE --}}
        {{-- ========================================================= --}}

        <div
            class="bg-[#245B45] px-8 py-6 text-white md:px-10"
        >

            <div
                class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
            >

                <div>

                    <p
                        class="font-playfair text-xl font-bold"
                    >
                        Terre Verte
                    </p>

                    <p
                        class="mt-1 text-xs text-green-100"
                    >
                        Nature • Qualité • Confiance
                    </p>

                </div>


                <img
                    src="{{ asset('images/logo-terre-verte.png') }}"
                    alt="Terre Verte"
                    class="h-12 w-auto object-contain"
                >

            </div>

        </div>


    </section>



    {{-- ========================================================= --}}
    {{-- ACCÈS RAPIDES --}}
    {{-- ========================================================= --}}

    <div
        class="no-print mt-6 flex flex-wrap gap-3"
    >

        <a
            href="{{ route('admin.invoices.index') }}"
            class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
        >
            Toutes les factures
        </a>


        <a
            href="{{ route('admin.dashboard') }}"
            class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
        >
            Tableau de bord
        </a>


        <a
            href="{{ route('admin.notifications.index') }}"
            class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
        >
            Notifications
        </a>

    </div>


</main>



{{-- ========================================================= --}}
{{-- FOOTER PAGE --}}
{{-- ========================================================= --}}

<footer
    class="no-print border-t border-[#e4dfd2] bg-white"
>

    <div
        class="mx-auto max-w-7xl px-6 py-3 text-center text-xs text-gray-500"
    >
        © {{ date('Y') }} Terre Verte — Administration
    </div>

</footer>


</body>

</html>