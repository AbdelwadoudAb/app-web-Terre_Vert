<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Admin | Terre Verte</title>


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



        {{-- ACTIONS --}}
        <div
            class="flex items-center gap-3"
        >

            <a
                href="{{ route('home') }}"
                target="_blank"
                class="hidden rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7] sm:inline-flex"
            >
                Voir le site
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
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
                >
                    Tableau de bord
                </p>


                <h2
                    class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                >
                    Bienvenue dans l'administration
                </h2>


                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Gérez les produits, catégories, factures
                    et notifications de Terre Verte.
                </p>

            </div>


            <div
                class="rounded-2xl border border-white/10 bg-white/10 px-6 py-4 backdrop-blur"
            >

                <p
                    class="text-sm font-semibold text-white/70"
                >
                    Connecté en tant que
                </p>

                <p
                    class="mt-1 font-black text-white"
                >
                    {{ auth()->user()->name }}
                </p>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- STATISTIQUES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 grid gap-5 sm:grid-cols-2 xl:grid-cols-4"
    >


        {{-- TOTAL --}}
        <div
            class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
        >

            <div
                class="mb-5 h-1 w-12 rounded-full bg-[#245B45]"
            ></div>

            <p
                class="text-sm font-bold text-gray-500"
            >
                Total factures
            </p>

            <p
                class="mt-2 text-3xl font-black text-[#1F3A2D]"
            >
                {{ $totalInvoices ?? 0 }}
            </p>

        </div>



        {{-- EN ATTENTE --}}
        <div
            class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
        >

            <div
                class="mb-5 h-1 w-12 rounded-full bg-[#F5D85F]"
            ></div>

            <p
                class="text-sm font-bold text-gray-500"
            >
                En attente
            </p>

            <p
                class="mt-2 text-3xl font-black text-yellow-600"
            >
                {{ $pendingInvoices ?? 0 }}
            </p>

        </div>



        {{-- VALIDÉES --}}
        <div
            class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
        >

            <div
                class="mb-5 h-1 w-12 rounded-full bg-green-500"
            ></div>

            <p
                class="text-sm font-bold text-gray-500"
            >
                Validées
            </p>

            <p
                class="mt-2 text-3xl font-black text-green-600"
            >
                {{ $validatedInvoices ?? 0 }}
            </p>

        </div>



        {{-- REFUSÉES --}}
        <div
            class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
        >

            <div
                class="mb-5 h-1 w-12 rounded-full bg-red-500"
            ></div>

            <p
                class="text-sm font-bold text-gray-500"
            >
                Refusées
            </p>

            <p
                class="mt-2 text-3xl font-black text-red-600"
            >
                {{ $refusedInvoices ?? 0 }}
            </p>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- GESTION --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8"
    >

        <div
            class="mb-5"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
            >
                Gestion
            </p>

            <h3
                class="font-playfair mt-1 text-3xl font-bold text-[#1F3A2D]"
            >
                Accès rapide
            </h3>

        </div>


        <div
            class="grid gap-5 md:grid-cols-2 lg:grid-cols-6"
        >


            {{-- ========================================================= --}}
            {{-- FACTURES --}}
            {{-- ========================================================= --}}

            <a
                href="{{ route('admin.invoices.index') }}"
                class="group rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:col-span-1 lg:col-span-2"
            >

                <div
                    class="h-1 w-12 rounded-full bg-[#245B45]"
                ></div>


                <h4
                    class="mt-5 text-xl font-black text-[#1F3A2D]"
                >
                    Factures
                </h4>


                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Consultez, validez ou refusez les factures.
                </p>


                <p
                    class="mt-5 font-bold text-[#245B45]"
                >
                    Gérer les factures
                </p>

            </a>



            {{-- ========================================================= --}}
            {{-- PRODUITS --}}
            {{-- ========================================================= --}}

            <a
                href="{{ route('admin.products.index') }}"
                class="group rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:col-span-1 lg:col-span-2"
            >

                <div
                    class="h-1 w-12 rounded-full bg-[#245B45]"
                ></div>


                <h4
                    class="mt-5 text-xl font-black text-[#1F3A2D]"
                >
                    Produits
                </h4>


                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Ajoutez, modifiez et gérez les produits.
                </p>


                <p
                    class="mt-5 font-bold text-[#245B45]"
                >
                    Gérer les produits
                </p>

            </a>



            {{-- ========================================================= --}}
            {{-- CATÉGORIES --}}
            {{-- ========================================================= --}}

            <a
                href="{{ route('admin.categories.index') }}"
                class="group rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:col-span-2 lg:col-span-2"
            >

                <div
                    class="h-1 w-12 rounded-full bg-[#245B45]"
                ></div>


                <h4
                    class="mt-5 text-xl font-black text-[#1F3A2D]"
                >
                    Catégories
                </h4>


                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Organisez les produits par catégorie.
                </p>


                <p
                    class="mt-5 font-bold text-[#245B45]"
                >
                    Gérer les catégories
                </p>

            </a>



            {{-- ========================================================= --}}
            {{-- NOTIFICATIONS --}}
            {{-- ========================================================= --}}

            <a
                href="{{ route('admin.notifications.index') }}"
                class="relative group rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:col-span-1 lg:col-span-3"
            >

                @if(($unreadNotifications ?? 0) > 0)

                    <span
                        class="absolute right-5 top-5 inline-flex min-w-7 items-center justify-center rounded-full bg-red-500 px-2 py-1 text-xs font-black text-white"
                    >
                        {{ $unreadNotifications }}
                    </span>

                @endif


                <div
                    class="h-1 w-12 rounded-full bg-[#F5D85F]"
                ></div>


                <h4
                    class="mt-5 text-xl font-black text-[#1F3A2D]"
                >
                    Notifications
                </h4>


                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Consultez les nouvelles activités administratives.
                </p>


                <p
                    class="mt-5 font-bold text-[#245B45]"
                >
                    Voir les notifications
                </p>

            </a>



            {{-- ========================================================= --}}
            {{-- PROFIL --}}
            {{-- ========================================================= --}}

            <a
                href="{{ route('profile.edit') }}"
                class="group rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:col-span-1 lg:col-span-3"
            >

                <div
                    class="h-1 w-12 rounded-full bg-[#789383]"
                ></div>


                <h4
                    class="mt-5 text-xl font-black text-[#1F3A2D]"
                >
                    Mon profil
                </h4>


                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Modifiez vos informations et votre mot de passe.
                </p>


                <p
                    class="mt-5 font-bold text-[#245B45]"
                >
                    Modifier le profil
                </p>

            </a>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- DERNIÈRES FACTURES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8"
    >

        <div
            class="overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
        >

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
                        Dernières factures
                    </h3>

                </div>


                <a
                    href="{{ route('admin.invoices.index') }}"
                    class="font-bold text-[#245B45] hover:underline"
                >
                    Voir toutes
                </a>

            </div>



            @if(
                isset($latestInvoices)
                && $latestInvoices->count()
            )

                <div
                    class="overflow-x-auto"
                >

                    <table
                        class="w-full min-w-[850px]"
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
                                    Utilisateur
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

                            @foreach($latestInvoices as $invoice)

                                <tr
                                    class="border-b border-gray-100 last:border-0"
                                >

                                    <td
                                        class="px-6 py-5 font-black text-[#245B45]"
                                    >
                                        #{{ $invoice->id }}
                                    </td>


                                    <td
                                        class="px-6 py-5 font-semibold text-gray-700"
                                    >
                                        {{ $invoice->client?->name ?? 'Client supprimé' }}
                                    </td>


                                    <td
                                        class="px-6 py-5 text-gray-600"
                                    >
                                        {{ $invoice->user?->name ?? 'Utilisateur supprimé' }}
                                    </td>


                                    <td
                                        class="px-6 py-5 font-black text-[#245B45]"
                                    >
                                        {{ number_format(
                                            (float) $invoice->total,
                                            2,
                                            ',',
                                            ' '
                                        ) }}
                                        DH
                                    </td>


                                    <td
                                        class="px-6 py-5"
                                    >

                                        @if(
                                            $invoice->status === 'VALIDEE'
                                        )

                                            <span
                                                class="rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                            >
                                                Validée
                                            </span>

                                        @elseif(
                                            $invoice->status === 'REFUSEE'
                                        )

                                            <span
                                                class="rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                            >
                                                Refusée
                                            </span>

                                        @else

                                            <span
                                                class="rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700"
                                            >
                                                En attente
                                            </span>

                                        @endif

                                    </td>


                                    <td
                                        class="px-6 py-5 text-right"
                                    >

                                        <a
                                            href="{{ route(
                                                'admin.invoices.show',
                                                $invoice
                                            ) }}"
                                            class="rounded-xl bg-[#eef2e7] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                                        >
                                            Voir
                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div
                    class="px-6 py-12 text-center text-gray-500"
                >
                    Aucune facture récente.
                </div>

            @endif

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- NOTIFICATIONS RÉCENTES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >

        <div
            class="flex flex-col gap-4 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Activité
                </p>


                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Notifications récentes
                </h3>

            </div>


            <a
                href="{{ route('admin.notifications.index') }}"
                class="font-bold text-[#245B45] hover:underline"
            >
                Voir toutes les notifications
            </a>

        </div>



        <div>

            @forelse(
                ($notifications ?? collect())
                as $notification
            )

                <a
                    href="{{ route(
                        'admin.notifications.open',
                        $notification
                    ) }}"
                    class="block border-b border-gray-100 px-6 py-4 transition last:border-0 hover:bg-[#faf9f4]"
                >

                    <div
                        class="flex items-start justify-between gap-4"
                    >

                        <div>

                            <p
                                class="text-sm font-bold leading-6 text-[#1F3A2D]"
                            >
                                {{ $notification->message }}
                            </p>


                            <p
                                class="mt-1 text-xs text-gray-400"
                            >
                                {{ $notification->created_at?->format(
                                    'd/m/Y à H:i'
                                ) }}
                            </p>

                        </div>


                        @if(!$notification->is_read)

                            <span
                                class="shrink-0 rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-600"
                            >
                                Nouveau
                            </span>

                        @else

                            <span
                                class="shrink-0 rounded-full bg-gray-100 px-3 py-1 text-xs font-bold text-gray-500"
                            >
                                Lu
                            </span>

                        @endif

                    </div>

                </a>

            @empty

                <div
                    class="px-6 py-10 text-center text-gray-500"
                >
                    Aucune notification récente.
                </div>

            @endforelse

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- ACCÈS RAPIDES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8"
    >

        <div
            class="rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <h2
                class="font-playfair text-2xl font-bold text-[#1F3A2D]"
            >
                Accès rapides
            </h2>


            <div
                class="mt-6 flex flex-wrap gap-3"
            >


                {{-- AJOUTER PRODUIT --}}
                <a
                    href="{{ route('admin.products.create') }}"
                    class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
                >
                    Ajouter un produit
                </a>


                {{-- AJOUTER CATÉGORIE --}}
                <a
                    href="{{ route('admin.categories.create') }}"
                    class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                >
                    Ajouter une catégorie
                </a>


                {{-- FACTURES --}}
                <a
                    href="{{ route('admin.invoices.index') }}"
                    class="rounded-xl bg-yellow-50 px-5 py-3 font-bold text-yellow-700 transition hover:bg-yellow-100"
                >
                    Factures en attente
                </a>


                {{-- NOTIFICATIONS --}}
                <a
                    href="{{ route('admin.notifications.index') }}"
                    class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                >
                    Notifications

                    @if(
                        ($unreadNotifications ?? 0) > 0
                    )
                        ({{ $unreadNotifications }})
                    @endif
                </a>


                {{-- CATALOGUE --}}
                <a
                    href="{{ route('products.index') }}"
                    target="_blank"
                    class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
                >
                    Catalogue public
                </a>


                {{-- PROFIL --}}
                <a
                    href="{{ route('profile.edit') }}"
                    class="rounded-xl border border-gray-300 px-5 py-3 font-bold text-gray-600 transition hover:bg-gray-50"
                >
                    Mon profil
                </a>

            </div>

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