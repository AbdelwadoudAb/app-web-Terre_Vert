<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nos produits | Terre Verte</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

<header class="sticky top-0 z-50 border-b border-[#e8e2d0] bg-white/95 shadow-sm backdrop-blur">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2">

        {{-- LOGO --}}
        <a href="{{ route('home') }}">

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
{{-- HERO --}}
{{-- ========================================================= --}}

<section class="bg-[#eef2e7]">

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-16 lg:grid-cols-2">

        <div>

            <span
                class="inline-flex rounded-full bg-[#dce9df] px-4 py-2 text-sm font-bold text-[#245b45]"
            >
                Frais • Naturel • Local
            </span>


            <h1 class="font-title mt-6 text-5xl font-bold text-[#1f3a2d] lg:text-6xl">

                Nos produits

                <span class="text-[#4d8066]">
                    agricoles
                </span>

            </h1>


            <p class="mt-6 max-w-xl text-lg leading-8 text-gray-600">
                Découvrez les produits proposés par Terre Verte.
            </p>

        </div>


        <div class="overflow-hidden rounded-[40px] shadow-2xl">

            <img
                src="https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=1200&q=85"
                alt="Produits agricoles"
                class="h-[420px] w-full object-cover"
            >

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CATALOGUE --}}
{{-- ========================================================= --}}

<main class="mx-auto max-w-7xl px-6 py-20">


    <div class="mb-10">

        <p
            class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
        >
            Notre catalogue
        </p>


        <h2
            class="font-title mt-2 text-4xl font-bold text-[#1f3a2d]"
        >
            Découvrez nos produits
        </h2>


        <p class="mt-3 text-gray-500">
            {{ $products->total() }} produit(s)
        </p>

    </div>



    {{-- ========================================================= --}}
    {{-- RECHERCHE + FILTRE --}}
    {{-- ========================================================= --}}

    <form
        action="{{ route('products.index') }}"
        method="GET"
        class="mb-12 rounded-3xl border border-[#ebe6d8] bg-white p-5 shadow-sm"
    >

        <div class="grid gap-4 md:grid-cols-[1fr_280px_auto_auto]">


            {{-- RECHERCHE --}}
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Rechercher un produit..."
                class="w-full rounded-xl border border-gray-200 px-5 py-4 outline-none transition focus:border-[#245b45]"
            >


            {{-- CATÉGORIE --}}
            <select
                name="category"
                class="rounded-xl border border-gray-200 bg-white px-5 py-4 outline-none transition focus:border-[#245b45]"
            >

                <option value="">
                    Toutes les catégories
                </option>


                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        @selected(request('category') == $category->id)
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>


            {{-- RECHERCHER --}}
            <button
                type="submit"
                class="rounded-xl bg-[#245b45] px-8 py-4 font-bold text-white transition hover:bg-[#194936]"
            >
                Rechercher
            </button>


            {{-- RÉINITIALISER --}}
            <a
                href="{{ route('products.index') }}"
                class="flex items-center justify-center rounded-xl border border-gray-200 px-6 py-4 font-bold text-gray-600 transition hover:bg-gray-50"
            >
                Réinitialiser
            </a>

        </div>

    </form>



    {{-- ========================================================= --}}
    {{-- PRODUITS --}}
    {{-- ========================================================= --}}

    @if($products->count() > 0)

        <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">


            @foreach($products as $product)

                <article
                    class="group overflow-hidden rounded-[28px] border border-[#ebe6d8] bg-white shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
                >


                    {{-- IMAGE --}}
                    <div class="relative h-64 overflow-hidden bg-[#eef2e7]">

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                            >

                        @else

                            <div
                                class="flex h-full w-full items-center justify-center"
                            >
                                <span class="text-5xl font-black text-[#789383]">
                                    TV
                                </span>
                            </div>

                        @endif



                        {{-- DISPONIBILITÉ --}}
                        @if($product->availability === 'EN_STOCK')

                            <span
                                class="absolute right-4 top-4 rounded-full bg-green-600 px-3 py-1.5 text-xs font-bold text-white shadow"
                            >
                                En stock
                            </span>

                        @else

                            <span
                                class="absolute right-4 top-4 rounded-full bg-red-600 px-3 py-1.5 text-xs font-bold text-white shadow"
                            >
                                Rupture
                            </span>

                        @endif



                        {{-- CATÉGORIE --}}
                        <span
                            class="absolute bottom-4 left-4 rounded-full bg-[#245b45] px-3 py-1.5 text-xs font-bold text-white shadow"
                        >
                            {{ $product->category?->name ?? 'Sans catégorie' }}
                        </span>

                    </div>



                    {{-- INFORMATIONS --}}
                    <div class="p-6">


                        {{-- NOM --}}
                        <h3 class="text-xl font-black text-[#263a30]">
                            {{ $product->name }}
                        </h3>


                        {{-- DESCRIPTION --}}
                        <p class="mt-3 min-h-[48px] text-sm leading-6 text-gray-500">

                            {{ $product->description
                                ? \Illuminate\Support\Str::limit($product->description, 90)
                                : 'Produit agricole Terre Verte.' }}

                        </p>



                        {{-- PRIX --}}
                        <div class="mt-6 border-t border-gray-100 pt-5">

                            <p
                                class="text-xs font-bold uppercase tracking-wider text-gray-400"
                            >
                                Prix
                            </p>


                            <p
                                class="mt-1 text-2xl font-black text-[#245b45]"
                            >

                                {{ number_format((float) $product->price, 2, ',', ' ') }}

                                <span class="text-sm">
                                    DH
                                </span>

                            </p>

                        </div>



                        {{-- VOIR PRODUIT --}}
                        <a
                            href="{{ route('products.show', $product) }}"
                            class="mt-6 flex w-full items-center justify-center rounded-xl bg-[#245b45] px-5 py-3.5 font-bold text-white transition hover:bg-[#194936]"
                        >
                            Voir le produit
                        </a>

                    </div>

                </article>

            @endforeach

        </div>



        {{-- PAGINATION --}}
        @if($products->hasPages())

            <div class="mt-12">
                {{ $products->links() }}
            </div>

        @endif


    @else


        {{-- AUCUN PRODUIT --}}
        <div
            class="rounded-3xl bg-white px-6 py-16 text-center shadow-sm"
        >

            <div
                class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#eef2e7] text-xl font-black text-[#245b45]"
            >
                TV
            </div>


            <h3
                class="mt-5 text-2xl font-black text-[#245b45]"
            >
                Aucun produit trouvé
            </h3>


            <p class="mt-2 text-gray-500">
                Aucun produit ne correspond à votre recherche.
            </p>


            <a
                href="{{ route('products.index') }}"
                class="mt-6 inline-flex rounded-xl bg-[#245b45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
            >
                Voir tous les produits
            </a>

        </div>


    @endif


</main>



{{-- ========================================================= --}}
{{-- AVANTAGES --}}
{{-- ========================================================= --}}

<section class="bg-[#245b45]">

    <div
        class="mx-auto grid max-w-7xl gap-8 px-6 py-14 sm:grid-cols-2 lg:grid-cols-4"
    >


        <div class="text-center text-white">

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#f5d85f]"
            ></div>

            <h3 class="mt-5 font-black">
                Produits frais
            </h3>

            <p class="mt-2 text-sm text-green-100">
                Une sélection de qualité.
            </p>

        </div>



        <div class="text-center text-white">

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#f5d85f]"
            ></div>

            <h3 class="mt-5 font-black">
                Agriculture locale
            </h3>

            <p class="mt-2 text-sm text-green-100">
                Des produits agricoles locaux.
            </p>

        </div>



        <div class="text-center text-white">

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#f5d85f]"
            ></div>

            <h3 class="mt-5 font-black">
                Qualité contrôlée
            </h3>

            <p class="mt-2 text-sm text-green-100">
                Des produits soigneusement sélectionnés.
            </p>

        </div>



        <div class="text-center text-white">

            <div
                class="mx-auto h-1 w-12 rounded-full bg-[#f5d85f]"
            ></div>

            <h3 class="mt-5 font-black">
                Service fiable
            </h3>

            <p class="mt-2 text-sm text-green-100">
                Une équipe à votre écoute.
            </p>

        </div>


    </div>

</section>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer class="bg-[#17382c] text-white">

    <div
        class="mx-auto grid max-w-7xl gap-12 px-6 py-14 md:grid-cols-2 lg:grid-cols-4"
    >


        {{-- LOGO --}}
        <div>

            <a href="{{ route('home') }}">

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