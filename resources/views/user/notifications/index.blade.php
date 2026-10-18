<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mes notifications | Terre Verte</title>


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
                Dashboard
            </a>


            <a
                href="{{ route('profile.edit') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
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
    class="mx-auto w-full max-w-7xl flex-1 px-6 py-10"
>


    {{-- ========================================================= --}}
    {{-- TITRE --}}
    {{-- ========================================================= --}}

    <div
        class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between"
    >

        <div>

            <p
                class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
            >
                Historique
            </p>


            <h2
                class="font-playfair mt-2 text-4xl font-bold text-[#1F3A2D]"
            >
                Mes notifications
            </h2>


            <p
                class="mt-3 max-w-2xl leading-7 text-gray-500"
            >
                Consultez les informations concernant
                la validation ou le refus de vos factures.
            </p>

        </div>


        <a
            href="{{ route('user.dashboard') }}"
            class="inline-flex items-center justify-center rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
        >
            Retour au dashboard
        </a>

    </div>



    {{-- ========================================================= --}}
    {{-- MESSAGE ERREUR --}}
    {{-- ========================================================= --}}

    @if(session('error'))

        <div
            class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-bold text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- MESSAGE SUCCÈS --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-bold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- INFORMATIONS --}}
    {{-- ========================================================= --}}

    <section
        class="mb-6 grid gap-4 sm:grid-cols-3"
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
                {{ $notifications->count() }}
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
                {{ $notifications->where('is_read', false)->count() }}
            </p>

        </div>



        {{-- LUES --}}
        <div
            class="rounded-2xl border border-green-200 bg-green-50 p-5 shadow-sm"
        >

            <p
                class="text-sm font-bold text-green-700"
            >
                Lues
            </p>

            <p
                class="mt-2 text-3xl font-black text-green-700"
            >
                {{ $notifications->where('is_read', true)->count() }}
            </p>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- LISTE NOTIFICATIONS --}}
    {{-- ========================================================= --}}

    <section
        class="overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >

        <div
            class="border-b border-[#eee9dc] px-6 py-5"
        >

            <h3
                class="font-playfair text-2xl font-bold text-[#1F3A2D]"
            >
                Historique des notifications
            </h3>

        </div>



        @forelse($notifications as $notification)

            @php

                $invoice = $notification->invoice;

                $invoiceStatus = $invoice?->status;

                $statusLabel = match($invoiceStatus) {
                    'VALIDEE' => 'Validée',
                    'REFUSEE' => 'Refusée',
                    'EN_ATTENTE' => 'En attente',
                    default => 'Information',
                };

                $statusClasses = match($invoiceStatus) {
                    'VALIDEE' => 'bg-green-100 text-green-700',
                    'REFUSEE' => 'bg-red-100 text-red-700',
                    'EN_ATTENTE' => 'bg-yellow-100 text-yellow-700',
                    default => 'bg-gray-100 text-gray-600',
                };

                $barClass = match($invoiceStatus) {
                    'VALIDEE' => 'bg-green-500',
                    'REFUSEE' => 'bg-red-500',
                    'EN_ATTENTE' => 'bg-yellow-400',
                    default => 'bg-[#789383]',
                };

            @endphp


            <div
                class="border-b border-gray-100 p-6 last:border-b-0
                {{ !$notification->is_read ? 'bg-[#fffdf2]' : 'bg-white' }}"
            >

                <div
                    class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between"
                >


                    {{-- GAUCHE --}}
                    <div
                        class="flex min-w-0 flex-1 gap-4"
                    >

                        {{-- INDICATEUR --}}
                        <div
                            class="w-1 shrink-0 rounded-full {{ $barClass }}"
                        ></div>


                        <div
                            class="min-w-0"
                        >


                            {{-- ÉTATS --}}
                            <div
                                class="flex flex-wrap items-center gap-2"
                            >

                                <span
                                    class="rounded-full px-3 py-1 text-xs font-black {{ $statusClasses }}"
                                >
                                    {{ $statusLabel }}
                                </span>


                                @if(!$notification->is_read)

                                    <span
                                        class="rounded-full bg-[#245B45] px-3 py-1 text-xs font-black text-white"
                                    >
                                        Nouveau
                                    </span>

                                @else

                                    <span
                                        class="rounded-full bg-gray-100 px-3 py-1 text-xs font-bold text-gray-500"
                                    >
                                        Lu
                                    </span>

                                @endif

                            </div>



                            {{-- MESSAGE --}}
                            <p
                                class="mt-3 font-bold leading-6 text-[#263A30]"
                            >
                                {{ $notification->message ?? 'Nouvelle notification.' }}
                            </p>



                            {{-- INFOS FACTURE --}}
                            <div
                                class="mt-3 flex flex-wrap gap-x-5 gap-y-2 text-sm text-gray-500"
                            >

                                @if($invoice)

                                    <span>
                                        Facture #{{ $invoice->id }}
                                    </span>

                                @else

                                    <span
                                        class="font-semibold text-red-500"
                                    >
                                        Facture indisponible
                                    </span>

                                @endif


                                <span>
                                    {{ $notification->created_at?->format('d/m/Y à H:i') ?? '-' }}
                                </span>

                            </div>


                            {{-- NOTE ADMIN --}}
                            @if(
                                $invoice &&
                                !empty($invoice->admin_note)
                            )

                                <div
                                    class="mt-4 rounded-xl bg-[#F7F4E8] px-4 py-3"
                                >

                                    <p
                                        class="text-xs font-black uppercase tracking-wider text-[#789383]"
                                    >
                                        Note administrateur
                                    </p>

                                    <p
                                        class="mt-1 text-sm leading-6 text-gray-600"
                                    >
                                        {{ $invoice->admin_note }}
                                    </p>

                                </div>

                            @endif


                        </div>

                    </div>



                    {{-- BOUTON --}}
                    <div
                        class="shrink-0"
                    >

                        @if($invoice)

                            <a
                                href="{{ route('user.notifications.open', $notification) }}"
                                class="inline-flex items-center justify-center rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
                            >
                                Consulter la facture
                            </a>

                        @else

                            <span
                                class="inline-flex cursor-not-allowed items-center justify-center rounded-xl bg-gray-100 px-5 py-3 text-sm font-bold text-gray-400"
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
                    Les notifications concernant la validation
                    ou le refus de vos factures apparaîtront ici.
                </p>


                <a
                    href="{{ route('user.invoices.index') }}"
                    class="mt-6 inline-flex rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
                >
                    Voir mes factures
                </a>

            </div>


        @endforelse

    </section>



    {{-- ========================================================= --}}
    {{-- RETOUR --}}
    {{-- ========================================================= --}}

    <div
        class="mt-8 flex flex-wrap gap-3"
    >

        <a
            href="{{ route('user.dashboard') }}"
            class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
        >
            Retour au tableau de bord
        </a>


        <a
            href="{{ route('user.invoices.index') }}"
            class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
        >
            Mes factures
        </a>

    </div>


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