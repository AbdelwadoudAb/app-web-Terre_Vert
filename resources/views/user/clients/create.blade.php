<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Ajouter un client | Terre Verte</title>


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
    class="mx-auto w-full max-w-5xl flex-1 px-6 py-8"
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
                    Étape 1 sur 2
                </p>


                <h2
                    class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                >
                    Ajouter un client
                </h2>


                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Renseignez les coordonnées du client.
                    Après l'enregistrement, vous serez automatiquement
                    dirigé vers la sélection des produits de sa facture.
                </p>

            </div>


            <a
                href="{{ route('user.clients.index') }}"
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-white px-6 py-3 font-bold text-[#245B45] transition hover:bg-[#F7F4E8]"
            >
                Voir mes clients
            </a>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- ÉTAPES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 grid gap-4 md:grid-cols-2"
    >

        {{-- ÉTAPE 1 --}}
        <div
            class="rounded-2xl border-2 border-[#245B45] bg-white p-5"
        >

            <div
                class="flex items-center gap-4"
            >

                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#245B45] font-black text-white"
                >
                    1
                </div>


                <div>

                    <p
                        class="font-black text-[#1F3A2D]"
                    >
                        Informations du client
                    </p>

                    <p
                        class="mt-1 text-sm text-gray-500"
                    >
                        Nom, téléphone et adresse.
                    </p>

                </div>

            </div>

        </div>



        {{-- ÉTAPE 2 --}}
        <div
            class="rounded-2xl border border-[#e7e2d3] bg-white p-5"
        >

            <div
                class="flex items-center gap-4"
            >

                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#F7F4E8] font-black text-[#789383]"
                >
                    2
                </div>


                <div>

                    <p
                        class="font-black text-[#1F3A2D]"
                    >
                        Produits de la facture
                    </p>

                    <p
                        class="mt-1 text-sm text-gray-500"
                    >
                        Produits, quantités et total.
                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- ERREURS GLOBALES --}}
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

    <section
        class="mt-6 rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm md:p-8"
    >


        {{-- TITRE --}}
        <div
            class="border-b border-gray-100 pb-6"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
            >
                Informations
            </p>


            <h3
                class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
            >
                Coordonnées du client
            </h3>


            <p
                class="mt-2 text-sm leading-6 text-gray-500"
            >
                Les champs Nom, Téléphone et Adresse sont obligatoires.
                Le CIN et l'adresse e-mail sont facultatifs.
            </p>

        </div>



        <form
            action="{{ route('user.clients.store') }}"
            method="POST"
            class="mt-8 space-y-6"
        >

            @csrf



            {{-- ========================================================= --}}
            {{-- NOM --}}
            {{-- ========================================================= --}}

            <div>

                <label
                    for="name"
                    class="mb-2 block text-sm font-bold text-[#1F3A2D]"
                >
                    Nom complet
                    <span class="text-red-500">*</span>
                </label>


                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Nom complet du client"
                    class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm transition focus:border-[#245B45] focus:ring-[#245B45] @error('name') border-red-400 @enderror"
                >


                @error('name')

                    <p
                        class="mt-2 text-sm font-semibold text-red-600"
                    >
                        {{ $message }}
                    </p>

                @enderror

            </div>



            {{-- ========================================================= --}}
            {{-- CIN + TÉLÉPHONE --}}
            {{-- ========================================================= --}}

            <div
                class="grid gap-6 md:grid-cols-2"
            >


                {{-- CIN --}}
                <div>

                    <label
                        for="cin"
                        class="mb-2 block text-sm font-bold text-[#1F3A2D]"
                    >
                        CIN
                    </label>


                    <input
                        id="cin"
                        name="cin"
                        type="text"
                        value="{{ old('cin') }}"
                        placeholder="Exemple : AB123456"
                        class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm transition focus:border-[#245B45] focus:ring-[#245B45] @error('cin') border-red-400 @enderror"
                    >


                    <p
                        class="mt-2 text-xs text-gray-400"
                    >
                        Facultatif
                    </p>


                    @error('cin')

                        <p
                            class="mt-2 text-sm font-semibold text-red-600"
                        >
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- TÉLÉPHONE --}}
                <div>

                    <label
                        for="phone"
                        class="mb-2 block text-sm font-bold text-[#1F3A2D]"
                    >
                        Téléphone
                        <span class="text-red-500">*</span>
                    </label>


                    <input
                        id="phone"
                        name="phone"
                        type="tel"
                        value="{{ old('phone') }}"
                        required
                        autocomplete="tel"
                        placeholder="Exemple : 0612345678"
                        class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm transition focus:border-[#245B45] focus:ring-[#245B45] @error('phone') border-red-400 @enderror"
                    >


                    @error('phone')

                        <p
                            class="mt-2 text-sm font-semibold text-red-600"
                        >
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- EMAIL --}}
            {{-- ========================================================= --}}

            <div>

                <label
                    for="email"
                    class="mb-2 block text-sm font-bold text-[#1F3A2D]"
                >
                    Adresse e-mail
                </label>


                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    placeholder="client@email.com"
                    class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm transition focus:border-[#245B45] focus:ring-[#245B45] @error('email') border-red-400 @enderror"
                >


                <p
                    class="mt-2 text-xs text-gray-400"
                >
                    Facultatif
                </p>


                @error('email')

                    <p
                        class="mt-2 text-sm font-semibold text-red-600"
                    >
                        {{ $message }}
                    </p>

                @enderror

            </div>



            {{-- ========================================================= --}}
            {{-- ADRESSE --}}
            {{-- ========================================================= --}}

            <div>

                <label
                    for="address"
                    class="mb-2 block text-sm font-bold text-[#1F3A2D]"
                >
                    Adresse
                    <span class="text-red-500">*</span>
                </label>


                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    required
                    autocomplete="street-address"
                    placeholder="Adresse complète du client"
                    class="w-full resize-none rounded-xl border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm transition focus:border-[#245B45] focus:ring-[#245B45] @error('address') border-red-400 @enderror"
                >{{ old('address') }}</textarea>


                @error('address')

                    <p
                        class="mt-2 text-sm font-semibold text-red-600"
                    >
                        {{ $message }}
                    </p>

                @enderror

            </div>



            {{-- ========================================================= --}}
            {{-- PROCHAINE ÉTAPE --}}
            {{-- ========================================================= --}}

            <div
                class="rounded-2xl border border-[#dce5dc] bg-[#eef2e7] p-5"
            >

                <p
                    class="font-black text-[#1F3A2D]"
                >
                    Étape suivante : ajouter les produits
                </p>


                <p
                    class="mt-2 text-sm leading-6 text-gray-600"
                >
                    Après l'enregistrement du client, la page de création
                    de facture s'ouvrira automatiquement avec ce client
                    déjà sélectionné.
                </p>


                <div
                    class="mt-4 grid gap-3 sm:grid-cols-3"
                >

                    <div
                        class="rounded-xl bg-white px-4 py-3"
                    >

                        <p
                            class="text-xs font-bold uppercase tracking-wide text-[#789383]"
                        >
                            Produit
                        </p>

                        <p
                            class="mt-1 text-sm font-bold text-[#245B45]"
                        >
                            Choisir le produit
                        </p>

                    </div>


                    <div
                        class="rounded-xl bg-white px-4 py-3"
                    >

                        <p
                            class="text-xs font-bold uppercase tracking-wide text-[#789383]"
                        >
                            Quantité
                        </p>

                        <p
                            class="mt-1 text-sm font-bold text-[#245B45]"
                        >
                            Indiquer la quantité
                        </p>

                    </div>


                    <div
                        class="rounded-xl bg-white px-4 py-3"
                    >

                        <p
                            class="text-xs font-bold uppercase tracking-wide text-[#789383]"
                        >
                            Total
                        </p>

                        <p
                            class="mt-1 text-sm font-bold text-[#245B45]"
                        >
                            Calcul automatique
                        </p>

                    </div>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- BOUTONS --}}
            {{-- ========================================================= --}}

            <div
                class="flex flex-col gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:items-center"
            >

                <button
                    type="submit"
                    class="rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                >
                    Enregistrer et ajouter les produits
                </button>


                <a
                    href="{{ route('user.clients.index') }}"
                    class="rounded-xl border border-gray-300 px-6 py-3 text-center font-bold text-gray-600 transition hover:bg-gray-50"
                >
                    Annuler
                </a>


                <a
                    href="{{ route('user.dashboard') }}"
                    class="rounded-xl border border-[#245B45] px-6 py-3 text-center font-bold text-[#245B45] transition hover:bg-[#eef2e7] sm:ml-auto"
                >
                    Tableau de bord
                </a>

            </div>

        </form>

    </section>



    {{-- ========================================================= --}}
    {{-- FONCTIONNEMENT --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
        >
            Fonctionnement
        </p>


        <h3
            class="font-playfair mt-1 text-xl font-bold text-[#1F3A2D]"
        >
            Création de la facture
        </h3>


        <div
            class="mt-5 grid gap-4 md:grid-cols-3"
        >

            <div
                class="rounded-2xl bg-[#F7F4E8] p-5"
            >

                <p
                    class="text-sm font-black text-[#245B45]"
                >
                    1. Client
                </p>

                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Enregistrez les coordonnées du client.
                </p>

            </div>


            <div
                class="rounded-2xl bg-[#F7F4E8] p-5"
            >

                <p
                    class="text-sm font-black text-[#245B45]"
                >
                    2. Produits
                </p>

                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Sélectionnez un ou plusieurs produits
                    et leurs quantités.
                </p>

            </div>


            <div
                class="rounded-2xl bg-[#F7F4E8] p-5"
            >

                <p
                    class="text-sm font-black text-[#245B45]"
                >
                    3. Facture
                </p>

                <p
                    class="mt-2 text-sm leading-6 text-gray-500"
                >
                    Le total est calculé puis la facture
                    est envoyée à l'administrateur.
                </p>

            </div>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- ACCÈS RAPIDES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 rounded-3xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
        >
            Accès rapides
        </p>


        <div
            class="mt-4 flex flex-wrap gap-3"
        >

            <a
                href="{{ route('user.clients.index') }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 text-sm font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Mes clients
            </a>


            <a
                href="{{ route('user.invoices.create') }}"
                class="rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
            >
                Nouvelle facture
            </a>


            <a
                href="{{ route('user.invoices.index') }}"
                class="rounded-xl bg-yellow-50 px-5 py-3 text-sm font-bold text-yellow-700 transition hover:bg-yellow-100"
            >
                Mes factures
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