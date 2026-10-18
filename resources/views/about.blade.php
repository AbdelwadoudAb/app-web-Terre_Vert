<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>À propos - Terre Verte</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

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
        <nav
            class="hidden items-center gap-8 lg:flex"
        >

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
                class="font-bold text-[#245b45]"
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



        {{-- CONNEXION --}}
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

<section
    class="relative overflow-hidden bg-[#245b45]"
>

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
                À propos de Terre Verte
            </p>


            <h1
                class="font-title mt-4 text-5xl font-bold leading-tight text-white md:text-6xl"
            >
                Proche de la nature,
                proche de nos clients.
            </h1>


            <p
                class="mt-6 max-w-xl text-lg leading-8 text-white/75"
            >
                Terre Verte propose une plateforme moderne permettant
                de découvrir des produits agricoles frais, naturels
                et soigneusement sélectionnés.
            </p>


            <div
                class="mt-8 flex flex-wrap gap-4"
            >

                <a
                    href="{{ route('products.index') }}"
                    class="rounded-xl bg-[#f5d85f] px-7 py-3.5 font-bold text-[#1f3a2d] transition hover:bg-[#ead047]"
                >
                    Découvrir nos produits
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
        <div
            class="relative"
        >

            <div
                class="absolute -left-10 -top-10 h-40 w-40 rounded-full bg-[#f5d85f]/20 blur-3xl"
            ></div>


            <div
                class="overflow-hidden rounded-[40px] shadow-2xl"
            >

                <img
                    src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1200&q=85"
                    alt="Agriculture Terre Verte"
                    class="h-[520px] w-full object-cover"
                >

            </div>


            <div
                class="absolute -bottom-6 right-6 rounded-2xl bg-white px-6 py-5 shadow-xl"
            >

                <p
                    class="font-bold text-[#245b45]"
                >
                    Une agriculture responsable
                </p>

            </div>

        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- QUI SOMMES-NOUS --}}
{{-- ========================================================= --}}

<section
    class="mx-auto max-w-7xl px-6 py-24"
>

    <div
        class="grid gap-14 lg:grid-cols-2 lg:items-center"
    >


        {{-- TEXTE --}}
        <div>

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
            >
                Qui sommes-nous ?
            </p>


            <h2
                class="font-title mt-3 text-4xl font-bold leading-tight text-[#1f3a2d]"
            >
                Une plateforme au service
                de l'agriculture et de ses clients
            </h2>


            <p
                class="mt-6 text-lg leading-8 text-gray-600"
            >
                Terre Verte a pour objectif de proposer des produits
                agricoles de qualité tout en facilitant la relation
                entre les produits, les clients et notre équipe.
            </p>


            <p
                class="mt-4 leading-8 text-gray-500"
            >
                Grâce à notre plateforme, les visiteurs peuvent
                consulter facilement notre catalogue, découvrir
                les informations sur les produits disponibles
                et communiquer avec notre équipe.
            </p>


            <p
                class="mt-4 leading-8 text-gray-500"
            >
                Terre Verte combine agriculture et technologie
                afin d'améliorer la gestion, la facturation,
                le suivi des demandes et la satisfaction client.
            </p>

        </div>



        {{-- CARTE --}}
        <div
            class="rounded-[35px] bg-white p-8 shadow-lg md:p-10"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
            >
                Notre objectif
            </p>


            <h3
                class="font-title mt-3 text-3xl font-bold text-[#1f3a2d]"
            >
                Qualité, simplicité et confiance
            </h3>


            <p
                class="mt-5 leading-8 text-gray-500"
            >
                Nous souhaitons offrir une expérience simple
                et professionnelle aussi bien pour les visiteurs
                que pour les utilisateurs de notre plateforme.
            </p>


            <div
                class="mt-8 grid gap-4 sm:grid-cols-2"
            >


                {{-- QUALITÉ --}}
                <div
                    class="rounded-2xl bg-[#eef3ef] p-5"
                >

                    <p
                        class="font-black text-[#245b45]"
                    >
                        Qualité
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Des produits soigneusement sélectionnés.
                    </p>

                </div>



                {{-- FRAÎCHEUR --}}
                <div
                    class="rounded-2xl bg-[#fff8d7] p-5"
                >

                    <p
                        class="font-black text-[#1f3a2d]"
                    >
                        Fraîcheur
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Une sélection adaptée aux besoins des clients.
                    </p>

                </div>



                {{-- SIMPLICITÉ --}}
                <div
                    class="rounded-2xl bg-[#eef3ef] p-5"
                >

                    <p
                        class="font-black text-[#245b45]"
                    >
                        Simplicité
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Une plateforme intuitive et facile à utiliser.
                    </p>

                </div>



                {{-- PROXIMITÉ --}}
                <div
                    class="rounded-2xl bg-[#fff8d7] p-5"
                >

                    <p
                        class="font-black text-[#1f3a2d]"
                    >
                        Proximité
                    </p>

                    <p
                        class="mt-2 text-sm leading-6 text-gray-500"
                    >
                        Une relation proche avec nos clients.
                    </p>

                </div>


            </div>


        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- NOS VALEURS --}}
{{-- ========================================================= --}}

<section
    class="bg-white py-24"
>

    <div
        class="mx-auto max-w-7xl px-6"
    >


        <div
            class="mx-auto max-w-2xl text-center"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
            >
                Nos valeurs
            </p>


            <h2
                class="font-title mt-3 text-4xl font-bold text-[#1f3a2d]"
            >
                Ce qui définit Terre Verte
            </h2>


            <p
                class="mt-4 leading-7 text-gray-500"
            >
                Notre travail repose sur des valeurs simples
                qui guident chaque étape de notre activité.
            </p>

        </div>



        <div
            class="mt-12 grid gap-7 md:grid-cols-3"
        >


            {{-- QUALITÉ --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <div
                    class="h-1.5 w-14 rounded-full bg-[#245b45]"
                ></div>


                <h3
                    class="mt-6 text-xl font-black text-[#1f3a2d]"
                >
                    Qualité
                </h3>


                <p
                    class="mt-3 leading-7 text-gray-500"
                >
                    Nous privilégions des produits frais
                    et sélectionnés avec attention.
                </p>

            </div>



            {{-- TRANSPARENCE --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <div
                    class="h-1.5 w-14 rounded-full bg-[#f5d85f]"
                ></div>


                <h3
                    class="mt-6 text-xl font-black text-[#1f3a2d]"
                >
                    Transparence
                </h3>


                <p
                    class="mt-3 leading-7 text-gray-500"
                >
                    Les informations importantes sont présentées
                    clairement afin de faciliter les choix.
                </p>

            </div>



            {{-- SATISFACTION --}}
            <div
                class="rounded-3xl border border-[#ebe6d8] bg-[#f8f6ed] p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
            >

                <div
                    class="h-1.5 w-14 rounded-full bg-[#789383]"
                ></div>


                <h3
                    class="mt-6 text-xl font-black text-[#1f3a2d]"
                >
                    Satisfaction client
                </h3>


                <p
                    class="mt-3 leading-7 text-gray-500"
                >
                    Nous accordons une importance particulière
                    à l'accompagnement et au suivi des clients.
                </p>

            </div>


        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- MISSION --}}
{{-- ========================================================= --}}

<section
    class="mx-auto max-w-7xl px-6 py-24"
>

    <div
        class="relative overflow-hidden rounded-[40px] bg-[#245b45] p-10 text-white shadow-xl md:p-14"
    >

        <div
            class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/5"
        ></div>


        <div
            class="relative grid gap-12 lg:grid-cols-2 lg:items-center"
        >


            {{-- TEXTE --}}
            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.25em] text-[#f5d85f]"
                >
                    Notre mission
                </p>


                <h2
                    class="font-title mt-3 text-4xl font-bold"
                >
                    Faciliter l'accès à des produits agricoles
                    de qualité
                </h2>


                <p
                    class="mt-5 max-w-xl leading-8 text-white/70"
                >
                    Terre Verte souhaite proposer un environnement
                    simple permettant de découvrir les produits,
                    consulter leur disponibilité et communiquer
                    facilement avec notre équipe.
                </p>

            </div>



            {{-- ÉTAPES --}}
            <div
                class="grid gap-4 sm:grid-cols-2"
            >


                <div
                    class="rounded-2xl border border-white/10 bg-white/10 p-6"
                >

                    <p
                        class="text-3xl font-black text-[#f5d85f]"
                    >
                        01
                    </p>

                    <h3
                        class="mt-3 font-black"
                    >
                        Découvrir
                    </h3>

                    <p
                        class="mt-2 text-sm leading-6 text-white/60"
                    >
                        Consultez nos différentes catégories.
                    </p>

                </div>



                <div
                    class="rounded-2xl border border-white/10 bg-white/10 p-6"
                >

                    <p
                        class="text-3xl font-black text-[#f5d85f]"
                    >
                        02
                    </p>

                    <h3
                        class="mt-3 font-black"
                    >
                        Choisir
                    </h3>

                    <p
                        class="mt-2 text-sm leading-6 text-white/60"
                    >
                        Découvrez les produits disponibles.
                    </p>

                </div>



                <div
                    class="rounded-2xl border border-white/10 bg-white/10 p-6"
                >

                    <p
                        class="text-3xl font-black text-[#f5d85f]"
                    >
                        03
                    </p>

                    <h3
                        class="mt-3 font-black"
                    >
                        Contacter
                    </h3>

                    <p
                        class="mt-2 text-sm leading-6 text-white/60"
                    >
                        Communiquez facilement avec notre équipe.
                    </p>

                </div>



                <div
                    class="rounded-2xl border border-white/10 bg-white/10 p-6"
                >

                    <p
                        class="text-3xl font-black text-[#f5d85f]"
                    >
                        04
                    </p>

                    <h3
                        class="mt-3 font-black"
                    >
                        Suivre
                    </h3>

                    <p
                        class="mt-2 text-sm leading-6 text-white/60"
                    >
                        Un suivi professionnel de vos demandes.
                    </p>

                </div>


            </div>


        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}

<section
    class="bg-[#eaf1ec] py-20"
>

    <div
        class="mx-auto max-w-7xl px-6 text-center"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
        >
            Terre Verte
        </p>


        <h2
            class="font-title mx-auto mt-3 max-w-3xl text-4xl font-bold text-[#1f3a2d]"
        >
            Découvrez maintenant notre sélection de produits
        </h2>


        <p
            class="mx-auto mt-4 max-w-xl leading-7 text-gray-500"
        >
            Explorez notre catalogue et découvrez
            les produits disponibles.
        </p>


        <div
            class="mt-8 flex flex-wrap justify-center gap-4"
        >

            <a
                href="{{ route('products.index') }}"
                class="rounded-xl bg-[#245b45] px-7 py-3.5 font-bold text-white transition hover:bg-[#194936]"
            >
                Voir nos produits
            </a>


            <a
                href="{{ route('services') }}"
                class="rounded-xl border-2 border-[#245b45] px-7 py-3.5 font-bold text-[#245b45] transition hover:bg-[#245b45] hover:text-white"
            >
                Nos services
            </a>

        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer
    class="bg-[#1c4636] text-white"
>

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

            <h3
                class="font-black"
            >
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

            <h3
                class="font-black"
            >
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

            <h3
                class="font-black"
            >
                Espace professionnel
            </h3>


            <p
                class="mt-5 text-sm leading-7 text-green-100"
            >
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



    {{-- BAS FOOTER --}}
    <div
        class="border-t border-white/10"
    >

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