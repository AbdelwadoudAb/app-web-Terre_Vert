<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Produits | Terre Verte</title>


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
                href="{{ route('admin.categories.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
            >
                Catégories
            </a>


            <a
                href="{{ route('admin.invoices.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
            >
                Factures
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
                    Produits
                </h2>


                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Gérez les produits du catalogue Terre Verte,
                    leur catégorie, leur prix et leur disponibilité.
                </p>

            </div>



            <a
                href="{{ route('admin.products.create') }}"
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#F5D85F] px-6 py-3.5 font-black text-[#245B45] transition hover:scale-[1.02]"
            >
                Ajouter un produit
            </a>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MESSAGE SUCCÈS --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- MESSAGE ERREUR --}}
    {{-- ========================================================= --}}

    @if(session('error'))

        <div
            class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 font-semibold text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- ERREURS VALIDATION --}}
    {{-- ========================================================= --}}

    @if($errors->any())

        <div
            class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-5"
        >

            <p
                class="font-bold text-red-700"
            >
                Vérifiez les informations suivantes :
            </p>


            <ul
                class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600"
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
    {{-- FILTRES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6"
    >

        <form
            action="{{ route('admin.products.index') }}"
            method="GET"
            class="rounded-3xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
        >

            <div
                class="grid gap-4 lg:grid-cols-[1fr_240px_220px_auto_auto]"
            >


                {{-- RECHERCHE --}}
                <div>

                    <label
                        for="search"
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-400"
                    >
                        Recherche
                    </label>

                    <input
                        id="search"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un produit..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3.5 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                    >

                </div>



                {{-- CATÉGORIE --}}
                <div>

                    <label
                        for="category"
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-400"
                    >
                        Catégorie
                    </label>

                    <select
                        id="category"
                        name="category"
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                    >

                        <option value="">
                            Toutes les catégories
                        </option>


                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(
                                    (string) request('category')
                                    ===
                                    (string) $category->id
                                )
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>



                {{-- DISPONIBILITÉ --}}
                <div>

                    <label
                        for="availability"
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-400"
                    >
                        Disponibilité
                    </label>

                    <select
                        id="availability"
                        name="availability"
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                    >

                        <option value="">
                            Toute disponibilité
                        </option>


                        <option
                            value="EN_STOCK"
                            @selected(
                                request('availability')
                                ===
                                'EN_STOCK'
                            )
                        >
                            En stock
                        </option>


                        <option
                            value="RUPTURE"
                            @selected(
                                request('availability')
                                ===
                                'RUPTURE'
                            )
                        >
                            Rupture
                        </option>

                    </select>

                </div>



                {{-- RECHERCHER --}}
                <div
                    class="flex items-end"
                >

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#245B45] px-6 py-3.5 font-bold text-white transition hover:bg-[#194936]"
                    >
                        Rechercher
                    </button>

                </div>



                {{-- RESET --}}
                <div
                    class="flex items-end"
                >

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="flex w-full items-center justify-center rounded-xl border border-gray-300 px-5 py-3.5 font-bold text-gray-600 transition hover:bg-gray-50"
                    >
                        Réinitialiser
                    </a>

                </div>

            </div>

        </form>

    </section>



    {{-- ========================================================= --}}
    {{-- TABLEAU PRODUITS --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >


        {{-- TITRE --}}
        <div
            class="flex flex-col gap-4 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Catalogue
                </p>


                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Liste des produits
                </h3>


                <p
                    class="mt-2 text-sm text-gray-500"
                >
                    Consultez et gérez les produits disponibles
                    dans le catalogue public.
                </p>

            </div>


            <span
                class="rounded-full bg-[#eef2e7] px-4 py-2 text-sm font-bold text-[#245B45]"
            >
                {{ $products->total() }}

                {{ $products->total() === 1
                    ? 'produit'
                    : 'produits' }}
            </span>

        </div>



        {{-- ========================================================= --}}
        {{-- TABLE --}}
        {{-- ========================================================= --}}

        @if($products->count() > 0)

            <div
                class="overflow-x-auto"
            >

                <table
                    class="w-full min-w-[1100px]"
                >

                    <thead
                        class="bg-[#F7F4E8] text-left text-sm font-bold text-[#245B45]"
                    >

                        <tr>

                            <th class="px-6 py-4">
                                Produit
                            </th>

                            <th class="px-6 py-4">
                                Catégorie
                            </th>

                            <th class="px-6 py-4">
                                Prix
                            </th>

                            <th class="px-6 py-4">
                                Disponibilité
                            </th>

                            <th class="px-6 py-4">
                                Date
                            </th>

                            <th class="px-6 py-4 text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody>

                        @foreach($products as $product)

                            <tr
                                class="border-b border-gray-100 transition last:border-0 hover:bg-[#faf9f4]"
                            >


                                {{-- ========================================================= --}}
                                {{-- PRODUIT --}}
                                {{-- ========================================================= --}}

                                <td
                                    class="px-6 py-5"
                                >

                                    <div
                                        class="flex items-center gap-4"
                                    >


                                        {{-- IMAGE --}}
                                        <div
                                            class="h-16 w-16 shrink-0 overflow-hidden rounded-xl border border-gray-100 bg-[#EEF2E7]"
                                        >

                                            @if($product->image)

                                                <img
                                                    src="{{ asset(
                                                        'storage/' .
                                                        $product->image
                                                    ) }}"
                                                    alt="{{ $product->name }}"
                                                    class="h-full w-full object-cover"
                                                >

                                            @else

                                                <div
                                                    class="flex h-full w-full items-center justify-center p-2"
                                                >

                                                    <img
                                                        src="{{ asset('images/logo-terre-verte.png') }}"
                                                        alt="Terre Verte"
                                                        class="max-h-10 w-auto object-contain opacity-60"
                                                    >

                                                </div>

                                            @endif

                                        </div>



                                        {{-- INFORMATIONS --}}
                                        <div>

                                            <p
                                                class="font-black text-[#1F3A2D]"
                                            >
                                                {{ $product->name }}
                                            </p>


                                            <p
                                                class="mt-1 max-w-xs text-sm leading-5 text-gray-500"
                                            >
                                                {{ $product->description
                                                    ? \Illuminate\Support\Str::limit(
                                                        $product->description,
                                                        70
                                                    )
                                                    : 'Aucune description'
                                                }}
                                            </p>

                                        </div>

                                    </div>

                                </td>



                                {{-- ========================================================= --}}
                                {{-- CATÉGORIE --}}
                                {{-- ========================================================= --}}

                                <td
                                    class="px-6 py-5"
                                >

                                    @if($product->category)

                                        <span
                                            class="rounded-full bg-[#eef2e7] px-3 py-1.5 text-xs font-bold text-[#245B45]"
                                        >
                                            {{ $product->category->name }}
                                        </span>

                                    @else

                                        <span
                                            class="rounded-full bg-gray-100 px-3 py-1.5 text-xs font-bold text-gray-500"
                                        >
                                            Sans catégorie
                                        </span>

                                    @endif

                                </td>



                                {{-- ========================================================= --}}
                                {{-- PRIX --}}
                                {{-- ========================================================= --}}

                                <td
                                    class="px-6 py-5"
                                >

                                    <p
                                        class="font-black text-[#245B45]"
                                    >
                                        {{ number_format(
                                            (float) $product->price,
                                            2,
                                            ',',
                                            ' '
                                        ) }}
                                        DH
                                    </p>

                                </td>



                                {{-- ========================================================= --}}
                                {{-- DISPONIBILITÉ --}}
                                {{-- ========================================================= --}}

                                <td
                                    class="px-6 py-5"
                                >

                                    @switch($product->availability)


                                        @case('EN_STOCK')

                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                            >
                                                En stock
                                            </span>

                                            @break



                                        @case('RUPTURE')

                                            <span
                                                class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                            >
                                                Rupture
                                            </span>

                                            @break



                                        @default

                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 text-xs font-bold text-gray-500"
                                            >
                                                Non définie
                                            </span>

                                    @endswitch

                                </td>



                                {{-- ========================================================= --}}
                                {{-- DATE --}}
                                {{-- ========================================================= --}}

                                <td
                                    class="px-6 py-5"
                                >

                                    <p
                                        class="text-sm font-semibold text-gray-700"
                                    >
                                        {{ $product->created_at?->format('d/m/Y') ?? '—' }}
                                    </p>


                                    @if($product->updated_at)

                                        <p
                                            class="mt-1 text-xs text-gray-400"
                                        >
                                            Modifié le
                                            {{ $product->updated_at->format('d/m/Y') }}
                                        </p>

                                    @endif

                                </td>



                                {{-- ========================================================= --}}
                                {{-- ACTIONS --}}
                                {{-- ========================================================= --}}

                                <td
                                    class="px-6 py-5"
                                >

                                    <div
                                        class="flex flex-wrap justify-end gap-2"
                                    >


                                        {{-- MODIFIER --}}
                                        <a
                                            href="{{ route(
                                                'admin.products.edit',
                                                $product
                                            ) }}"
                                            class="rounded-xl bg-blue-50 px-4 py-2.5 text-sm font-bold text-blue-700 transition hover:bg-blue-100"
                                        >
                                            Modifier
                                        </a>



                                        {{-- SUPPRIMER --}}
                                        <form
                                            action="{{ route(
                                                'admin.products.destroy',
                                                $product
                                            ) }}"
                                            method="POST"
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer définitivement le produit « {{ addslashes($product->name) }} » ?');"
                                        >

                                            @csrf
                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="rounded-xl bg-red-50 px-4 py-2.5 text-sm font-bold text-red-600 transition hover:bg-red-100"
                                            >
                                                Supprimer
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>



            {{-- ========================================================= --}}
            {{-- PAGINATION --}}
            {{-- ========================================================= --}}

            @if($products->hasPages())

                <div
                    class="border-t border-gray-100 px-6 py-5"
                >
                    {{ $products->withQueryString()->links() }}
                </div>

            @endif


        @else


            {{-- ========================================================= --}}
            {{-- AUCUN PRODUIT --}}
            {{-- ========================================================= --}}

            <div
                class="px-6 py-16 text-center"
            >

                <img
                    src="{{ asset('images/logo-terre-verte.png') }}"
                    alt="Terre Verte"
                    class="mx-auto h-20 w-auto opacity-50"
                >


                <h3
                    class="font-playfair mt-6 text-2xl font-bold text-[#1F3A2D]"
                >
                    Aucun produit
                </h3>


                <p
                    class="mx-auto mt-3 max-w-md leading-7 text-gray-500"
                >
                    Aucun produit ne correspond actuellement
                    aux critères sélectionnés.
                </p>


                @if(
                    request('search')
                    || request('category')
                    || request('availability')
                )

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="mt-6 inline-flex rounded-xl border border-[#245B45] px-6 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
                    >
                        Réinitialiser les filtres
                    </a>

                @else

                    <a
                        href="{{ route('admin.products.create') }}"
                        class="mt-6 inline-flex rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                    >
                        Ajouter un produit
                    </a>

                @endif

            </div>

        @endif

    </section>



    {{-- ========================================================= --}}
    {{-- INFORMATIONS --}}
    {{-- ========================================================= --}}

    <section
        class="mt-8 grid gap-5 md:grid-cols-2"
    >


        {{-- EN STOCK --}}
        <div
            class="rounded-3xl border border-green-200 bg-green-50 p-6"
        >

            <span
                class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
            >
                En stock
            </span>


            <h3
                class="mt-4 font-bold text-[#1F3A2D]"
            >
                Produit disponible
            </h3>


            <p
                class="mt-2 text-sm leading-6 text-gray-600"
            >
                Le produit est disponible et peut être présenté
                comme disponible dans le catalogue.
            </p>

        </div>



        {{-- RUPTURE --}}
        <div
            class="rounded-3xl border border-red-200 bg-red-50 p-6"
        >

            <span
                class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
            >
                Rupture
            </span>


            <h3
                class="mt-4 font-bold text-[#1F3A2D]"
            >
                Produit indisponible
            </h3>


            <p
                class="mt-2 text-sm leading-6 text-gray-600"
            >
                Le produit reste dans le catalogue mais apparaît
                comme actuellement indisponible.
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
                href="{{ route('admin.products.create') }}"
                class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
            >
                Ajouter un produit
            </a>


            <a
                href="{{ route('admin.categories.index') }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Catégories
            </a>


            <a
                href="{{ route('admin.dashboard') }}"
                class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
            >
                Tableau de bord
            </a>


            <a
                href="{{ route('home') }}"
                target="_blank"
                class="rounded-xl border border-gray-300 px-5 py-3 font-bold text-gray-600 transition hover:bg-gray-50"
            >
                Voir le catalogue public
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