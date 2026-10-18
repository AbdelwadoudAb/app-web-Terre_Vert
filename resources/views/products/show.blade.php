<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $product->name }} | Terre Verte
    </title>

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


        {{-- LOGO PRINCIPAL --}}
        <a
            href="{{ route('home') }}"
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
                class="font-bold text-[#245b45]"
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



        {{-- CONNEXION / ESPACE --}}
        @auth

            <a
                href="{{ route('dashboard') }}"
                class="rounded-xl bg-[#245b45] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
            >
                Mon espace
            </a>

        @else

            <a
                href="{{ route('login') }}"
                class="rounded-xl bg-[#245b45] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
            >
                Connexion
            </a>

        @endauth


    </div>

</header>



{{-- ========================================================= --}}
{{-- CONTENU --}}
{{-- ========================================================= --}}

<main
    class="mx-auto max-w-7xl px-6 py-12"
>


    {{-- RETOUR --}}
    <a
        href="{{ route('products.index') }}"
        class="inline-flex items-center gap-2 font-bold text-[#245b45] transition hover:text-[#194936]"
    >
        ← Retour aux produits
    </a>



    {{-- ========================================================= --}}
    {{-- FICHE PRODUIT --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8 overflow-hidden rounded-[35px] border border-[#ebe6d8] bg-white shadow-xl"
    >

        <div
            class="grid lg:grid-cols-2"
        >


            {{-- ========================================================= --}}
            {{-- IMAGE --}}
            {{-- ========================================================= --}}

            <div
                class="relative min-h-[450px] bg-[#eef2e7] lg:min-h-[600px]"
            >

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="absolute inset-0 h-full w-full object-cover"
                    >

                @else

                    {{-- AUCUNE IMAGE --}}
                    <div
                        class="flex h-full min-h-[450px] items-center justify-center bg-[#eef2e7] px-6 text-center lg:min-h-[600px]"
                    >

                        <div>

                            <p
                                class="font-title text-3xl font-bold text-[#245b45]"
                            >
                                {{ $product->name }}
                            </p>

                            <p
                                class="mt-3 text-sm font-semibold text-[#789383]"
                            >
                                Image du produit indisponible
                            </p>

                        </div>

                    </div>

                @endif



                {{-- DISPONIBILITÉ SUR IMAGE --}}
                @if($product->availability === 'EN_STOCK')

                    <span
                        class="absolute right-6 top-6 rounded-full bg-green-600 px-4 py-2 text-sm font-bold text-white shadow-lg"
                    >
                        En stock
                    </span>

                @else

                    <span
                        class="absolute right-6 top-6 rounded-full bg-red-600 px-4 py-2 text-sm font-bold text-white shadow-lg"
                    >
                        Rupture
                    </span>

                @endif


            </div>



            {{-- ========================================================= --}}
            {{-- INFORMATIONS --}}
            {{-- ========================================================= --}}

            <div
                class="flex flex-col justify-center p-8 md:p-12 lg:p-14"
            >


                {{-- CATÉGORIE --}}
                <span
                    class="w-fit rounded-full bg-[#dce9df] px-4 py-2 text-sm font-bold text-[#245b45]"
                >
                    {{ $product->category?->name ?? 'Sans catégorie' }}
                </span>



                {{-- NOM --}}
                <h1
                    class="font-title mt-6 text-4xl font-bold text-[#1f3a2d] md:text-5xl"
                >
                    {{ $product->name }}
                </h1>



                {{-- DISPONIBILITÉ --}}
                <div
                    class="mt-5"
                >

                    @if($product->availability === 'EN_STOCK')

                        <span
                            class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700"
                        >
                            En stock
                        </span>

                    @else

                        <span
                            class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700"
                        >
                            Rupture
                        </span>

                    @endif

                </div>



                {{-- DESCRIPTION --}}
                <div
                    class="mt-6"
                >

                    <p
                        class="text-lg leading-8 text-gray-600"
                    >

                        {{
                            $product->description
                            ?: 'Produit agricole sélectionné par Terre Verte.'
                        }}

                    </p>

                </div>



                {{-- PRIX --}}
                <div
                    class="mt-8 border-y border-[#ebe6d8] py-7"
                >

                    <p
                        class="text-sm font-bold uppercase tracking-[0.15em] text-gray-400"
                    >
                        Prix
                    </p>


                    <p
                        class="mt-2 text-4xl font-black text-[#245b45]"
                    >

                        {{ number_format((float) $product->price, 2, ',', ' ') }}

                        <span
                            class="text-lg"
                        >
                            DH
                        </span>

                    </p>

                </div>



                {{-- ========================================================= --}}
                {{-- INFORMATION TERRE VERTE --}}
                {{-- ========================================================= --}}

                <div
                    class="mt-8 rounded-2xl border border-[#dce6df] bg-[#eef2e7] p-6"
                >

                    <h3
                        class="font-black text-[#245b45]"
                    >
                        Produit Terre Verte
                    </h3>


                    <p
                        class="mt-2 text-sm leading-6 text-gray-600"
                    >
                        Produit agricole soigneusement sélectionné
                        pour offrir fraîcheur et qualité.
                    </p>

                </div>



                {{-- RETOUR CATALOGUE --}}
                <a
                    href="{{ route('products.index') }}"
                    class="mt-8 flex w-full items-center justify-center rounded-xl bg-[#245b45] px-6 py-4 font-black text-white transition hover:bg-[#194936]"
                >
                    ← Retour au catalogue
                </a>


            </div>


        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- AVANTAGES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4"
    >


        {{-- PRODUIT FRAIS --}}
        <div
            class="rounded-2xl bg-white p-6 text-center shadow-sm"
        >

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#245b45]"
            ></div>


            <h3
                class="mt-5 font-black text-[#245b45]"
            >
                Produit frais
            </h3>


            <p
                class="mt-2 text-sm text-gray-500"
            >
                Des produits sélectionnés avec soin.
            </p>

        </div>



        {{-- AGRICULTURE LOCALE --}}
        <div
            class="rounded-2xl bg-white p-6 text-center shadow-sm"
        >

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#f5d85f]"
            ></div>


            <h3
                class="mt-5 font-black text-[#245b45]"
            >
                Agriculture locale
            </h3>


            <p
                class="mt-2 text-sm text-gray-500"
            >
                Une agriculture proche et responsable.
            </p>

        </div>



        {{-- QUALITÉ --}}
        <div
            class="rounded-2xl bg-white p-6 text-center shadow-sm"
        >

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#789383]"
            ></div>


            <h3
                class="mt-5 font-black text-[#245b45]"
            >
                Qualité
            </h3>


            <p
                class="mt-2 text-sm text-gray-500"
            >
                Une sélection de produits de qualité.
            </p>

        </div>



        {{-- SERVICE --}}
        <div
            class="rounded-2xl bg-white p-6 text-center shadow-sm"
        >

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#4d8066]"
            ></div>


            <h3
                class="mt-5 font-black text-[#245b45]"
            >
                Service fiable
            </h3>


            <p
                class="mt-2 text-sm text-gray-500"
            >
                Une équipe à votre disposition.
            </p>

        </div>


    </section>


</main>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer
    class="mt-16 bg-[#17382c] text-white"
>

    <div
        class="mx-auto grid max-w-7xl gap-12 px-6 py-14 md:grid-cols-2 lg:grid-cols-4"
    >


        {{-- LOGO PRINCIPAL --}}
        <div>

            <a
                href="{{ route('home') }}"
            >

                <img
                    src="{{ asset('images/logo-terre-verte.png') }}"
                    alt="Terre Verte"
                    class="h-28 w-auto object-contain"
                >

            </a>


            <p
                class="mt-4 max-w-xs text-sm leading-7 text-green-100"
            >
                La fraîcheur de la terre directement chez vous.
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



    {{-- BAS DU FOOTER --}}
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