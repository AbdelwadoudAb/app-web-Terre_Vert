<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Gestion des factures | Terre Verte</title>


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


{{-- ========================================================= --}}
{{-- HEADER --}}
{{-- ========================================================= --}}

<header
    class="border-b border-[#e5dfcf] bg-white"
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
                href="{{ route('admin.dashboard') }}"
                class="hidden rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7] sm:inline-flex"
            >
                Tableau de bord
            </a>


            <a
                href="{{ route('admin.notifications.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
            >
                Notifications
            </a>


            <a
                href="{{ route('home') }}"
                target="_blank"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
            >
                Voir le site
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
    class="mx-auto w-full max-w-7xl flex-1 px-6 py-8"
>


    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <section
        class="relative overflow-hidden rounded-3xl bg-[#245B45] p-8 text-white md:p-10"
    >

        <div
            class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/5"
        ></div>

        <div
            class="absolute -bottom-20 -left-12 h-64 w-64 rounded-full bg-[#F5D85F]/10"
        ></div>


        <div
            class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
                >
                    Administration
                </p>

                <h2
                    class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                >
                    Gestion des factures
                </h2>

                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Consultez les factures créées par les utilisateurs,
                    vérifiez les informations puis validez ou refusez
                    les demandes.
                </p>

            </div>


            <div
                class="rounded-2xl border border-white/10 bg-white/10 px-7 py-5 backdrop-blur"
            >

                <p
                    class="text-sm font-semibold text-white/70"
                >
                    Total des factures
                </p>

                <p
                    class="mt-1 text-3xl font-black text-white"
                >
                    {{ $invoices->total() }}
                </p>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MESSAGES --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div
            class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 font-semibold text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- TABLEAU --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >


        {{-- HEADER TABLEAU --}}
        <div
            class="flex flex-col gap-4 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Facturation
                </p>

                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Liste des factures
                </h3>

                <p
                    class="mt-2 text-sm text-gray-500"
                >
                    Les factures les plus récentes sont affichées en premier.
                </p>

            </div>


            <span
                class="rounded-full bg-[#eef2e7] px-4 py-2 text-sm font-bold text-[#245B45]"
            >
                {{ $invoices->total() }}
                {{ $invoices->total() === 1 ? 'facture' : 'factures' }}
            </span>

        </div>



        @if($invoices->count() > 0)


            {{-- ========================================================= --}}
            {{-- TABLE --}}
            {{-- ========================================================= --}}

            <div
                class="overflow-x-auto"
            >

                <table
                    class="w-full min-w-[1150px]"
                >

                    <thead
                        class="bg-[#F7F4E8] text-left text-sm font-bold text-[#245B45]"
                    >

                        <tr>

                            <th class="px-6 py-4">
                                N°
                            </th>

                            <th class="px-6 py-4">
                                Utilisateur
                            </th>

                            <th class="px-6 py-4">
                                Client
                            </th>

                            <th class="px-6 py-4">
                                Produits
                            </th>

                            <th class="px-6 py-4">
                                Total
                            </th>

                            <th class="px-6 py-4">
                                Statut
                            </th>

                            <th class="px-6 py-4">
                                Date
                            </th>

                            <th class="px-6 py-4 text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody>

                        @foreach($invoices as $invoice)

                            <tr
                                class="border-b border-gray-100 transition hover:bg-[#faf9f4] last:border-0"
                            >


                                {{-- NUMÉRO --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    <span
                                        class="font-black text-[#245B45]"
                                    >
                                        #{{ str_pad(
                                            $invoice->id,
                                            5,
                                            '0',
                                            STR_PAD_LEFT
                                        ) }}
                                    </span>

                                </td>



                                {{-- UTILISATEUR --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    <p
                                        class="font-bold text-[#1F3A2D]"
                                    >
                                        {{ $invoice->user?->name ?? 'Utilisateur indisponible' }}
                                    </p>


                                    @if($invoice->user?->email)

                                        <p
                                            class="mt-1 text-xs text-gray-400"
                                        >
                                            {{ $invoice->user->email }}
                                        </p>

                                    @endif

                                </td>



                                {{-- CLIENT --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    <p
                                        class="font-semibold text-gray-700"
                                    >
                                        {{ $invoice->client?->name ?? 'Client indisponible' }}
                                    </p>


                                    @if($invoice->client?->phone)

                                        <p
                                            class="mt-1 text-xs text-gray-400"
                                        >
                                            {{ $invoice->client->phone }}
                                        </p>

                                    @endif

                                </td>



                                {{-- NOMBRE PRODUITS --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    <span
                                        class="inline-flex rounded-xl bg-[#F7F4E8] px-3 py-2 text-sm font-bold text-[#245B45]"
                                    >
                                        {{ $invoice->items->count() }}
                                        {{ $invoice->items->count() === 1 ? 'ligne' : 'lignes' }}
                                    </span>

                                </td>



                                {{-- TOTAL --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    <span
                                        class="font-black text-[#245B45]"
                                    >
                                        {{ number_format(
                                            (float) $invoice->total,
                                            2,
                                            ',',
                                            ' '
                                        ) }}
                                        DH
                                    </span>

                                </td>



                                {{-- STATUT --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    @switch($invoice->status)


                                        @case('VALIDEE')

                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                            >
                                                Validée
                                            </span>

                                            @break



                                        @case('REFUSEE')

                                            <span
                                                class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                            >
                                                Refusée
                                            </span>

                                            @break



                                        @case('EN_ATTENTE')

                                            <span
                                                class="inline-flex rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700"
                                            >
                                                En attente
                                            </span>

                                            @break



                                        @default

                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 text-xs font-bold text-gray-600"
                                            >
                                                {{ $invoice->status ?? 'Inconnu' }}
                                            </span>

                                    @endswitch

                                </td>



                                {{-- DATE --}}
                                <td
                                    class="px-6 py-5 text-sm text-gray-500"
                                >

                                    <p>
                                        {{ $invoice->created_at?->format('d/m/Y') ?? '—' }}
                                    </p>

                                    <p
                                        class="mt-1 text-xs text-gray-400"
                                    >
                                        {{ $invoice->created_at?->format('H:i') ?? '' }}
                                    </p>

                                </td>



                                {{-- ACTIONS --}}
                                <td
                                    class="px-6 py-5"
                                >

                                    <div
                                        class="flex items-center justify-end gap-2"
                                    >


                                        {{-- VOIR --}}
                                        <a
                                            href="{{ route(
                                                'admin.invoices.show',
                                                $invoice
                                            ) }}"
                                            class="rounded-xl bg-[#eef2e7] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                                        >
                                            Voir
                                        </a>



                                        {{-- ========================================================= --}}
                                        {{-- FACTURE EN ATTENTE --}}
                                        {{-- ========================================================= --}}

                                        @if($invoice->status === 'EN_ATTENTE')


                                            {{-- VALIDER --}}
                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'admin.invoices.validate',
                                                    $invoice
                                                ) }}"
                                                onsubmit="return confirm('Voulez-vous vraiment valider cette facture ? Le stock sera mis à jour.');"
                                            >

                                                @csrf
                                                @method('PATCH')


                                                <button
                                                    type="submit"
                                                    class="rounded-xl bg-green-50 px-4 py-2.5 text-sm font-bold text-green-700 transition hover:bg-green-100"
                                                >
                                                    Valider
                                                </button>

                                            </form>



                                            {{-- REFUSER --}}
                                            <a
                                                href="{{ route(
                                                    'admin.invoices.show',
                                                    $invoice
                                                ) }}#refus"
                                                class="rounded-xl bg-red-50 px-4 py-2.5 text-sm font-bold text-red-600 transition hover:bg-red-100"
                                            >
                                                Refuser
                                            </a>


                                        {{-- ========================================================= --}}
                                        {{-- FACTURE VALIDÉE --}}
                                        {{-- ========================================================= --}}

                                        @elseif($invoice->status === 'VALIDEE')

                                            <span
                                                class="rounded-xl bg-green-50 px-4 py-2.5 text-sm font-bold text-green-700"
                                            >
                                                Traitée
                                            </span>


                                        {{-- ========================================================= --}}
                                        {{-- FACTURE REFUSÉE --}}
                                        {{-- ========================================================= --}}

                                        @elseif($invoice->status === 'REFUSEE')

                                            <span
                                                class="rounded-xl bg-red-50 px-4 py-2.5 text-sm font-bold text-red-600"
                                            >
                                                Traitée
                                            </span>

                                        @endif


                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>



            {{-- ========================================================= --}}
            {{-- PAGINATION --}}
            {{-- ========================================================= --}}

            @if($invoices->hasPages())

                <div
                    class="border-t border-gray-100 px-6 py-5"
                >
                    {{ $invoices->links() }}
                </div>

            @endif


        @else


            {{-- ========================================================= --}}
            {{-- AUCUNE FACTURE --}}
            {{-- ========================================================= --}}

            <div
                class="px-6 py-16 text-center"
            >

                <div
                    class="mx-auto h-1 w-20 rounded-full bg-[#245B45]"
                ></div>


                <h3
                    class="font-playfair mt-6 text-2xl font-bold text-[#1F3A2D]"
                >
                    Aucune facture
                </h3>


                <p
                    class="mx-auto mt-3 max-w-md leading-7 text-gray-500"
                >
                    Aucune facture n'a encore été envoyée
                    par les utilisateurs.
                </p>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="mt-6 inline-flex rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                >
                    Retour au tableau de bord
                </a>

            </div>


        @endif

    </section>



    {{-- ========================================================= --}}
    {{-- INFORMATIONS --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8 grid gap-5 md:grid-cols-3"
    >


        {{-- EN ATTENTE --}}
        <div
            class="rounded-3xl border border-yellow-200 bg-yellow-50 p-6"
        >

            <span
                class="inline-flex rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700"
            >
                En attente
            </span>

            <h3
                class="mt-4 font-bold text-yellow-900"
            >
                À vérifier
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-yellow-700"
            >
                La facture doit être vérifiée
                avant sa validation ou son refus.
            </p>

        </div>



        {{-- VALIDÉE --}}
        <div
            class="rounded-3xl border border-green-200 bg-green-50 p-6"
        >

            <span
                class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
            >
                Validée
            </span>

            <h3
                class="mt-4 font-bold text-green-900"
            >
                Facture acceptée
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-green-700"
            >
                La facture est validée
                et le stock correspondant a été mis à jour.
            </p>

        </div>



        {{-- REFUSÉE --}}
        <div
            class="rounded-3xl border border-red-200 bg-red-50 p-6"
        >

            <span
                class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
            >
                Refusée
            </span>

            <h3
                class="mt-4 font-bold text-red-900"
            >
                Facture refusée
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-red-700"
            >
                Une raison doit être indiquée
                afin d'informer l'utilisateur.
            </p>

        </div>


    </section>



    {{-- ========================================================= --}}
    {{-- ACCÈS RAPIDES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8 rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
        >
            Administration
        </p>


        <h3
            class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
        >
            Accès rapides
        </h3>


        <div
            class="mt-6 flex flex-wrap gap-3"
        >

            <a
                href="{{ route('admin.dashboard') }}"
                class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
            >
                Tableau de bord
            </a>


            <a
                href="{{ route('admin.notifications.index') }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Notifications
            </a>


            <a
                href="{{ route('admin.products.index') }}"
                class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
            >
                Produits
            </a>


            <a
                href="{{ route('admin.categories.index') }}"
                class="rounded-xl border border-gray-300 px-5 py-3 font-bold text-gray-600 transition hover:bg-gray-50"
            >
                Catégories
            </a>

        </div>

    </section>


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
        © {{ date('Y') }} Terre Verte — Administration
    </div>

</footer>


</body>

</html>