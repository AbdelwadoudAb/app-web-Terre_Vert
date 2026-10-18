<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Terre Verte | Produits agricoles frais</title>

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
                class="font-bold text-[#245b45] transition hover:text-[#4d8a64]"
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
                class="font-semibold text-gray-600 transition hover:text-[#245b45]"
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


        {{-- CONNEXION / DASHBOARD --}}
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

<section class="overflow-hidden bg-[#f8f6ed]">

    <div
        class="mx-auto grid min-h-[680px] max-w-7xl items-center gap-12 px-6 py-16 lg:grid-cols-2 lg:py-20"
    >


        {{-- TEXTE --}}
        <div>

            <div
                class="mb-6 inline-flex items-center rounded-full bg-[#e5efe9] px-4 py-2 text-sm font-bold text-[#245b45]"
            >
                Des produits frais sélectionnés avec soin
            </div>


            <h1
                class="font-title max-w-2xl text-5xl font-bold leading-[1.08] text-[#1f3a2d] sm:text-6xl lg:text-7xl"
            >
                La fraîcheur de la

                <span class="text-[#4d8a64]">
                    terre
                </span>

                directement chez vous.
            </h1>


            <p
                class="mt-7 max-w-xl text-lg leading-8 text-gray-600"
            >
                Terre Verte vous propose une sélection de produits agricoles
                frais, naturels et de qualité, issus d'une agriculture proche
                de vos besoins.
            </p>


            {{-- BOUTONS --}}
            <div class="mt-9 flex flex-wrap gap-4">

                <a
                    href="{{ route('products.index') }}"
                    class="inline-flex h-14 items-center justify-center rounded-xl bg-[#245b45] px-8 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#194936]"
                >
                    Découvrir nos produits
                </a>


                <a
                    href="{{ route('contact') }}"
                    class="inline-flex h-14 items-center justify-center rounded-xl border-2 border-[#245b45] px-8 font-bold text-[#245b45] transition hover:bg-[#245b45] hover:text-white"
                >
                    Nous contacter
                </a>

            </div>


            {{-- AVANTAGES --}}
            <div
                class="mt-10 flex flex-wrap gap-8 text-sm font-bold text-gray-600"
            >

                <span>
                    Produits frais
                </span>

                <span>
                    Qualité contrôlée
                </span>

                <span>
                    Service professionnel
                </span>

            </div>

        </div>



        {{-- IMAGE HERO --}}
        <div class="relative">

            <div
                class="absolute -left-10 -top-10 h-40 w-40 rounded-full bg-[#f5d85f]/40 blur-3xl"
            ></div>

            <div
                class="absolute -bottom-10 -right-10 h-52 w-52 rounded-full bg-[#8db69b]/40 blur-3xl"
            ></div>


            <div
                class="relative overflow-hidden rounded-[40px] shadow-2xl"
            >

                <img
                    src="https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=1200&q=85"
                    alt="Produits agricoles Terre Verte"
                    class="h-[580px] w-full object-cover"
                >


                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"
                ></div>


                <div
                    class="absolute bottom-6 left-6 right-6 rounded-2xl bg-white/95 p-5 shadow-xl backdrop-blur"
                >

                    <div
                        class="flex items-center justify-between gap-4"
                    >

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Notre engagement
                            </p>

                            <p
                                class="mt-1 text-lg font-black text-[#245b45]"
                            >
                                Fraîcheur • Qualité • Nature
                            </p>

                        </div>


                        <img
                            src="{{ asset('images/logo-terre-verte.png') }}"
                            alt="Terre Verte"
                            class="h-16 w-auto object-contain"
                        >

                    </div>

                </div>

            </div>

        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- STATISTIQUES --}}
{{-- ========================================================= --}}

<section class="bg-[#245b45]">

    <div
        class="mx-auto grid max-w-7xl grid-cols-2 gap-8 px-6 py-11 text-center text-white md:grid-cols-4"
    >

        <div>

            <p class="text-3xl font-black">
                100%
            </p>

            <p class="mt-1 text-sm text-green-100">
                Qualité
            </p>

        </div>


        <div>

            <p class="text-3xl font-black">
                Frais
            </p>

            <p class="mt-1 text-sm text-green-100">
                Produits sélectionnés
            </p>

        </div>


        <div>

            <p class="text-3xl font-black">
                Local
            </p>

            <p class="mt-1 text-sm text-green-100">
                Agriculture proche
            </p>

        </div>


        <div>

            <p class="text-3xl font-black">
                7j/7
            </p>

            <p class="mt-1 text-sm text-green-100">
                À votre écoute
            </p>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CATÉGORIES --}}
{{-- ========================================================= --}}

<section class="mx-auto max-w-7xl px-6 py-24">

    <div class="text-center">

        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
        >
            Nos catégories
        </p>


        <h2
            class="font-title mt-3 text-4xl font-bold text-[#1f3a2d]"
        >
            Tout ce que la terre offre de meilleur
        </h2>


        <p
            class="mx-auto mt-4 max-w-2xl text-gray-500"
        >
            Découvrez une sélection de produits agricoles frais,
            soigneusement choisis pour leur qualité.
        </p>

    </div>



    <div
        class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4"
    >


        {{-- LÉGUMES --}}
        <div
            class="rounded-3xl bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
        >

            <div
                class="h-1 w-14 rounded-full bg-[#245b45]"
            ></div>

            <h3 class="mt-6 text-xl font-black">
                Légumes
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-gray-500"
            >
                Des légumes frais pour vos recettes quotidiennes.
            </p>

            <a
                href="{{ route('products.index') }}"
                class="mt-5 inline-block font-bold text-[#245b45]"
            >
                Découvrir
            </a>

        </div>



        {{-- FRUITS --}}
        <div
            class="rounded-3xl bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
        >

            <div
                class="h-1 w-14 rounded-full bg-[#f5d85f]"
            ></div>

            <h3 class="mt-6 text-xl font-black">
                Fruits
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-gray-500"
            >
                Des fruits savoureux, naturels et pleins de fraîcheur.
            </p>

            <a
                href="{{ route('products.index') }}"
                class="mt-5 inline-block font-bold text-[#245b45]"
            >
                Découvrir
            </a>

        </div>



        {{-- CÉRÉALES --}}
        <div
            class="rounded-3xl bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
        >

            <div
                class="h-1 w-14 rounded-full bg-[#789383]"
            ></div>

            <h3 class="mt-6 text-xl font-black">
                Céréales
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-gray-500"
            >
                Une sélection de céréales adaptées à vos besoins.
            </p>

            <a
                href="{{ route('products.index') }}"
                class="mt-5 inline-block font-bold text-[#245b45]"
            >
                Découvrir
            </a>

        </div>



        {{-- PRODUITS NATURELS --}}
        <div
            class="rounded-3xl bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
        >

            <div
                class="h-1 w-14 rounded-full bg-[#4d8a64]"
            ></div>

            <h3 class="mt-6 text-xl font-black">
                Produits naturels
            </h3>

            <p
                class="mt-2 text-sm leading-6 text-gray-500"
            >
                Une gamme inspirée directement de la nature.
            </p>

            <a
                href="{{ route('products.index') }}"
                class="mt-5 inline-block font-bold text-[#245b45]"
            >
                Découvrir
            </a>

        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- PRODUITS POPULAIRES --}}
{{-- ========================================================= --}}

<section class="bg-white py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div
            class="flex flex-wrap items-end justify-between gap-5"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
                >
                    Notre sélection
                </p>

                <h2
                    class="font-title mt-3 text-4xl font-bold text-[#1f3a2d]"
                >
                    Produits populaires
                </h2>

                <p class="mt-3 max-w-xl text-gray-500">
                    Découvrez quelques-uns de nos produits frais sélectionnés
                    pour leur qualité.
                </p>

            </div>


            <a
                href="{{ route('products.index') }}"
                class="font-bold text-[#245b45] transition hover:text-[#194936]"
            >
                Voir tous les produits
            </a>

        </div>



        <div
            class="mt-12 grid gap-7 md:grid-cols-2 lg:grid-cols-3"
        >


            {{-- TOMATES --}}
            <article
                class="group overflow-hidden rounded-3xl border border-gray-100 bg-[#faf9f4] shadow-sm transition hover:shadow-xl"
            >

                <div class="overflow-hidden">

                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbRwH1Cg9AGSVB8ei31SMnsuGHjsFQN5MxhQGj7ZDWbcJUpZpf9y3w1Ac&s=10"
                        alt="Tomates fraîches"
                        class="h-64 w-full object-cover transition duration-500 group-hover:scale-105"
                    >

                </div>


                <div class="p-6">

                    <span
                        class="text-xs font-black uppercase tracking-widest text-[#789383]"
                    >
                        Légumes
                    </span>


                    <h3 class="mt-2 text-2xl font-black">
                        Tomates fraîches
                    </h3>


                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Tomates fraîches sélectionnées pour leur qualité.
                    </p>


                    <div
                        class="mt-5 flex items-center justify-between gap-3"
                    >

                        <p
                            class="text-xl font-black text-[#245b45]"
                        >
                            8,00 DH

                            <span
                                class="text-sm font-medium text-gray-400"
                            >
                                / kg
                            </span>
                        </p>


                        <a
                            href="{{ route('products.index') }}"
                            class="rounded-xl bg-[#245b45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
                        >
                            Voir
                        </a>

                    </div>

                </div>

            </article>



            {{-- CAROTTES --}}
            <article
                class="group overflow-hidden rounded-3xl border border-gray-100 bg-[#faf9f4] shadow-sm transition hover:shadow-xl"
            >

                <div class="overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cG9tbWVzfGVufDB8fDB8fHww"
                        alt="Carottes fraîches"
                        class="h-64 w-full object-cover transition duration-500 group-hover:scale-105"
                    >

                </div>


                <div class="p-6">

                    <span
                        class="text-xs font-black uppercase tracking-widest text-[#789383]"
                    >
                        Légumes
                    </span>


                    <h3 class="mt-2 text-2xl font-black">
                        Carottes
                    </h3>


                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Des carottes fraîches et soigneusement sélectionnées.
                    </p>


                    <div
                        class="mt-5 flex items-center justify-between gap-3"
                    >

                        <p
                            class="text-xl font-black text-[#245b45]"
                        >
                            7,50 DH

                            <span
                                class="text-sm font-medium text-gray-400"
                            >
                                / kg
                            </span>
                        </p>


                        <a
                            href="{{ route('products.index') }}"
                            class="rounded-xl bg-[#245b45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
                        >
                            Voir
                        </a>

                    </div>

                </div>

            </article>



            {{-- ORANGES --}}
            <article
                class="group overflow-hidden rounded-3xl border border-gray-100 bg-[#faf9f4] shadow-sm transition hover:shadow-xl"
            >

                <div class="overflow-hidden">

                    <img
                        src="https://www.shutterstock.com/image-photo/kiwi-on-wooden-background-whole-260nw-2573929821.jpg"
                        alt="Oranges"
                        class="h-64 w-full object-cover transition duration-500 group-hover:scale-105"
                    >

                </div>


                <div class="p-6">

                    <span
                        class="text-xs font-black uppercase tracking-widest text-[#789383]"
                    >
                        Fruits
                    </span>


                    <h3 class="mt-2 text-2xl font-black">
                        Oranges
                    </h3>


                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Des oranges savoureuses et naturellement fraîches.
                    </p>


                    <div
                        class="mt-5 flex items-center justify-between gap-3"
                    >

                        <p
                            class="text-xl font-black text-[#245b45]"
                        >
                            6,00 DH

                            <span
                                class="text-sm font-medium text-gray-400"
                            >
                                / kg
                            </span>
                        </p>


                        <a
                            href="{{ route('products.index') }}"
                            class="rounded-xl bg-[#245b45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
                        >
                            Voir
                        </a>

                    </div>

                </div>

            </article>


        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- PRÉSENTATION À PROPOS --}}
{{-- ========================================================= --}}

<section
    class="mx-auto grid max-w-7xl items-center gap-14 px-6 py-24 lg:grid-cols-2"
>

    {{-- IMAGE --}}
    <div class="relative">

        <img
            src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1000&q=85"
            alt="Agriculture Terre Verte"
            class="h-[520px] w-full rounded-[35px] object-cover shadow-xl"
        >


        <div
            class="absolute -bottom-6 -right-3 rounded-2xl bg-[#f5d85f] p-6 shadow-xl sm:right-6"
        >

            <img
                src="{{ asset('images/logo-terre-verte.png') }}"
                alt="Terre Verte"
                class="mx-auto h-20 w-auto object-contain"
            >

            <p
                class="mt-2 font-black text-[#263a30]"
            >
                Une agriculture responsable
            </p>

        </div>

    </div>



    {{-- TEXTE --}}
    <div>

        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
        >
            À propos
        </p>


        <h2
            class="font-title mt-3 text-4xl font-bold leading-tight text-[#1f3a2d]"
        >
            Terre Verte, proche de la nature et de ses clients.
        </h2>


        <p
            class="mt-6 text-lg leading-8 text-gray-600"
        >
            Notre objectif est de proposer des produits agricoles de qualité
            tout en facilitant la relation entre les produits, les clients
            et notre équipe.
        </p>


        <p class="mt-4 leading-7 text-gray-500">
            Grâce à notre plateforme Terre Verte, nous combinons agriculture
            et technologie afin d'améliorer la gestion et le suivi de nos
            services.
        </p>


        <div class="mt-8 space-y-4">

            <p class="font-bold">
                Sélection rigoureuse des produits
            </p>

            <p class="font-bold">
                Gestion professionnelle et sécurisée
            </p>

            <p class="font-bold">
                Proximité et satisfaction client
            </p>

        </div>


        <a
            href="{{ route('about') }}"
            class="mt-8 inline-flex rounded-xl bg-[#245b45] px-7 py-3.5 font-bold text-white transition hover:bg-[#194936]"
        >
            En savoir plus
        </a>

    </div>

</section>



{{-- ========================================================= --}}
{{-- PRÉSENTATION SERVICES --}}
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


            <p
                class="mx-auto mt-4 max-w-2xl text-gray-500"
            >
                Une plateforme pensée pour offrir qualité,
                proximité et efficacité.
            </p>

        </div>



        <div
            class="mt-12 grid gap-7 md:grid-cols-3"
        >


            {{-- PRODUITS DE QUALITÉ --}}
            <div
                class="rounded-3xl bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <div
                    class="h-1 w-14 rounded-full bg-[#245b45]"
                ></div>

                <h3 class="mt-5 text-xl font-black">
                    Produits de qualité
                </h3>

                <p
                    class="mt-3 leading-7 text-gray-500"
                >
                    Nous privilégions des produits frais
                    et soigneusement sélectionnés.
                </p>

            </div>



            {{-- AGRICULTURE LOCALE --}}
            <div
                class="rounded-3xl bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <div
                    class="h-1 w-14 rounded-full bg-[#f5d85f]"
                ></div>

                <h3 class="mt-5 text-xl font-black">
                    Agriculture locale
                </h3>

                <p
                    class="mt-3 leading-7 text-gray-500"
                >
                    Nous valorisons la proximité
                    et les produits issus du secteur agricole.
                </p>

            </div>



            {{-- SERVICE PROFESSIONNEL --}}
            <div
                class="rounded-3xl bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <div
                    class="h-1 w-14 rounded-full bg-[#789383]"
                ></div>

                <h3 class="mt-5 text-xl font-black">
                    Service professionnel
                </h3>

                <p
                    class="mt-3 leading-7 text-gray-500"
                >
                    Une équipe organisée pour assurer
                    le suivi et la satisfaction de nos clients.
                </p>

            </div>


        </div>



        <div class="mt-10 text-center">

            <a
                href="{{ route('services') }}"
                class="inline-flex rounded-xl bg-[#245b45] px-7 py-3.5 font-bold text-white transition hover:bg-[#194936]"
            >
                Découvrir nos services
            </a>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CALL TO ACTION --}}
{{-- ========================================================= --}}

<section class="px-6 py-24">

    <div
        class="mx-auto max-w-7xl overflow-hidden rounded-[40px] bg-[#245b45] px-8 py-16 text-center text-white shadow-xl sm:px-16"
    >

        <img
            src="{{ asset('images/logo-terre-verte.png') }}"
            alt="Logo Terre Verte"
            class="mx-auto mb-5 h-28 w-auto object-contain"
        >


        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-green-200"
        >
            Terre Verte
        </p>


        <h2
            class="font-title mx-auto mt-4 max-w-3xl text-4xl font-bold sm:text-5xl"
        >
            Découvrez la fraîcheur et la qualité de nos produits.
        </h2>


        <p
            class="mx-auto mt-5 max-w-2xl text-green-100"
        >
            Une question sur nos produits ou nos services ?
            Notre équipe est à votre disposition.
        </p>


        <div class="mt-8 flex flex-wrap justify-center gap-4">

            <a
                href="{{ route('products.index') }}"
                class="inline-flex h-14 items-center justify-center rounded-xl bg-white px-8 font-black text-[#245b45] shadow-lg transition hover:-translate-y-1"
            >
                Voir nos produits
            </a>


            <a
                href="{{ route('contact') }}"
                class="inline-flex h-14 items-center justify-center rounded-xl bg-[#f5d85f] px-8 font-black text-[#263a30] shadow-lg transition hover:-translate-y-1"
            >
                Contactez-nous
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
                    alt="Logo Terre Verte"
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


            <div
                class="mt-5 space-y-3 text-sm text-green-100"
            >

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



        {{-- ESPACE PROFESSIONNEL --}}
        <div>

            <h3 class="font-black">
                Espace professionnel
            </h3>


            <p
                class="mt-5 text-sm leading-7 text-green-100"
            >
                Accédez à votre espace sécurisé
                pour gérer les opérations Terre Verte.
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



    {{-- BAS FOOTER --}}
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