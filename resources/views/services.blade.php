<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Services - Terre Verte</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
        }

        .font-title {
            font-family: 'Playfair Display', serif;
        }
    </style>

</head>


<body class="bg-[#f8f6ed] text-[#263a30]">


{{-- ========================================================= --}}
{{-- HEADER --}}
{{-- ========================================================= --}}

<header
    class="sticky top-0 z-50 border-b border-[#e8e2d0] bg-white/95 shadow-sm backdrop-blur"
>

    <div
        class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2"
    >

        {{-- LOGO --}}
        <a
            href="{{ route('home') }}"
            class="flex items-center"
        >

            <img
                src="{{ asset('images/logo-terre-verte.png') }}"
                alt="Terre Verte"
                class="h-28 w-auto object-contain"
            >

        </a>


        {{-- NAVIGATION --}}
        <nav class="hidden items-center gap-8 lg:flex">

            <a
                href="{{ route('home') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245b45]"
            >
                Accueil
            </a>

            <a
                href="{{ route('products.index') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245b45]"
            >
                Produits
            </a>

            <a
                href="{{ route('about') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245b45]"
            >
                À propos
            </a>

            <a
                href="{{ route('services') }}"
                class="font-bold text-[#245b45]"
            >
                Services
            </a>

            <a
                href="{{ route('contact') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245b45]"
            >
                Contact
            </a>

        </nav>


        {{-- AUTH --}}
        <div>

            @auth

                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex h-11 items-center justify-center rounded-xl bg-[#245b45] px-6 text-sm font-bold text-white shadow-sm transition hover:bg-[#194936]"
                >
                    Mon espace
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="inline-flex h-11 items-center justify-center rounded-xl bg-[#245b45] px-6 text-sm font-bold text-white shadow-sm transition hover:bg-[#194936]"
                >
                    Connexion
                </a>

            @endauth

        </div>

    </div>

</header>



{{-- ========================================================= --}}
{{-- HERO --}}
{{-- ========================================================= --}}

<section class="relative overflow-hidden bg-[#245b45]">

    <div
        class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-white/5"
    ></div>

    <div
        class="absolute -bottom-40 -left-32 h-96 w-96 rounded-full bg-[#f5d85f]/10"
    ></div>


    <div
        class="relative mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 lg:grid-cols-2 lg:py-28"
    >


        {{-- TEXTE --}}
        <div>

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#f5d85f]"
            >
                Nos services
            </p>


            <h1
                class="font-title mt-4 text-5xl font-bold leading-tight text-white md:text-6xl"
            >
                Des services pensés pour mieux vous accompagner.
            </h1>


            <p
                class="mt-6 max-w-xl text-lg leading-8 text-white/75"
            >
                Terre Verte vous accompagne dans la découverte de produits
                agricoles de qualité grâce à une plateforme simple,
                claire et professionnelle.
            </p>


            <div class="mt-8 flex flex-wrap gap-4">

                <a
                    href="{{ route('products.index') }}"
                    class="rounded-xl bg-[#f5d85f] px-7 py-3.5 font-bold text-[#1f3a2d] transition hover:bg-[#ead047]"
                >
                    Voir nos produits
                </a>


                <a
                    href="{{ route('contact') }}"
                    class="rounded-xl border border-white/30 px-7 py-3.5 font-bold text-white transition hover:bg-white/10"
                >
                    Nous contacter
                </a>

            </div>

        </div>



        {{-- IMAGE --}}
        <div class="relative">

            <div
                class="absolute -left-10 -top-10 h-40 w-40 rounded-full bg-[#f5d85f]/20 blur-3xl"
            ></div>


            <div class="overflow-hidden rounded-[40px] shadow-2xl">

                <img
                    src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1200&q=85"
                    alt="Services agricoles Terre Verte"
                    class="h-[520px] w-full object-cover"
                >

            </div>


            <div
                class="absolute -bottom-6 right-6 rounded-2xl bg-white px-6 py-5 shadow-xl"
            >

                <p class="font-bold text-[#245b45]">
                    Qualité • Proximité • Service
                </p>

            </div>

        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- INTRODUCTION --}}
{{-- ========================================================= --}}

<section class="mx-auto max-w-7xl px-6 py-24">

    <div class="mx-auto max-w-3xl text-center">

        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
        >
            Notre accompagnement
        </p>


        <h2
            class="font-title mt-3 text-4xl font-bold text-[#1f3a2d]"
        >
            Une expérience simple du catalogue jusqu'au contact
        </h2>


        <p
            class="mt-5 text-lg leading-8 text-gray-600"
        >
            Notre plateforme permet de consulter les produits disponibles,
            découvrir leurs caractéristiques et contacter facilement
            notre équipe pour obtenir les informations nécessaires.
        </p>

    </div>

</section>



{{-- ========================================================= --}}
{{-- SERVICES --}}
{{-- ========================================================= --}}

<section class="bg-white py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div class="text-center">

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
            >
                Ce que nous proposons
            </p>


            <h2
                class="font-title mt-3 text-4xl font-bold text-[#1f3a2d]"
            >
                Les services Terre Verte
            </h2>


            <p
                class="mx-auto mt-4 max-w-2xl leading-7 text-gray-500"
            >
                Des services conçus pour faciliter la consultation
                des produits et la communication avec notre équipe.
            </p>

        </div>



        <div class="mt-14 grid gap-7 md:grid-cols-2 lg:grid-cols-3">


            {{-- SERVICE 1 --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Service 01
                </p>


                <h3
                    class="mt-4 text-2xl font-black text-[#1f3a2d]"
                >
                    Catalogue de produits
                </h3>


                <p class="mt-4 leading-7 text-gray-500">
                    Consultez facilement notre sélection de produits
                    agricoles disponibles sur la plateforme.
                </p>


                <a
                    href="{{ route('products.index') }}"
                    class="mt-6 inline-flex font-bold text-[#245b45] transition hover:text-[#194936]"
                >
                    Découvrir le catalogue
                </a>

            </div>



            {{-- SERVICE 2 --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Service 02
                </p>


                <h3
                    class="mt-4 text-2xl font-black text-[#1f3a2d]"
                >
                    Informations détaillées
                </h3>


                <p class="mt-4 leading-7 text-gray-500">
                    Retrouvez les informations essentielles de chaque
                    produit : description, prix, catégorie et disponibilité.
                </p>

            </div>



            {{-- SERVICE 3 --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Service 03
                </p>


                <h3
                    class="mt-4 text-2xl font-black text-[#1f3a2d]"
                >
                    Accompagnement client
                </h3>


                <p class="mt-4 leading-7 text-gray-500">
                    Notre équipe reste disponible pour répondre
                    à vos questions et vous orienter selon vos besoins.
                </p>


                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-[#245b45] transition hover:text-[#194936]"
                >
                    Contacter notre équipe
                </a>

            </div>



            {{-- SERVICE 4 --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Service 04
                </p>


                <h3
                    class="mt-4 text-2xl font-black text-[#1f3a2d]"
                >
                    Suivi professionnel
                </h3>


                <p class="mt-4 leading-7 text-gray-500">
                    Terre Verte met l'accent sur une organisation
                    professionnelle et un suivi clair des demandes.
                </p>

            </div>



            {{-- SERVICE 5 --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Service 05
                </p>


                <h3
                    class="mt-4 text-2xl font-black text-[#1f3a2d]"
                >
                    Qualité des produits
                </h3>


                <p class="mt-4 leading-7 text-gray-500">
                    Nous privilégions une sélection de produits
                    agricoles frais et adaptés aux besoins de nos clients.
                </p>

            </div>



            {{-- SERVICE 6 --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Service 06
                </p>


                <h3
                    class="mt-4 text-2xl font-black text-[#1f3a2d]"
                >
                    Disponibilité
                </h3>


                <p class="mt-4 leading-7 text-gray-500">
                    La plateforme indique clairement si un produit
                    est disponible ou en rupture afin de faciliter
                    votre consultation.
                </p>

            </div>


        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- COMMENT ÇA MARCHE --}}
{{-- ========================================================= --}}

<section class="mx-auto max-w-7xl px-6 py-24">

    <div class="grid gap-14 lg:grid-cols-2 lg:items-center">


        {{-- TEXTE --}}
        <div>

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
            >
                Fonctionnement
            </p>


            <h2
                class="font-title mt-3 text-4xl font-bold leading-tight text-[#1f3a2d]"
            >
                Quelques étapes simples
            </h2>


            <p class="mt-5 text-lg leading-8 text-gray-600">
                Terre Verte facilite l'accès aux informations
                essentielles grâce à une navigation simple.
            </p>


            <a
                href="{{ route('products.index') }}"
                class="mt-8 inline-flex rounded-xl bg-[#245b45] px-7 py-3.5 font-bold text-white transition hover:bg-[#194936]"
            >
                Commencer maintenant
            </a>

        </div>



        {{-- ÉTAPES --}}
        <div class="space-y-5">


            <div
                class="flex gap-5 rounded-3xl bg-white p-6 shadow-sm"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#245b45] font-black text-white"
                >
                    01
                </div>

                <div>

                    <h3 class="text-lg font-black text-[#1f3a2d]">
                        Consultez le catalogue
                    </h3>

                    <p class="mt-2 leading-7 text-gray-500">
                        Parcourez les produits disponibles sur Terre Verte.
                    </p>

                </div>

            </div>



            <div
                class="flex gap-5 rounded-3xl bg-white p-6 shadow-sm"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#245b45] font-black text-white"
                >
                    02
                </div>

                <div>

                    <h3 class="text-lg font-black text-[#1f3a2d]">
                        Consultez le produit
                    </h3>

                    <p class="mt-2 leading-7 text-gray-500">
                        Retrouvez son prix, sa description
                        et sa disponibilité.
                    </p>

                </div>

            </div>



            <div
                class="flex gap-5 rounded-3xl bg-white p-6 shadow-sm"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#245b45] font-black text-white"
                >
                    03
                </div>

                <div>

                    <h3 class="text-lg font-black text-[#1f3a2d]">
                        Contactez-nous
                    </h3>

                    <p class="mt-2 leading-7 text-gray-500">
                        Envoyez votre demande directement
                        depuis notre formulaire de contact.
                    </p>

                </div>

            </div>


        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- ENGAGEMENTS --}}
{{-- ========================================================= --}}

<section class="bg-[#eaf1ec] py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div class="text-center">

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
            >
                Nos engagements
            </p>


            <h2
                class="font-title mt-3 text-4xl font-bold text-[#1f3a2d]"
            >
                Pourquoi choisir Terre Verte ?
            </h2>

        </div>



        <div class="mt-12 grid gap-7 md:grid-cols-3">


            <div class="rounded-3xl bg-white p-8 shadow-sm">

                <div
                    class="h-1.5 w-14 rounded-full bg-[#245b45]"
                ></div>

                <h3
                    class="mt-6 text-xl font-black text-[#1f3a2d]"
                >
                    Simplicité
                </h3>

                <p class="mt-3 leading-7 text-gray-500">
                    Une plateforme claire et facile à utiliser.
                </p>

            </div>



            <div class="rounded-3xl bg-white p-8 shadow-sm">

                <div
                    class="h-1.5 w-14 rounded-full bg-[#f5d85f]"
                ></div>

                <h3
                    class="mt-6 text-xl font-black text-[#1f3a2d]"
                >
                    Proximité
                </h3>

                <p class="mt-3 leading-7 text-gray-500">
                    Une équipe disponible pour accompagner les clients.
                </p>

            </div>



            <div class="rounded-3xl bg-white p-8 shadow-sm">

                <div
                    class="h-1.5 w-14 rounded-full bg-[#789383]"
                ></div>

                <h3
                    class="mt-6 text-xl font-black text-[#1f3a2d]"
                >
                    Fiabilité
                </h3>

                <p class="mt-3 leading-7 text-gray-500">
                    Des informations claires sur les produits disponibles.
                </p>

            </div>


        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}

<section class="px-6 py-24">

    <div
        class="mx-auto max-w-7xl overflow-hidden rounded-[40px] bg-[#245b45] px-8 py-16 text-center text-white shadow-xl sm:px-16"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-[#f5d85f]"
        >
            Besoin d'informations ?
        </p>


        <h2
            class="font-title mx-auto mt-4 max-w-3xl text-4xl font-bold sm:text-5xl"
        >
            Notre équipe est à votre disposition.
        </h2>


        <p
            class="mx-auto mt-5 max-w-2xl text-green-100"
        >
            Contactez-nous pour obtenir davantage d'informations
            concernant nos produits et nos services.
        </p>


        <div class="mt-8 flex flex-wrap justify-center gap-4">

            <a
                href="{{ route('contact') }}"
                class="rounded-xl bg-[#f5d85f] px-8 py-4 font-black text-[#263a30] transition hover:-translate-y-1"
            >
                Nous contacter
            </a>


            <a
                href="{{ route('products.index') }}"
                class="rounded-xl bg-white px-8 py-4 font-black text-[#245b45] transition hover:-translate-y-1"
            >
                Voir les produits
            </a>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer class="bg-[#1c4636] text-white">

    <div
        class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-2 lg:grid-cols-4"
    >


        {{-- LOGO --}}
        <div>

            <a
                href="{{ route('home') }}"
                class="inline-flex"
            >

                <img
                    src="{{ asset('images/logo-terre-verte.png') }}"
                    alt="Terre Verte"
                    class="h-28 w-auto object-contain"
                >

            </a>


            <p
                class="mt-5 max-w-xs text-sm leading-7 text-green-100"
            >
                Des produits agricoles frais et de qualité,
                au service de nos clients.
            </p>

        </div>



        {{-- NAVIGATION --}}
        <div>

            <h3 class="font-black">
                Navigation
            </h3>


            <div
                class="mt-5 space-y-3 text-sm text-green-100"
            >

                <p>
                    <a
                        href="{{ route('home') }}"
                        class="transition hover:text-white"
                    >
                        Accueil
                    </a>
                </p>


                <p>
                    <a
                        href="{{ route('products.index') }}"
                        class="transition hover:text-white"
                    >
                        Produits
                    </a>
                </p>


                <p>
                    <a
                        href="{{ route('about') }}"
                        class="transition hover:text-white"
                    >
                        À propos
                    </a>
                </p>


                <p>
                    <a
                        href="{{ route('services') }}"
                        class="transition hover:text-white"
                    >
                        Services
                    </a>
                </p>


                <p>
                    <a
                        href="{{ route('contact') }}"
                        class="transition hover:text-white"
                    >
                        Contact
                    </a>
                </p>

            </div>

        </div>



        {{-- CONTACT --}}
        <div>

            <h3 class="font-black">
                Contact
            </h3>


            <div class="mt-5 space-y-3 text-sm text-green-100">

                <p>
                    Casablanca, Maroc
                </p>

                <p>
                    contact@terreverte.ma
                </p>

                <p>
                    +212 6 00 00 00 00
                </p>

            </div>

        </div>



        {{-- ESPACE --}}
        <div>

            <h3 class="font-black">
                Espace professionnel
            </h3>


            <p class="mt-5 text-sm leading-7 text-green-100">
                Accédez à votre espace sécurisé pour gérer
                les opérations Terre Verte.
            </p>


            @auth

                <a
                    href="{{ route('dashboard') }}"
                    class="mt-5 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-black text-[#245b45] transition hover:bg-[#f5d85f]"
                >
                    Mon espace
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="mt-5 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-black text-[#245b45] transition hover:bg-[#f5d85f]"
                >
                    Connexion
                </a>

            @endauth

        </div>


    </div>



    <div class="border-t border-white/10">

        <div
            class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-6 py-5 text-xs text-green-200"
        >

            <p>
                © {{ date('Y') }} Terre Verte. Tous droits réservés.
            </p>

            <p>
                Plateforme de gestion agricole
            </p>

        </div>

    </div>

</footer>


</body>

</html>