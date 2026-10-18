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
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,700&display=swap"
        rel="stylesheet"
    >


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            background: #F7F4E8;
            color: #263A30;
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .invoice-paper {
            background: #fffef9;
            border: 1px solid #e7e2d3;
            box-shadow: 0 25px 65px rgba(31, 58, 45, 0.14);
        }


        @media print {

            @page {
                size: A4;
                margin: 10mm;
            }

            body {
                background: white !important;
            }

            .no-print,
            .main-header,
            .main-footer {
                display: none !important;
            }

            .invoice-wrapper {
                padding: 0 !important;
                margin: 0 !important;
                max-width: none !important;
            }

            .invoice-paper {
                border: none !important;
                box-shadow: none !important;
                border-radius: 0 !important;
                max-width: none !important;
                width: 100% !important;
                margin: 0 !important;
            }

        }

    </style>

</head>


<body>


{{-- ========================================================= --}}
{{-- HEADER --}}
{{-- ========================================================= --}}

<header
    class="main-header border-b border-[#e5dfcf] bg-white"
>

    <div
        class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4"
    >

        {{-- LOGO --}}
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

                <p
                    class="text-xs text-gray-500"
                >
                    Espace Utilisateur
                </p>

            </div>

        </a>



        {{-- NAVIGATION --}}
        <div
            class="flex items-center gap-3"
        >

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


            <a
                href="{{ route('user.notifications.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 xl:inline-flex"
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
{{-- PAGE --}}
{{-- ========================================================= --}}

<div
    class="invoice-wrapper mx-auto min-h-screen max-w-7xl px-6 py-8"
>


    {{-- ========================================================= --}}
    {{-- ACTIONS --}}
    {{-- ========================================================= --}}

    <div
        class="no-print mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
    >

        <a
            href="{{ route('user.invoices.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-[#245B45] bg-white px-5 py-3 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
        >
            Retour aux factures
        </a>


        <div
            class="flex flex-col gap-3 sm:flex-row"
        >

            <a
                href="{{ route('user.invoices.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-[#eef2e7] px-5 py-3 text-sm font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Nouvelle facture
            </a>


            <button
                type="button"
                onclick="window.print()"
                class="rounded-xl bg-[#245B45] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
            >
                Imprimer / PDF
            </button>

        </div>

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
    {{-- FACTURE --}}
    {{-- ========================================================= --}}

    <main
        class="invoice-paper mx-auto max-w-5xl overflow-hidden rounded-3xl"
    >


        {{-- ========================================================= --}}
        {{-- EN-TÊTE FACTURE --}}
        {{-- ========================================================= --}}

        <section
            class="relative overflow-hidden border-b border-[#ebe7da] px-8 py-9 md:px-12 md:py-11"
        >

            <div
                class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-[#F5D85F]/30"
            ></div>


            <div
                class="relative flex flex-col gap-8 md:flex-row md:items-start md:justify-between"
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

                        <h2
                            class="font-playfair text-3xl font-bold text-[#245B45]"
                        >
                            Terre Verte
                        </h2>

                        <p
                            class="mt-1 text-xs font-bold uppercase tracking-[0.20em] text-[#789383]"
                        >
                            Agriculture naturelle
                        </p>

                    </div>

                </div>



                {{-- NUMÉRO FACTURE --}}
                <div
                    class="relative z-10 md:text-right"
                >

                    <p
                        class="text-xs font-black uppercase tracking-[0.20em] text-[#789383]"
                    >
                        Facture
                    </p>


                    <p
                        class="mt-2 text-3xl font-black text-[#245B45]"
                    >
                        #{{ str_pad(
                            $invoice->id,
                            5,
                            '0',
                            STR_PAD_LEFT
                        ) }}
                    </p>


                    <p
                        class="mt-2 text-sm font-semibold text-gray-500"
                    >
                        {{ $invoice->created_at?->format('d/m/Y à H:i') ?? '—' }}
                    </p>

                </div>

            </div>



            <div
                class="relative mt-10"
            >

                <h1
                    class="font-playfair text-5xl font-bold italic text-[#1F3A2D] md:text-6xl"
                >
                    Facture
                </h1>

                <div
                    class="mt-3 h-1 w-16 rounded-full bg-[#F5D85F]"
                ></div>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- CLIENT + STATUT --}}
        {{-- ========================================================= --}}

        <section
            class="grid gap-6 bg-[#F7F4E8] px-8 py-7 md:grid-cols-2 md:px-12"
        >


            {{-- CLIENT --}}
            <div>

                <p
                    class="text-xs font-black uppercase tracking-[0.20em] text-[#789383]"
                >
                    Facturé à
                </p>


                <h3
                    class="mt-3 text-xl font-black text-[#1F3A2D]"
                >
                    {{ $invoice->client?->name ?? 'Client indisponible' }}
                </h3>



                @if($invoice->client)

                    <div
                        class="mt-4 space-y-2 text-sm text-gray-600"
                    >


                        @if($invoice->client->cin)

                            <p>
                                <span class="font-bold text-[#1F3A2D]">
                                    CIN :
                                </span>

                                {{ $invoice->client->cin }}
                            </p>

                        @endif



                        @if($invoice->client->phone)

                            <p>
                                <span class="font-bold text-[#1F3A2D]">
                                    Téléphone :
                                </span>

                                {{ $invoice->client->phone }}
                            </p>

                        @endif



                        @if($invoice->client->email)

                            <p>
                                <span class="font-bold text-[#1F3A2D]">
                                    E-mail :
                                </span>

                                {{ $invoice->client->email }}
                            </p>

                        @endif



                        @if($invoice->client->address)

                            <p>
                                <span class="font-bold text-[#1F3A2D]">
                                    Adresse :
                                </span>

                                {{ $invoice->client->address }}
                            </p>

                        @endif


                    </div>

                @endif

            </div>



            {{-- STATUT --}}
            <div
                class="flex items-start md:justify-end"
            >

                @switch($invoice->status)


                    @case('VALIDEE')

                        <span
                            class="inline-flex rounded-full bg-green-100 px-5 py-2.5 text-xs font-black uppercase tracking-wide text-green-700"
                        >
                            Facture validée
                        </span>

                        @break



                    @case('REFUSEE')

                        <span
                            class="inline-flex rounded-full bg-red-100 px-5 py-2.5 text-xs font-black uppercase tracking-wide text-red-700"
                        >
                            Facture refusée
                        </span>

                        @break



                    @case('EN_ATTENTE')

                        <span
                            class="inline-flex rounded-full bg-yellow-100 px-5 py-2.5 text-xs font-black uppercase tracking-wide text-yellow-700"
                        >
                            En attente
                        </span>

                        @break



                    @default

                        <span
                            class="inline-flex rounded-full bg-gray-100 px-5 py-2.5 text-xs font-black uppercase tracking-wide text-gray-600"
                        >
                            {{ $invoice->status ?? 'Statut inconnu' }}
                        </span>

                @endswitch

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- NOTE ADMINISTRATEUR --}}
        {{-- ========================================================= --}}

        @if($invoice->admin_note)

            <section
                class="mx-8 mt-6 rounded-2xl border
                    {{ $invoice->status === 'REFUSEE'
                        ? 'border-red-200 bg-red-50'
                        : 'border-[#e7e2d3] bg-[#F7F4E8]' }}
                    p-5 md:mx-12"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.18em]
                    {{ $invoice->status === 'REFUSEE'
                        ? 'text-red-600'
                        : 'text-[#789383]' }}"
                >
                    Note de l'administrateur
                </p>


                <p
                    class="mt-3 whitespace-pre-line text-sm font-semibold leading-6
                    {{ $invoice->status === 'REFUSEE'
                        ? 'text-red-800'
                        : 'text-gray-600' }}"
                >
                    {{ $invoice->admin_note }}
                </p>

            </section>

        @endif



        {{-- ========================================================= --}}
        {{-- PRODUITS --}}
        {{-- ========================================================= --}}

        <section
            class="px-8 py-8 md:px-12"
        >

            <div
                class="mb-5"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Détails
                </p>

                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Produits de la facture
                </h3>

            </div>



            <div
                class="overflow-x-auto rounded-2xl border border-[#dfe3da]"
            >

                <table
                    class="w-full min-w-[650px]"
                >

                    <thead>

                        <tr
                            class="bg-[#245B45] text-white"
                        >

                            <th
                                class="px-5 py-4 text-left text-xs font-black uppercase tracking-[0.14em]"
                            >
                                Produit
                            </th>

                            <th
                                class="px-5 py-4 text-center text-xs font-black uppercase tracking-[0.14em]"
                            >
                                Quantité
                            </th>

                            <th
                                class="px-5 py-4 text-right text-xs font-black uppercase tracking-[0.14em]"
                            >
                                Prix unitaire
                            </th>

                            <th
                                class="px-5 py-4 text-right text-xs font-black uppercase tracking-[0.14em]"
                            >
                                Total
                            </th>

                        </tr>

                    </thead>



                    <tbody>

                        @forelse($invoice->items as $item)

                            @php

                                $productName =
                                    $item->product_name
                                    ?? $item->product?->name
                                    ?? 'Produit indisponible';


                                $itemPrice =
                                    $item->price
                                    ?? $item->unit_price
                                    ?? 0;


                                $itemTotal =
                                    $item->total
                                    ?? (
                                        (float) $item->quantity
                                        * (float) $itemPrice
                                    );

                            @endphp


                            <tr
                                class="border-b border-[#ece9dc] last:border-0"
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

                                </td>



                                {{-- QUANTITÉ --}}
                                <td
                                    class="px-5 py-5 text-center font-semibold text-gray-600"
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
                                    class="px-5 py-5 text-right font-semibold text-gray-600"
                                >
                                    {{ number_format(
                                        (float) $itemPrice,
                                        2,
                                        ',',
                                        ' '
                                    ) }}
                                    DH
                                </td>



                                {{-- TOTAL LIGNE --}}
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
                                    class="px-5 py-10 text-center text-gray-400"
                                >
                                    Aucun produit dans cette facture.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- PAIEMENT + TOTAL --}}
        {{-- ========================================================= --}}

        <section
            class="grid gap-8 px-8 pb-9 md:grid-cols-2 md:px-12"
        >


            {{-- PAIEMENT --}}
            <div
                class="rounded-2xl bg-[#F7F4E8] p-6"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.20em] text-[#789383]"
                >
                    Mode de paiement
                </p>


                <p
                    class="mt-4 font-black text-[#1F3A2D]"
                >
                    Paiement à la livraison
                </p>


                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Le client règle directement sa commande
                    lors de la réception des produits.
                    Aucun paiement en ligne n'est effectué
                    dans l'application.
                </p>

            </div>



            {{-- TOTAL --}}
            <div>

                <div
                    class="flex items-center justify-between border-b border-[#dddacd] py-3"
                >

                    <span
                        class="text-sm text-gray-500"
                    >
                        Sous-total
                    </span>


                    <span
                        class="font-bold text-[#1F3A2D]"
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
                        class="font-black uppercase text-[#1F3A2D]"
                    >
                        Total
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

        </section>



        {{-- ========================================================= --}}
        {{-- SUIVI FACTURE --}}
        {{-- ========================================================= --}}

        <section
            class="px-8 pb-9 md:px-12"
        >

            @if($invoice->status === 'EN_ATTENTE')

                <div
                    class="rounded-2xl border border-yellow-200 bg-yellow-50 p-5"
                >

                    <p
                        class="font-bold text-yellow-800"
                    >
                        Facture en attente de vérification
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-yellow-700"
                    >
                        Cette facture a été enregistrée et attend
                        la vérification de l'administrateur.
                    </p>

                </div>


            @elseif($invoice->status === 'VALIDEE')

                <div
                    class="rounded-2xl border border-green-200 bg-green-50 p-5"
                >

                    <p
                        class="font-bold text-green-800"
                    >
                        Facture validée
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-green-700"
                    >
                        Cette facture a été vérifiée et validée
                        par l'administrateur.
                    </p>

                </div>


            @elseif($invoice->status === 'REFUSEE')

                <div
                    class="rounded-2xl border border-red-200 bg-red-50 p-5"
                >

                    <p
                        class="font-bold text-red-800"
                    >
                        Facture refusée
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-red-700"
                    >
                        Cette facture a été refusée par l'administrateur.
                        Consultez la note administrateur ci-dessus
                        lorsqu'elle est disponible.
                    </p>

                </div>

            @endif

        </section>



        {{-- ========================================================= --}}
        {{-- MESSAGE FINAL --}}
        {{-- ========================================================= --}}

        <section
            class="px-8 pb-10 md:px-12"
        >

            <div
                class="border-t border-dashed border-[#d6d3c6] pt-6"
            >

                <p
                    class="font-playfair text-xl font-bold text-[#245B45]"
                >
                    Merci pour votre confiance.
                </p>

                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Terre Verte vous accompagne avec des produits
                    agricoles sélectionnés avec soin.
                </p>

            </div>

        </section>


    </main>



    {{-- ========================================================= --}}
    {{-- ACTIONS SOUS FACTURE --}}
    {{-- ========================================================= --}}

    <div
        class="no-print mx-auto mt-6 flex max-w-5xl flex-wrap gap-3"
    >

        <a
            href="{{ route('user.invoices.index') }}"
            class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
        >
            Mes factures
        </a>


        @if($invoice->client)

            <a
                href="{{ route('user.clients.show', $invoice->client) }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Voir le client
            </a>

        @endif


        <a
            href="{{ route('user.invoices.create') }}"
            class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
        >
            Nouvelle facture
        </a>


        <a
            href="{{ route('user.dashboard') }}"
            class="rounded-xl border border-gray-300 px-5 py-3 font-bold text-gray-600 transition hover:bg-white"
        >
            Tableau de bord
        </a>

    </div>


</div>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer
    class="main-footer mt-8 border-t border-[#e4dfd2] bg-white"
>

    <div
        class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-6 text-center md:flex-row md:items-center md:justify-between md:text-left"
    >

        <div
            class="flex items-center justify-center gap-3 md:justify-start"
        >

            <img
                src="{{ asset('images/logo-terre-verte.png') }}"
                alt="Terre Verte"
                class="h-10 w-auto"
            >

            <div>

                <p
                    class="font-playfair font-bold text-[#245B45]"
                >
                    Terre Verte
                </p>

                <p
                    class="text-xs text-gray-400"
                >
                    Agriculture naturelle
                </p>

            </div>

        </div>


        <p
            class="text-xs text-gray-500"
        >
            © {{ date('Y') }} Terre Verte — Espace Utilisateur
        </p>

    </div>

</footer>


</body>

</html>