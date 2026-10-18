<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Notifications | Terre Verte</title>


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
                href="{{ route('admin.invoices.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
            >
                Factures
            </a>


            <a
                href="{{ route('admin.products.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
            >
                Produits
            </a>


            <a
                href="{{ route('home') }}"
                target="_blank"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 xl:inline-flex"
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
                    Notifications
                </h2>


                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Consultez les nouvelles factures envoyées
                    par les utilisateurs et accédez directement
                    aux factures concernées.
                </p>

            </div>


            <a
                href="{{ route('admin.invoices.index') }}"
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-white px-6 py-3 font-bold text-[#245B45] transition hover:bg-[#F7F4E8]"
            >
                Voir les factures
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



    {{-- ========================================================= --}}
    {{-- CALCULS --}}
    {{-- ========================================================= --}}

    @php

        $totalNotifications =
            $notifications->count();

        $unreadNotifications =
            $notifications
                ->where('is_read', false)
                ->count();

        $readNotifications =
            $notifications
                ->where('is_read', true)
                ->count();

    @endphp



    {{-- ========================================================= --}}
    {{-- STATISTIQUES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 grid gap-4 sm:grid-cols-3"
    >


        {{-- TOTAL --}}
        <div
            class="rounded-2xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
        >

            <p
                class="text-sm font-bold text-gray-500"
            >
                Total notifications
            </p>

            <p
                class="mt-2 text-3xl font-black text-[#245B45]"
            >
                {{ $totalNotifications }}
            </p>

        </div>



        {{-- NON LUES --}}
        <div
            class="rounded-2xl border border-yellow-200 bg-yellow-50 p-5 shadow-sm"
        >

            <p
                class="text-sm font-bold text-yellow-700"
            >
                Non lues
            </p>

            <p
                class="mt-2 text-3xl font-black text-yellow-700"
            >
                {{ $unreadNotifications }}
            </p>

        </div>



        {{-- LUES --}}
        <div
            class="rounded-2xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
        >

            <p
                class="text-sm font-bold text-gray-500"
            >
                Lues
            </p>

            <p
                class="mt-2 text-3xl font-black text-[#789383]"
            >
                {{ $readNotifications }}
            </p>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- LISTE DES NOTIFICATIONS --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >


        {{-- HEADER LISTE --}}
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
                    Notifications administrateur
                </h3>

                <p
                    class="mt-2 text-sm text-gray-500"
                >
                    Cliquez sur une notification pour ouvrir
                    la facture correspondante.
                </p>

            </div>


            <span
                class="rounded-full bg-[#eef2e7] px-4 py-2 text-sm font-bold text-[#245B45]"
            >
                {{ $totalNotifications }}
                {{ $totalNotifications === 1
                    ? 'notification'
                    : 'notifications' }}
            </span>

        </div>



        {{-- ========================================================= --}}
        {{-- NOTIFICATIONS --}}
        {{-- ========================================================= --}}

        @forelse($notifications as $notification)


            @php

                $invoice =
                    $notification->invoice;

                $invoiceStatus =
                    $invoice?->status;


                $statusLabel = match($invoiceStatus) {

                    'VALIDEE' =>
                        'Validée',

                    'REFUSEE' =>
                        'Refusée',

                    'EN_ATTENTE' =>
                        'En attente',

                    default =>
                        null,

                };


                $statusClasses = match($invoiceStatus) {

                    'VALIDEE' =>
                        'bg-green-100 text-green-700',

                    'REFUSEE' =>
                        'bg-red-100 text-red-700',

                    'EN_ATTENTE' =>
                        'bg-yellow-100 text-yellow-700',

                    default =>
                        'bg-gray-100 text-gray-500',

                };

            @endphp



            <div
                class="border-b border-gray-100 px-6 py-5 transition last:border-0
                {{ !$notification->is_read
                    ? 'bg-yellow-50/60'
                    : 'bg-white hover:bg-[#fcfbf6]' }}"
            >

                <div
                    class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between"
                >


                    {{-- ========================================================= --}}
                    {{-- INFORMATIONS --}}
                    {{-- ========================================================= --}}

                    <div
                        class="flex min-w-0 flex-1 items-start gap-4"
                    >


                        {{-- INDICATEUR --}}
                        <div
                            class="mt-1 h-14 w-1 shrink-0 rounded-full
                            {{ !$notification->is_read
                                ? 'bg-[#F5D85F]'
                                : 'bg-gray-200' }}"
                        ></div>



                        <div
                            class="min-w-0 flex-1"
                        >


                            {{-- STATUT LU / NON LU --}}
                            <div
                                class="flex flex-wrap items-center gap-2"
                            >

                                @if(!$notification->is_read)

                                    <span
                                        class="rounded-full bg-[#F5D85F] px-3 py-1 text-[10px] font-black uppercase text-[#1F3A2D]"
                                    >
                                        Nouveau
                                    </span>

                                @else

                                    <span
                                        class="rounded-full bg-gray-100 px-3 py-1 text-[10px] font-bold uppercase text-gray-500"
                                    >
                                        Lu
                                    </span>

                                @endif



                                {{-- STATUT FACTURE --}}
                                @if($statusLabel)

                                    <span
                                        class="rounded-full px-3 py-1 text-[10px] font-bold uppercase {{ $statusClasses }}"
                                    >
                                        {{ $statusLabel }}
                                    </span>

                                @endif

                            </div>



                            {{-- MESSAGE --}}
                            <p
                                class="mt-3 break-words font-bold leading-6 text-[#1F3A2D]"
                            >
                                {{ $notification->message }}
                            </p>



                            {{-- INFORMATIONS FACTURE --}}
                            @if($invoice)

                                <div
                                    class="mt-3 flex flex-wrap gap-x-5 gap-y-2 text-xs text-gray-500"
                                >

                                    <p>

                                        <span
                                            class="font-bold text-[#1F3A2D]"
                                        >
                                            Facture :
                                        </span>

                                        #{{ str_pad(
                                            $invoice->id,
                                            5,
                                            '0',
                                            STR_PAD_LEFT
                                        ) }}

                                    </p>


                                    @if($invoice->total !== null)

                                        <p>

                                            <span
                                                class="font-bold text-[#1F3A2D]"
                                            >
                                                Total :
                                            </span>

                                            {{ number_format(
                                                (float) $invoice->total,
                                                2,
                                                ',',
                                                ' '
                                            ) }}
                                            DH

                                        </p>

                                    @endif

                                </div>

                            @endif



                            {{-- DATE --}}
                            <p
                                class="mt-3 text-xs text-gray-400"
                            >
                                {{ $notification->created_at?->format(
                                    'd/m/Y à H:i'
                                ) ?? '—' }}
                            </p>

                        </div>

                    </div>



                    {{-- ========================================================= --}}
                    {{-- ACTION --}}
                    {{-- ========================================================= --}}

                    <div
                        class="shrink-0 lg:pl-5"
                    >

                        @if($invoice)

                            <a
                                href="{{ route(
                                    'admin.notifications.open',
                                    $notification
                                ) }}"
                                class="inline-flex w-full min-w-[170px] items-center justify-center rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936] lg:w-auto"
                            >
                                Voir la facture
                            </a>

                        @else

                            <span
                                class="inline-flex w-full min-w-[170px] cursor-not-allowed items-center justify-center rounded-xl bg-gray-100 px-5 py-3 text-sm font-bold text-gray-400 lg:w-auto"
                            >
                                Facture indisponible
                            </span>

                        @endif

                    </div>

                </div>

            </div>


        @empty


            {{-- ========================================================= --}}
            {{-- AUCUNE NOTIFICATION --}}
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
                    Aucune notification
                </h3>


                <p
                    class="mx-auto mt-3 max-w-md leading-7 text-gray-500"
                >
                    Les nouvelles factures envoyées
                    par les utilisateurs apparaîtront ici.
                </p>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="mt-6 inline-flex rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                >
                    Retour au tableau de bord
                </a>

            </div>


        @endforelse

    </section>



    {{-- ========================================================= --}}
    {{-- EXPLICATION --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8 grid gap-5 md:grid-cols-2"
    >


        {{-- NOUVELLE --}}
        <div
            class="rounded-3xl border border-yellow-200 bg-yellow-50 p-6"
        >

            <span
                class="inline-flex rounded-full bg-[#F5D85F] px-3 py-1 text-xs font-bold text-[#1F3A2D]"
            >
                Nouveau
            </span>

            <h3
                class="mt-4 font-bold text-[#1F3A2D]"
            >
                Notification non lue
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-gray-600"
            >
                Une notification est considérée comme nouvelle
                tant que l'administrateur n'a pas ouvert
                la facture correspondante.
            </p>

        </div>



        {{-- LUE --}}
        <div
            class="rounded-3xl border border-[#e7e2d3] bg-white p-6"
        >

            <span
                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-bold text-gray-500"
            >
                Lu
            </span>

            <h3
                class="mt-4 font-bold text-[#1F3A2D]"
            >
                Notification consultée
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-gray-600"
            >
                Après ouverture, la notification reste
                disponible dans l'historique mais elle
                n'est plus considérée comme nouvelle.
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
                href="{{ route('admin.invoices.index') }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Factures
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