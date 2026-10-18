<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mon espace | Terre Verte</title>

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


    {{-- HEADER --}}
    <header class="border-b border-[#e5dfcf] bg-white">

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

                    <p class="text-xs text-gray-500">
                        Espace Utilisateur
                    </p>

                </div>

            </a>


            {{-- NAVIGATION --}}
            <div class="flex items-center gap-3">

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


    {{-- CONTENU --}}
    <main
        class="mx-auto w-full max-w-7xl flex-1 px-6 py-8"
    >

        {{-- HERO --}}
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
                        Mon espace
                    </p>


                    <h2
                        class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                    >
                        Bienvenue,
                        {{ auth()->user()->name }}
                    </h2>


                    <p
                        class="mt-4 max-w-2xl leading-7 text-white/75"
                    >
                        Gérez vos clients, créez vos factures
                        et consultez l'historique de vos demandes.
                    </p>

                </div>


                <div
                    class="rounded-2xl border border-white/10 bg-white/10 px-6 py-4 backdrop-blur"
                >

                    <p
                        class="text-sm font-semibold text-white/70"
                    >
                        Connecté avec
                    </p>

                    <p
                        class="mt-1 font-black text-white"
                    >
                        {{ auth()->user()->email }}
                    </p>

                </div>

            </div>

        </section>


        {{-- ACTION PRINCIPALE --}}
        <section
            class="mt-6 rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
        >

            <div
                class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Facturation
                    </p>

                    <h3
                        class="font-playfair mt-2 text-3xl font-bold text-[#1F3A2D]"
                    >
                        Créer une nouvelle facture
                    </h3>

                    <p
                        class="mt-3 max-w-2xl leading-7 text-gray-500"
                    >
                        Sélectionnez un client, ajoutez les produits
                        et envoyez la facture à l'administrateur pour validation.
                    </p>

                </div>


                <a
                    href="{{ route('user.invoices.create') }}"
                    class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#245B45] px-6 py-3.5 font-bold text-white transition hover:bg-[#194936]"
                >
                    + Nouvelle facture
                </a>

            </div>

        </section>


        {{-- GESTION --}}
        <section class="mt-8">

            <div class="mb-5">

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
                class="grid gap-5 md:grid-cols-2 lg:grid-cols-3"
            >

                {{-- CLIENTS --}}
                <a
                    href="{{ route('user.clients.index') }}"
                    class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                >

                    <div
                        class="h-1 w-12 rounded-full bg-[#245B45]"
                    ></div>

                    <h4
                        class="mt-5 text-xl font-black text-[#1F3A2D]"
                    >
                        Clients
                    </h4>

                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Ajoutez et gérez les coordonnées de vos clients.
                    </p>

                    <p
                        class="mt-5 font-bold text-[#245B45]"
                    >
                        Gérer les clients
                    </p>

                </a>


                {{-- FACTURES --}}
                <a
                    href="{{ route('user.invoices.index') }}"
                    class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                >

                    <div
                        class="h-1 w-12 rounded-full bg-[#F5D85F]"
                    ></div>

                    <h4
                        class="mt-5 text-xl font-black text-[#1F3A2D]"
                    >
                        Mes factures
                    </h4>

                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Consultez vos factures et leur statut de validation.
                    </p>

                    <p
                        class="mt-5 font-bold text-[#245B45]"
                    >
                        Voir mes factures
                    </p>

                </a>


                {{-- PROFIL --}}
                <a
                    href="{{ route('profile.edit') }}"
                    class="rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
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
                        Modifiez vos informations personnelles
                        et votre mot de passe.
                    </p>

                    <p
                        class="mt-5 font-bold text-[#245B45]"
                    >
                        Modifier mon profil
                    </p>

                </a>

            </div>

        </section>


        {{-- FONCTIONNEMENT --}}
        <section class="mt-8">

            <div
                class="rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
            >

                <div>

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Fonctionnement
                    </p>

                    <h3
                        class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                    >
                        Comment créer une facture ?
                    </h3>

                </div>


                <div
                    class="mt-7 grid gap-5 md:grid-cols-3"
                >

                    {{-- ÉTAPE 1 --}}
                    <div
                        class="rounded-2xl bg-[#F7F4E8] p-5"
                    >

                        <span
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-[#245B45] text-sm font-black text-white"
                        >
                            1
                        </span>

                        <h4
                            class="mt-4 font-black text-[#1F3A2D]"
                        >
                            Ajouter le client
                        </h4>

                        <p
                            class="mt-2 text-sm leading-6 text-gray-500"
                        >
                            Enregistrez les coordonnées du client
                            concerné par la facture.
                        </p>

                    </div>


                    {{-- ÉTAPE 2 --}}
                    <div
                        class="rounded-2xl bg-[#F7F4E8] p-5"
                    >

                        <span
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-[#245B45] text-sm font-black text-white"
                        >
                            2
                        </span>

                        <h4
                            class="mt-4 font-black text-[#1F3A2D]"
                        >
                            Créer la facture
                        </h4>

                        <p
                            class="mt-2 text-sm leading-6 text-gray-500"
                        >
                            Choisissez les produits et indiquez
                            les quantités souhaitées.
                        </p>

                    </div>


                    {{-- ÉTAPE 3 --}}
                    <div
                        class="rounded-2xl bg-[#F7F4E8] p-5"
                    >

                        <span
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-[#245B45] text-sm font-black text-white"
                        >
                            3
                        </span>

                        <h4
                            class="mt-4 font-black text-[#1F3A2D]"
                        >
                            Validation Admin
                        </h4>

                        <p
                            class="mt-2 text-sm leading-6 text-gray-500"
                        >
                            La facture est envoyée à l'administrateur
                            qui pourra la valider ou la refuser.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- ACCÈS RAPIDES --}}
        <section class="mt-8">

            <div
                class="rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
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
                        + Nouvelle facture
                    </a>


                    <a
                        href="{{ route('user.clients.create') }}"
                        class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
                    >
                        + Ajouter un client
                    </a>


                    <a
                        href="{{ route('user.invoices.index') }}"
                        class="rounded-xl bg-yellow-50 px-5 py-3 font-bold text-yellow-700 transition hover:bg-yellow-100"
                    >
                        Mes factures
                    </a>


                    <a
                        href="{{ route('products.index') }}"
                        target="_blank"
                        class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
                    >
                        Catalogue public
                    </a>

                </div>

            </div>

        </section>

    </main>


    {{-- FOOTER --}}
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