    <!DOCTYPE html>
    <html lang="fr">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>Mes factures | Terre Verte</title>


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



    <body
        class="flex min-h-screen flex-col bg-[#F7F4E8] text-[#263A30]"
    >


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
                    href="{{ route('user.clients.index') }}"
                    class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
                >
                    Mes clients
                </a>


                <a
                    href="{{ route('user.notifications.index') }}"
                    class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
                >
                    Notifications
                </a>


                <a
                    href="{{ route('profile.edit') }}"
                    class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 xl:inline-flex"
                >
                    Mon profil
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
                class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-white/5"
            ></div>

            <div
                class="absolute -bottom-24 -left-16 h-72 w-72 rounded-full bg-[#F5D85F]/10"
            ></div>


            <div
                class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
                    >
                        Facturation
                    </p>


                    <h2
                        class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                    >
                        Mes factures
                    </h2>


                    <p
                        class="mt-4 max-w-2xl leading-7 text-white/75"
                    >
                        Consultez vos factures, leurs montants
                        et suivez leur statut de validation par l'administrateur.
                    </p>

                </div>


                <a
                    href="{{ route('user.invoices.create') }}"
                    class="inline-flex shrink-0 items-center justify-center rounded-xl bg-white px-6 py-3.5 font-bold text-[#245B45] transition hover:bg-[#F7F4E8]"
                >
                    Nouvelle facture
                </a>

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



        @php

            $invoicesCount = method_exists($invoices, 'total')
                ? $invoices->total()
                : $invoices->count();

        @endphp



        {{-- ========================================================= --}}
        {{-- RÉSUMÉ --}}
        {{-- ========================================================= --}}

        <section
            class="mt-6 grid gap-4 sm:grid-cols-2"
        >

            <div
                class="rounded-2xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
            >

                <p
                    class="text-sm font-bold text-gray-500"
                >
                    Nombre de factures
                </p>

                <p
                    class="mt-2 text-3xl font-black text-[#245B45]"
                >
                    {{ $invoicesCount }}
                </p>

            </div>


            <div
                class="rounded-2xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
            >

                <p
                    class="text-sm font-bold text-gray-500"
                >
                    Nouvelle opération
                </p>

                <a
                    href="{{ route('user.invoices.create') }}"
                    class="mt-2 inline-flex font-black text-[#245B45] transition hover:text-[#194936]"
                >
                    Créer une nouvelle facture
                </a>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- LISTE DES FACTURES --}}
        {{-- ========================================================= --}}

        <section
            class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
        >


            {{-- TITRE --}}
            <div
                class="flex flex-col gap-4 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Historique
                    </p>


                    <h3
                        class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                    >
                        Liste des factures
                    </h3>

                </div>


                <div
                    class="rounded-xl bg-[#F7F4E8] px-4 py-2 text-sm font-bold text-[#245B45]"
                >
                    {{ $invoicesCount }} facture(s)
                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- FACTURES --}}
            {{-- ========================================================= --}}

            @if($invoices->count() > 0)


                <div
                    class="overflow-x-auto"
                >

                    <table
                        class="w-full min-w-[950px]"
                    >

                        <thead
                            class="bg-[#F7F4E8] text-left text-sm font-bold text-[#245B45]"
                        >

                            <tr>

                                <th
                                    class="px-6 py-4"
                                >
                                    N°
                                </th>

                                <th
                                    class="px-6 py-4"
                                >
                                    Client
                                </th>

                                <th
                                    class="px-6 py-4"
                                >
                                    Date
                                </th>

                                <th
                                    class="px-6 py-4"
                                >
                                    Total
                                </th>

                                <th
                                    class="px-6 py-4"
                                >
                                    Statut
                                </th>

                                <th
                                    class="px-6 py-4 text-right"
                                >
                                    Action
                                </th>

                            </tr>

                        </thead>



                        <tbody>

                            @foreach($invoices as $invoice)

                                <tr
                                    class="border-b border-gray-100 transition hover:bg-[#fcfbf6] last:border-0"
                                >


                                    {{-- NUMÉRO --}}
                                    <td
                                        class="px-6 py-5"
                                    >

                                        <span
                                            class="font-black text-[#245B45]"
                                        >
                                            #{{ $invoice->id }}
                                        </span>

                                    </td>



                                    {{-- CLIENT --}}
                                    <td
                                        class="px-6 py-5"
                                    >

                                        @if($invoice->client)

                                            <a
                                                href="{{ route('user.clients.show', $invoice->client) }}"
                                                class="font-bold text-[#1F3A2D] transition hover:text-[#245B45]"
                                            >
                                                {{ $invoice->client->name }}
                                            </a>

                                            @if($invoice->client->phone)

                                                <p
                                                    class="mt-1 text-xs text-gray-400"
                                                >
                                                    {{ $invoice->client->phone }}
                                                </p>

                                            @endif

                                        @else

                                            <span
                                                class="font-semibold text-gray-400"
                                            >
                                                Client indisponible
                                            </span>

                                        @endif

                                    </td>



                                    {{-- DATE --}}
                                    <td
                                        class="px-6 py-5 text-gray-600"
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


                                            {{-- VALIDÉE --}}
                                            @case('VALIDEE')

                                                <span
                                                    class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                                >
                                                    Validée
                                                </span>

                                                @break



                                            {{-- REFUSÉE --}}
                                            @case('REFUSEE')

                                                <span
                                                    class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                                >
                                                    Refusée
                                                </span>

                                                @break



                                            {{-- EN ATTENTE --}}
                                            @case('EN_ATTENTE')

                                                <span
                                                    class="inline-flex rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700"
                                                >
                                                    En attente
                                                </span>

                                                @break



                                            {{-- AUTRE --}}
                                            @default

                                                <span
                                                    class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 text-xs font-bold text-gray-600"
                                                >
                                                    {{ $invoice->status ?? 'Inconnu' }}
                                                </span>

                                        @endswitch

                                    </td>



                                    {{-- ACTION --}}
                                    <td
                                        class="px-6 py-5 text-right"
                                    >

                                        <a
                                            href="{{ route('user.invoices.show', $invoice) }}"
                                            class="inline-flex rounded-xl bg-[#245B45] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#194936]"
                                        >
                                            Voir la facture
                                        </a>

                                    </td>


                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>



                {{-- ========================================================= --}}
                {{-- PAGINATION SI UTILISÉE --}}
                {{-- ========================================================= --}}

                @if(method_exists($invoices, 'links'))

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


                    <h4
                        class="font-playfair mt-6 text-2xl font-bold text-[#1F3A2D]"
                    >
                        Aucune facture
                    </h4>


                    <p
                        class="mx-auto mt-3 max-w-md leading-7 text-gray-500"
                    >
                        Vous n'avez pas encore créé de facture.
                        Commencez par sélectionner un client
                        et les produits concernés.
                    </p>


                    <a
                        href="{{ route('user.invoices.create') }}"
                        class="mt-6 inline-flex rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                    >
                        Créer ma première facture
                    </a>

                </div>


            @endif


        </section>



        {{-- ========================================================= --}}
        {{-- INFORMATIONS --}}
        {{-- ========================================================= --}}

        <section
            class="mt-8 rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
            >
                Statuts
            </p>


            <h3
                class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
            >
                Suivi des factures
            </h3>


            <div
                class="mt-6 grid gap-4 md:grid-cols-3"
            >


                {{-- EN ATTENTE --}}
                <div
                    class="rounded-2xl bg-yellow-50 p-5"
                >

                    <span
                        class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700"
                    >
                        En attente
                    </span>


                    <p
                        class="mt-3 text-sm leading-6 text-gray-600"
                    >
                        La facture a été créée et attend
                        la vérification de l'administrateur.
                    </p>

                </div>



                {{-- VALIDÉE --}}
                <div
                    class="rounded-2xl bg-green-50 p-5"
                >

                    <span
                        class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700"
                    >
                        Validée
                    </span>


                    <p
                        class="mt-3 text-sm leading-6 text-gray-600"
                    >
                        L'administrateur a vérifié
                        et validé la facture.
                    </p>

                </div>



                {{-- REFUSÉE --}}
                <div
                    class="rounded-2xl bg-red-50 p-5"
                >

                    <span
                        class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700"
                    >
                        Refusée
                    </span>


                    <p
                        class="mt-3 text-sm leading-6 text-gray-600"
                    >
                        La facture a été refusée.
                        Consultez son détail pour voir la note administrateur.
                    </p>

                </div>


            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- ACCÈS RAPIDES --}}
        {{-- ========================================================= --}}

        <section
            class="mt-8 rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <h3
                class="font-playfair text-2xl font-bold text-[#1F3A2D]"
            >
                Accès rapides
            </h3>


            <div
                class="mt-6 flex flex-wrap gap-3"
            >

                <a
                    href="{{ route('user.invoices.create') }}"
                    class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
                >
                    Nouvelle facture
                </a>


                <a
                    href="{{ route('user.clients.index') }}"
                    class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                >
                    Mes clients
                </a>


                <a
                    href="{{ route('user.notifications.index') }}"
                    class="rounded-xl bg-yellow-50 px-5 py-3 font-bold text-yellow-700 transition hover:bg-yellow-100"
                >
                    Notifications
                </a>


                <a
                    href="{{ route('user.dashboard') }}"
                    class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
                >
                    Tableau de bord
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
            © {{ date('Y') }} Terre Verte — Espace Utilisateur
        </div>

    </footer>


    </body>

    </html>