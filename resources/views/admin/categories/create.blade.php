<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Ajouter une catégorie | Terre Verte</title>

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

                    <p class="text-xs text-gray-500">
                        Espace Administrateur
                    </p>

                </div>

            </a>


            {{-- NAVIGATION --}}
            <div class="flex items-center gap-3">

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
                >
                    Retour aux catégories
                </a>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 sm:inline-flex"
                >
                    Dashboard
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
        class="mx-auto w-full max-w-5xl flex-1 px-6 py-8"
    >


        {{-- HERO --}}
        <section
            class="relative overflow-hidden rounded-3xl bg-[#245B45] p-8 text-white md:p-10"
        >

            <div
                class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/5"
            ></div>

            <div
                class="absolute -bottom-20 -left-12 h-64 w-64 rounded-full bg-[#F5D85F]/10"
            ></div>


            <div class="relative">

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
                >
                    Gestion des catégories
                </p>


                <h2
                    class="font-playfair mt-2 text-4xl font-bold"
                >
                    Ajouter une catégorie
                </h2>


                <p
                    class="mt-3 max-w-2xl leading-7 text-white/75"
                >
                    Créez une nouvelle catégorie pour organiser
                    les produits de Terre Verte.
                </p>

            </div>

        </section>


        {{-- ERREURS --}}
        @if($errors->any())

            <div
                class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-5"
            >

                <h4
                    class="font-bold text-red-700"
                >
                    Vérifiez les informations saisies
                </h4>

                <ul
                    class="mt-3 list-inside list-disc space-y-1 text-sm text-red-600"
                >

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORMULAIRE --}}
        <section class="mt-6">

            <div
                class="overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
            >


                {{-- HEADER FORM --}}
                <div
                    class="border-b border-gray-100 bg-[#eef2e7] px-8 py-6"
                >

                    <p
                        class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                    >
                        Nouvelle catégorie
                    </p>

                    <h3
                        class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                    >
                        Informations de la catégorie
                    </h3>

                    <p
                        class="mt-2 text-sm text-gray-500"
                    >
                        Remplissez les informations ci-dessous.
                    </p>

                </div>


                <form
                    action="{{ route('admin.categories.store') }}"
                    method="POST"
                    class="p-8"
                >

                    @csrf


                    {{-- NOM --}}
                    <div class="mb-7">

                        <label
                            for="name"
                            class="mb-2 block text-sm font-bold text-[#245B45]"
                        >
                            Nom de la catégorie
                            <span class="text-red-500">*</span>
                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Ex. Fruits et légumes"
                            required
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                        >


                        @error('name')

                            <p
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>

                        @enderror


                        <p
                            class="mt-2 text-xs text-gray-500"
                        >
                            Choisissez un nom court et facilement identifiable.
                        </p>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="mb-7">

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
                                Optionnel
                            </span>

                        </div>


                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="Décrivez brièvement cette catégorie..."
                            class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                        >{{ old('description') }}</textarea>


                        @error('description')

                            <p
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>

                        @enderror


                        <p
                            class="mt-2 text-xs text-gray-500"
                        >
                            Une description claire facilite la gestion du catalogue.
                        </p>

                    </div>


                    {{-- CONSEIL --}}
                    <div
                        class="mb-8 rounded-2xl border border-[#dfe7d8] bg-[#F7F4E8] p-5"
                    >

                        <h4
                            class="font-bold text-[#245B45]"
                        >
                            Conseil
                        </h4>

                        <p
                            class="mt-2 text-sm leading-6 text-gray-600"
                        >
                            Utilisez des catégories simples comme
                            « Fruits », « Légumes », « Céréales »
                            ou « Produits naturels ».
                        </p>

                    </div>


                    {{-- ACTIONS --}}
                    <div
                        class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:justify-end"
                    >

                        <a
                            href="{{ route('admin.categories.index') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-gray-300 px-6 py-3 font-bold text-gray-600 transition hover:bg-gray-50"
                        >
                            Annuler
                        </a>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                        >
                            Créer la catégorie
                        </button>

                    </div>

                </form>

            </div>

        </section>


        {{-- RETOUR --}}
        <div class="mb-4 mt-5">

            <a
                href="{{ route('admin.categories.index') }}"
                class="font-bold text-[#245B45] hover:underline"
            >
                ← Retour à la liste des catégories
            </a>

        </div>

    </main>


    {{-- FOOTER --}}
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