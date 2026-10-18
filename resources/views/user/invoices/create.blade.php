<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Créer une facture | Terre Verte</title>

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

    </style>

</head>


<body class="flex min-h-screen flex-col bg-[#F7F4E8] text-[#263A30]">


@php

    $selectedClientId = old(
        'client_id',
        request('client_id')
    );

    $oldItems = old('items');

    if (
        !is_array($oldItems)
        || count($oldItems) === 0
    ) {
        $oldItems = [
            [
                'product_name' => '',
                'unit_price' => '',
                'quantity' => 1,
            ],
        ];
    }

@endphp



{{-- ========================================================= --}}
{{-- HEADER --}}
{{-- ========================================================= --}}

<header
    class="border-b border-[#e5dfcf] bg-white"
>

    <div
        class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4"
    >

        <a
            href="{{ route('user.dashboard') }}"
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

                <p class="text-xs text-gray-500">
                    Espace Utilisateur
                </p>

            </div>

        </a>


        <div class="flex items-center gap-3">

            <a
                href="{{ route('user.dashboard') }}"
                class="hidden rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7] sm:inline-flex"
            >
                Tableau de bord
            </a>


            <a
                href="{{ route('user.invoices.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
            >
                Mes factures
            </a>


            <a
                href="{{ route('user.clients.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
            >
                Mes clients
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
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <section
        class="relative overflow-hidden rounded-3xl bg-[#245B45] p-8 text-white md:p-10"
    >

        <div
            class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-white/5"
        ></div>

        <div
            class="absolute -bottom-24 -left-16 h-72 w-72 rounded-full bg-[#F5D85F]/10"
        ></div>


        <div class="relative">

            <p
                class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
            >
                Facturation
            </p>

            <h2
                class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
            >
                Créer une nouvelle facture
            </h2>

            <p
                class="mt-4 max-w-2xl leading-7 text-white/75"
            >
                Choisissez le client puis écrivez directement
                les produits, leurs prix et leurs quantités.
            </p>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MESSAGE SUCCÈS --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- ERREURS --}}
    {{-- ========================================================= --}}

    @if($errors->any())

        <div
            class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4"
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
    {{-- FORMULAIRE --}}
    {{-- ========================================================= --}}

    <form
        action="{{ route('user.invoices.store') }}"
        method="POST"
        class="mt-6 space-y-6"
    >

        @csrf



        {{-- ========================================================= --}}
        {{-- CLIENT --}}
        {{-- ========================================================= --}}

        <section
            class="rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Client
                </p>

                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Client de la facture
                </h3>

                <p
                    class="mt-2 text-sm text-gray-500"
                >
                    Sélectionnez le client concerné par cette facture.
                </p>

            </div>


            <div class="mt-6">

                <label
                    for="client_id"
                    class="mb-2 block text-sm font-bold text-[#1F3A2D]"
                >
                    Client
                </label>


                <div
                    class="flex flex-col gap-3 md:flex-row"
                >

                    <select
                        id="client_id"
                        name="client_id"
                        required
                        class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
                    >

                        <option value="">
                            Sélectionner un client
                        </option>


                        @foreach($clients as $client)

                            <option
                                value="{{ $client->id }}"
                                @selected(
                                    (string) $selectedClientId
                                    ===
                                    (string) $client->id
                                )
                            >
                                {{ $client->name }}

                                @if($client->phone)
                                    - {{ $client->phone }}
                                @endif

                            </option>

                        @endforeach

                    </select>


                    <a
                        href="{{ route('user.clients.create') }}"
                        class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                    >
                        Nouveau client
                    </a>

                </div>


                @error('client_id')

                    <p
                        class="mt-2 text-sm font-semibold text-red-600"
                    >
                        {{ $message }}
                    </p>

                @enderror

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- PRODUITS --}}
        {{-- ========================================================= --}}

        <section
            class="rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <div
                class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Produits
                    </p>

                    <h3
                        class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                    >
                        Produits de la facture
                    </h3>

                    <p
                        class="mt-2 text-sm text-gray-500"
                    >
                        Écrivez librement le nom du produit,
                        son prix et la quantité.
                    </p>

                </div>


                <button
                    type="button"
                    id="add-product"
                    class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                >
                    Ajouter un produit
                </button>

            </div>



            {{-- TITRES --}}
            <div
                class="mt-7 hidden grid-cols-12 gap-4 rounded-xl bg-[#F7F4E8] px-4 py-3 text-sm font-bold text-[#245B45] md:grid"
            >

                <div class="col-span-5">
                    Produit
                </div>

                <div class="col-span-2">
                    Prix
                </div>

                <div class="col-span-2">
                    Quantité
                </div>

                <div class="col-span-2">
                    Total
                </div>

                <div class="col-span-1">
                    Action
                </div>

            </div>



            {{-- LIGNES PRODUITS --}}
            <div
                id="products-container"
                class="mt-4 space-y-4"
            >

                @foreach($oldItems as $index => $item)

                    @php

                        $oldPrice =
                            (float) ($item['unit_price'] ?? 0);

                        $oldQuantity =
                            (float) ($item['quantity'] ?? 1);

                        $oldTotal =
                            $oldPrice * $oldQuantity;

                    @endphp


                    <div
                        class="product-row grid grid-cols-1 gap-4 rounded-2xl border border-gray-200 p-4 md:grid-cols-12 md:items-center"
                    >

                        {{-- PRODUIT --}}
                        <div class="md:col-span-5">

                            <label
                                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
                            >
                                Produit
                            </label>

                            <input
                                type="text"
                                name="items[{{ $index }}][product_name]"
                                value="{{ $item['product_name'] ?? '' }}"
                                required
                                placeholder="Exemple : Tomate"
                                class="product-name w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
                            >

                        </div>



                        {{-- PRIX --}}
                        <div class="md:col-span-2">

                            <label
                                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
                            >
                                Prix
                            </label>


                            <div class="relative">

                                <input
                                    type="number"
                                    name="items[{{ $index }}][unit_price]"
                                    value="{{ $item['unit_price'] ?? '' }}"
                                    min="0.01"
                                    step="0.01"
                                    required
                                    placeholder="0.00"
                                    class="product-price-input w-full rounded-xl border-gray-300 bg-white px-4 py-3 pr-12 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
                                >

                                <span
                                    class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400"
                                >
                                    DH
                                </span>

                            </div>

                        </div>



                        {{-- QUANTITÉ --}}
                        <div class="md:col-span-2">

                            <label
                                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
                            >
                                Quantité
                            </label>

                            <input
                                type="number"
                                name="items[{{ $index }}][quantity]"
                                value="{{ $item['quantity'] ?? 1 }}"
                                min="0.01"
                                step="0.01"
                                required
                                class="product-quantity w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
                            >

                        </div>



                        {{-- TOTAL --}}
                        <div class="md:col-span-2">

                            <label
                                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
                            >
                                Total
                            </label>

                            <div
                                class="product-total rounded-xl bg-[#F7F4E8] px-4 py-3 font-black text-[#245B45]"
                            >
                                {{ number_format(
                                    $oldTotal,
                                    2,
                                    ',',
                                    ' '
                                ) }}
                                DH
                            </div>

                        </div>



                        {{-- RETIRER --}}
                        <div class="md:col-span-1">

                            <button
                                type="button"
                                class="remove-product rounded-xl bg-red-50 px-3 py-3 text-sm font-bold text-red-600 transition hover:bg-red-100"
                            >
                                Retirer
                            </button>

                        </div>

                    </div>

                @endforeach

            </div>



            @error('items')

                <p
                    class="mt-4 text-sm font-semibold text-red-600"
                >
                    {{ $message }}
                </p>

            @enderror


            @error('items.*.product_name')

                <p
                    class="mt-4 text-sm font-semibold text-red-600"
                >
                    {{ $message }}
                </p>

            @enderror


            @error('items.*.unit_price')

                <p
                    class="mt-4 text-sm font-semibold text-red-600"
                >
                    {{ $message }}
                </p>

            @enderror


            @error('items.*.quantity')

                <p
                    class="mt-4 text-sm font-semibold text-red-600"
                >
                    {{ $message }}
                </p>

            @enderror

        </section>



        {{-- ========================================================= --}}
        {{-- RÉSUMÉ --}}
        {{-- ========================================================= --}}

        <section
            class="rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <div
                class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Résumé
                    </p>

                    <h3
                        class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                    >
                        Total de la facture
                    </h3>

                    <p
                        class="mt-2 text-sm text-gray-500"
                    >
                        Le montant est calculé automatiquement
                        selon le prix et la quantité de chaque produit.
                    </p>

                </div>


                <div
                    class="rounded-2xl bg-[#F7F4E8] px-8 py-5 text-right"
                >

                    <p
                        class="text-sm font-bold text-gray-500"
                    >
                        Total
                    </p>

                    <p
                        id="invoice-total"
                        class="mt-1 text-3xl font-black text-[#245B45]"
                    >
                        0,00 DH
                    </p>

                </div>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- INFORMATIONS --}}
        {{-- ========================================================= --}}

        <section
            class="grid gap-5 md:grid-cols-2"
        >

            <div
                class="rounded-3xl border border-[#e7e2d3] bg-white p-6"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Statut
                </p>

                <p
                    class="mt-3 font-black text-[#1F3A2D]"
                >
                    En attente
                </p>

                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Après sa création, la facture sera envoyée
                    à l'administrateur pour validation ou refus.
                </p>

            </div>


            <div
                class="rounded-3xl border border-[#e7e2d3] bg-white p-6"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Paiement
                </p>

                <p
                    class="mt-3 font-black text-[#1F3A2D]"
                >
                    Paiement à la livraison
                </p>

                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Aucun paiement en ligne n'est effectué
                    dans l'application.
                </p>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- ACTIONS --}}
        {{-- ========================================================= --}}

        <div
            class="flex flex-col gap-3 rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm sm:flex-row sm:items-center"
        >

            <button
                type="submit"
                class="rounded-xl bg-[#245B45] px-7 py-3.5 font-black text-white transition hover:bg-[#194936]"
            >
                Créer la facture
            </button>


            <a
                href="{{ route('user.invoices.index') }}"
                class="rounded-xl border border-gray-300 px-7 py-3.5 text-center font-bold text-gray-600 transition hover:bg-gray-50"
            >
                Annuler
            </a>

        </div>


    </form>


</main>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer
    class="border-t border-[#e4dfd2] bg-white"
>

    <div
        class="mx-auto max-w-7xl px-6 py-3 text-center text-xs text-gray-500"
    >
        © {{ date('Y') }} Terre Verte — Espace Utilisateur
    </div>

</footer>



{{-- ========================================================= --}}
{{-- TEMPLATE NOUVEAU PRODUIT --}}
{{-- ========================================================= --}}

<template id="product-row-template">

    <div
        class="product-row grid grid-cols-1 gap-4 rounded-2xl border border-gray-200 p-4 md:grid-cols-12 md:items-center"
    >

        <div class="md:col-span-5">

            <label
                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
            >
                Produit
            </label>

            <input
                type="text"
                class="product-name w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
                placeholder="Exemple : Tomate"
                required
            >

        </div>


        <div class="md:col-span-2">

            <label
                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
            >
                Prix
            </label>


            <div class="relative">

                <input
                    type="number"
                    class="product-price-input w-full rounded-xl border-gray-300 bg-white px-4 py-3 pr-12 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
                    min="0.01"
                    step="0.01"
                    placeholder="0.00"
                    required
                >

                <span
                    class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400"
                >
                    DH
                </span>

            </div>

        </div>


        <div class="md:col-span-2">

            <label
                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
            >
                Quantité
            </label>

            <input
                type="number"
                value="1"
                min="0.01"
                step="0.01"
                required
                class="product-quantity w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm focus:border-[#245B45] focus:ring-[#245B45]"
            >

        </div>


        <div class="md:col-span-2">

            <label
                class="mb-2 block text-xs font-bold text-gray-500 md:hidden"
            >
                Total
            </label>

            <div
                class="product-total rounded-xl bg-[#F7F4E8] px-4 py-3 font-black text-[#245B45]"
            >
                0,00 DH
            </div>

        </div>


        <div class="md:col-span-1">

            <button
                type="button"
                class="remove-product rounded-xl bg-red-50 px-3 py-3 text-sm font-bold text-red-600 transition hover:bg-red-100"
            >
                Retirer
            </button>

        </div>

    </div>

</template>



{{-- ========================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const container =
            document.getElementById(
                'products-container'
            );

        const addButton =
            document.getElementById(
                'add-product'
            );

        const template =
            document.getElementById(
                'product-row-template'
            );

        const invoiceTotal =
            document.getElementById(
                'invoice-total'
            );


        /*
        |--------------------------------------------------------------------------
        | FORMAT MONÉTAIRE
        |--------------------------------------------------------------------------
        */

        function formatMoney(value) {

            return Number(value || 0)
                .toLocaleString(
                    'fr-FR',
                    {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }
                )
                + ' DH';
        }


        /*
        |--------------------------------------------------------------------------
        | CALCULER UNE LIGNE
        |--------------------------------------------------------------------------
        */

        function updateRow(row) {

            const priceInput =
                row.querySelector(
                    '.product-price-input'
                );

            const quantityInput =
                row.querySelector(
                    '.product-quantity'
                );

            const totalDisplay =
                row.querySelector(
                    '.product-total'
                );


            let price =
                parseFloat(
                    priceInput.value || 0
                );

            let quantity =
                parseFloat(
                    quantityInput.value || 0
                );


            if (
                Number.isNaN(price)
                || price < 0
            ) {
                price = 0;
            }


            if (
                Number.isNaN(quantity)
                || quantity < 0
            ) {
                quantity = 0;
            }


            const lineTotal =
                price * quantity;


            totalDisplay.textContent =
                formatMoney(
                    lineTotal
                );


            updateInvoiceTotal();
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL FACTURE
        |--------------------------------------------------------------------------
        */

        function updateInvoiceTotal() {

            let total = 0;


            container
                .querySelectorAll(
                    '.product-row'
                )
                .forEach(
                    function (row) {

                        const price =
                            parseFloat(
                                row
                                    .querySelector(
                                        '.product-price-input'
                                    )
                                    .value || 0
                            );

                        const quantity =
                            parseFloat(
                                row
                                    .querySelector(
                                        '.product-quantity'
                                    )
                                    .value || 0
                            );


                        total +=
                            price * quantity;
                    }
                );


            invoiceTotal.textContent =
                formatMoney(total);
        }


        /*
        |--------------------------------------------------------------------------
        | RÉINDEXER LES PRODUITS
        |--------------------------------------------------------------------------
        */

        function reindexRows() {

            container
                .querySelectorAll(
                    '.product-row'
                )
                .forEach(
                    function (
                        row,
                        index
                    ) {

                        row
                            .querySelector(
                                '.product-name'
                            )
                            .name =
                                `items[${index}][product_name]`;


                        row
                            .querySelector(
                                '.product-price-input'
                            )
                            .name =
                                `items[${index}][unit_price]`;


                        row
                            .querySelector(
                                '.product-quantity'
                            )
                            .name =
                                `items[${index}][quantity]`;

                    }
                );
        }


        /*
        |--------------------------------------------------------------------------
        | PRÉPARER UNE LIGNE
        |--------------------------------------------------------------------------
        */

        function prepareRow(row) {

            const priceInput =
                row.querySelector(
                    '.product-price-input'
                );

            const quantityInput =
                row.querySelector(
                    '.product-quantity'
                );

            const productName =
                row.querySelector(
                    '.product-name'
                );

            const removeButton =
                row.querySelector(
                    '.remove-product'
                );


            priceInput.addEventListener(
                'input',
                function () {

                    updateRow(row);
                }
            );


            quantityInput.addEventListener(
                'input',
                function () {

                    updateRow(row);
                }
            );


            removeButton.addEventListener(
                'click',
                function () {

                    const rows =
                        container.querySelectorAll(
                            '.product-row'
                        );


                    /*
                    | Garder toujours
                    | au moins une ligne.
                    */
                    if (rows.length <= 1) {

                        productName.value = '';

                        priceInput.value = '';

                        quantityInput.value = 1;

                        updateRow(row);

                        productName.focus();

                        return;
                    }


                    row.remove();

                    reindexRows();

                    updateInvoiceTotal();
                }
            );


            updateRow(row);
        }


        /*
        |--------------------------------------------------------------------------
        | LIGNES EXISTANTES
        |--------------------------------------------------------------------------
        */

        container
            .querySelectorAll(
                '.product-row'
            )
            .forEach(
                function (row) {

                    prepareRow(row);
                }
            );


        reindexRows();


        /*
        |--------------------------------------------------------------------------
        | AJOUTER UN PRODUIT
        |--------------------------------------------------------------------------
        */

        addButton.addEventListener(
            'click',
            function () {

                const clone =
                    template
                        .content
                        .cloneNode(true);


                const row =
                    clone.querySelector(
                        '.product-row'
                    );


                container.appendChild(
                    row
                );


                prepareRow(row);

                reindexRows();

                updateInvoiceTotal();


                row
                    .querySelector(
                        '.product-name'
                    )
                    .focus();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | CALCUL INITIAL
        |--------------------------------------------------------------------------
        */

        updateInvoiceTotal();

    }
);

</script>


</body>

</html>