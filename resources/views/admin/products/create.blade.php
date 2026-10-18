<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Ajouter un produit | Terre Verte</title>


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
                href="{{ route('admin.products.index') }}"
                class="hidden rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7] sm:inline-flex"
            >
                Produits
            </a>


            <a
                href="{{ route('admin.categories.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 md:inline-flex"
            >
                Catégories
            </a>


            <a
                href="{{ route('admin.dashboard') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 lg:inline-flex"
            >
                Tableau de bord
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
                    Gestion des produits
                </p>


                <h2
                    class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                >
                    Ajouter un produit
                </h2>


                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Ajoutez un nouveau produit au catalogue
                    en renseignant ses informations, son prix,
                    sa disponibilité et son image.
                </p>

            </div>


            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-white px-6 py-3 font-bold text-[#245B45] transition hover:bg-[#F7F4E8]"
            >
                Retour aux produits
            </a>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- ERREURS --}}
    {{-- ========================================================= --}}

    @if($errors->any())

        <div
            class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-5"
        >

            <p
                class="font-bold text-red-700"
            >
                Vérifiez les informations saisies :
            </p>


            <ul
                class="mt-3 list-disc space-y-1 pl-5 text-sm text-red-600"
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
        class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >


        {{-- HEADER FORM --}}
        <div
            class="border-b border-gray-100 bg-[#eef2e7] px-7 py-6 md:px-8"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
            >
                Nouveau produit
            </p>


            <h3
                class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
            >
                Informations du produit
            </h3>


            <p
                class="mt-2 text-sm leading-6 text-gray-500"
            >
                Les champs marqués comme obligatoires doivent être renseignés.
            </p>

        </div>



        <form
            action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-7 md:p-8"
        >

            @csrf



            {{-- ========================================================= --}}
            {{-- NOM --}}
            {{-- ========================================================= --}}

            <div
                class="mb-7"
            >

                <label
                    for="name"
                    class="mb-2 block text-sm font-bold text-[#245B45]"
                >
                    Nom du produit
                    <span class="text-red-500">*</span>
                </label>


                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Exemple : Kiwi"
                    required
                    autofocus
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10 @error('name') border-red-400 @enderror"
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
            {{-- CATÉGORIE --}}
            {{-- ========================================================= --}}

            <div
                class="mb-7"
            >

                <div
                    class="mb-2 flex items-center justify-between gap-4"
                >

                    <label
                        for="category_id"
                        class="text-sm font-bold text-[#245B45]"
                    >
                        Catégorie
                        <span class="text-red-500">*</span>
                    </label>


                    <a
                        href="{{ route('admin.categories.create') }}"
                        class="text-xs font-bold text-[#245B45] hover:underline"
                    >
                        Ajouter une catégorie
                    </a>

                </div>



                @if($categories->count() > 0)

                    <select
                        id="category_id"
                        name="category_id"
                        required
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10 @error('category_id') border-red-400 @enderror"
                    >

                        <option value="">
                            Sélectionner une catégorie
                        </option>


                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(
                                    (string) old('category_id')
                                    ===
                                    (string) $category->id
                                )
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                @else

                    <div
                        class="rounded-xl border border-yellow-200 bg-yellow-50 px-5 py-4"
                    >

                        <p
                            class="font-semibold text-yellow-700"
                        >
                            Aucune catégorie n'est disponible.
                        </p>


                        <p
                            class="mt-1 text-sm text-yellow-600"
                        >
                            Créez d'abord une catégorie avant d'ajouter un produit.
                        </p>

                    </div>

                @endif



                @error('category_id')

                    <p
                        class="mt-2 text-sm font-semibold text-red-600"
                    >
                        {{ $message }}
                    </p>

                @enderror

            </div>



            {{-- ========================================================= --}}
            {{-- DESCRIPTION --}}
            {{-- ========================================================= --}}

            <div
                class="mb-7"
            >

                <div
                    class="mb-2 flex items-center justify-between"
                >

                    <label
                        for="description"
                        class="text-sm font-bold text-[#245B45]"
                    >
                        Description
                    </label>


                    <span
                        class="rounded-full bg-[#F7F4E8] px-3 py-1 text-xs font-bold text-[#789383]"
                    >
                        Facultatif
                    </span>

                </div>


                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Décrivez le produit..."
                    class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10 @error('description') border-red-400 @enderror"
                >{{ old('description') }}</textarea>


                @error('description')

                    <p
                        class="mt-2 text-sm font-semibold text-red-600"
                    >
                        {{ $message }}
                    </p>

                @enderror

            </div>



            {{-- ========================================================= --}}
            {{-- PRIX + DISPONIBILITÉ --}}
            {{-- ========================================================= --}}

            <div
                class="mb-7 grid gap-6 md:grid-cols-2"
            >


                {{-- PRIX --}}
                <div>

                    <label
                        for="price"
                        class="mb-2 block text-sm font-bold text-[#245B45]"
                    >
                        Prix
                        <span class="text-red-500">*</span>
                    </label>


                    <div
                        class="relative"
                    >

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            step="0.01"
                            min="0"
                            placeholder="Exemple : 8.00"
                            required
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 pr-16 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10 @error('price') border-red-400 @enderror"
                        >


                        <span
                            class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-sm font-bold text-gray-400"
                        >
                            DH
                        </span>

                    </div>


                    @error('price')

                        <p
                            class="mt-2 text-sm font-semibold text-red-600"
                        >
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- DISPONIBILITÉ --}}
                <div>

                    <label
                        for="availability"
                        class="mb-2 block text-sm font-bold text-[#245B45]"
                    >
                        Disponibilité
                        <span class="text-red-500">*</span>
                    </label>


                    <select
                        id="availability"
                        name="availability"
                        required
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10 @error('availability') border-red-400 @enderror"
                    >

                        <option
                            value="EN_STOCK"
                            @selected(
                                old(
                                    'availability',
                                    'EN_STOCK'
                                )
                                ===
                                'EN_STOCK'
                            )
                        >
                            En stock
                        </option>


                        <option
                            value="RUPTURE"
                            @selected(
                                old('availability')
                                ===
                                'RUPTURE'
                            )
                        >
                            Rupture
                        </option>

                    </select>


                    @error('availability')

                        <p
                            class="mt-2 text-sm font-semibold text-red-600"
                        >
                            {{ $message }}
                        </p>

                    @enderror


                    <p
                        class="mt-2 text-xs leading-5 text-gray-500"
                    >
                        En stock : produit disponible.
                        Rupture : produit momentanément indisponible.
                    </p>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- IMAGE --}}
            {{-- ========================================================= --}}

            <div
                class="mb-8"
            >

                <div
                    class="mb-2 flex items-center justify-between"
                >

                    <label
                        for="image"
                        class="text-sm font-bold text-[#245B45]"
                    >
                        Image du produit
                    </label>


                    <span
                        class="rounded-full bg-[#F7F4E8] px-3 py-1 text-xs font-bold text-[#789383]"
                    >
                        Facultatif
                    </span>

                </div>



                <div
                    class="grid gap-5 md:grid-cols-[1fr_220px]"
                >


                    {{-- INPUT --}}
                    <div>

                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-700 file:mr-4 file:rounded-lg file:border-0 file:bg-[#eef2e7] file:px-4 file:py-2 file:font-bold file:text-[#245B45]"
                        >


                        @error('image')

                            <p
                                class="mt-2 text-sm font-semibold text-red-600"
                            >
                                {{ $message }}
                            </p>

                        @enderror


                        <p
                            class="mt-2 text-xs leading-5 text-gray-500"
                        >
                            Formats autorisés : JPG, JPEG, PNG et WEBP.
                            Taille maximale : 2 Mo.
                        </p>

                    </div>



                    {{-- APERÇU --}}
                    <div
                        class="overflow-hidden rounded-2xl border border-[#e7e2d3] bg-[#F7F4E8]"
                    >

                        <div
                            id="image-placeholder"
                            class="flex h-40 items-center justify-center p-6 text-center"
                        >

                            <div>

                                <img
                                    src="{{ asset('images/logo-terre-verte.png') }}"
                                    alt="Terre Verte"
                                    class="mx-auto h-16 w-auto object-contain opacity-50"
                                >


                                <p
                                    class="mt-3 text-xs font-semibold text-gray-400"
                                >
                                    Aperçu de l'image
                                </p>

                            </div>

                        </div>


                        <img
                            id="image-preview"
                            src=""
                            alt="Aperçu du produit"
                            class="hidden h-40 w-full object-cover"
                        >

                    </div>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- INFORMATIONS --}}
            {{-- ========================================================= --}}

            <div
                class="mb-8 rounded-2xl border border-[#dfe7d8] bg-[#F7F4E8] p-5"
            >

                <p
                    class="font-bold text-[#245B45]"
                >
                    Avant l'enregistrement
                </p>


                <p
                    class="mt-2 text-sm leading-6 text-gray-600"
                >
                    Vérifiez le nom du produit, sa catégorie,
                    son prix et sa disponibilité. Le produit sera
                    ensuite visible dans le catalogue Terre Verte.
                </p>

            </div>



            {{-- ========================================================= --}}
            {{-- ACTIONS --}}
            {{-- ========================================================= --}}

            <div
                class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:items-center sm:justify-end"
            >

                <a
                    href="{{ route('admin.products.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-gray-300 px-6 py-3 font-bold text-gray-600 transition hover:bg-gray-50"
                >
                    Annuler
                </a>


                <button
                    type="submit"
                    @if($categories->isEmpty()) disabled @endif
                    class="inline-flex items-center justify-center rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936] disabled:cursor-not-allowed disabled:opacity-50"
                >
                    Ajouter le produit
                </button>

            </div>

        </form>

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
            Administration
        </p>


        <h3
            class="font-playfair mt-1 text-xl font-bold text-[#1F3A2D]"
        >
            Accès rapides
        </h3>


        <div
            class="mt-5 flex flex-wrap gap-3"
        >

            <a
                href="{{ route('admin.products.index') }}"
                class="rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
            >
                Liste des produits
            </a>


            <a
                href="{{ route('admin.categories.index') }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 text-sm font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Catégories
            </a>


            <a
                href="{{ route('admin.dashboard') }}"
                class="rounded-xl border border-[#245B45] px-5 py-3 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
            >
                Tableau de bord
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



{{-- ========================================================= --}}
{{-- APERÇU IMAGE --}}
{{-- ========================================================= --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const imageInput =
            document.getElementById('image');

        const imagePreview =
            document.getElementById('image-preview');

        const imagePlaceholder =
            document.getElementById('image-placeholder');


        if (!imageInput) {
            return;
        }


        imageInput.addEventListener(
            'change',
            function (event) {

                const file =
                    event.target.files[0];


                if (!file) {

                    imagePreview.src = '';

                    imagePreview.classList.add(
                        'hidden'
                    );

                    imagePlaceholder.classList.remove(
                        'hidden'
                    );

                    return;
                }


                if (
                    !file.type.startsWith('image/')
                ) {

                    imageInput.value = '';

                    imagePreview.src = '';

                    imagePreview.classList.add(
                        'hidden'
                    );

                    imagePlaceholder.classList.remove(
                        'hidden'
                    );

                    return;
                }


                const reader =
                    new FileReader();


                reader.onload = function (e) {

                    imagePreview.src =
                        e.target.result;

                    imagePreview.classList.remove(
                        'hidden'
                    );

                    imagePlaceholder.classList.add(
                        'hidden'
                    );
                };


                reader.readAsDataURL(file);

            }
        );

    }
);

</script>


</body>

</html>