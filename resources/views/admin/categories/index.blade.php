<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Catégories | Terre Verte</title>

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

        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4">

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

                    <h1 class="font-playfair text-xl font-bold text-[#245B45]">
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
                    href="{{ route('admin.dashboard') }}"
                    class="rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
                >
                    Dashboard
                </a>

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 transition hover:bg-gray-50 sm:inline-flex"
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


    {{-- CONTENU --}}
    <main class="mx-auto w-full max-w-7xl flex-1 px-6 py-8">


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
                        class="font-playfair mt-2 text-4xl font-bold"
                    >
                        Catégories
                    </h2>

                    <p
                        class="mt-3 max-w-2xl leading-7 text-white/75"
                    >
                        Gérez les différentes catégories utilisées
                        pour organiser les produits de Terre Verte.
                    </p>

                </div>


                <a
                    href="{{ route('admin.categories.create') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-[#F5D85F] px-6 py-3.5 font-black text-[#245B45] transition hover:scale-[1.02]"
                >
                    + Ajouter une catégorie
                </a>

            </div>

        </section>


        {{-- MESSAGE SUCCESS --}}
        @if(session('success'))

            <div
                class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-bold text-green-700"
            >
                ✓ {{ session('success') }}
            </div>

        @endif


        {{-- TABLEAU --}}
        <section class="mt-6">

            <div
                class="overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
            >

                {{-- EN-TÊTE TABLEAU --}}
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
                            Liste des catégories
                        </h3>

                    </div>


                    <span
                        class="rounded-full bg-[#eef2e7] px-4 py-2 text-sm font-bold text-[#245B45]"
                    >
                        {{ $categories->count() }} catégorie(s)
                    </span>

                </div>


                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[850px]">

                        <thead
                            class="bg-[#F7F4E8] text-left text-sm font-bold text-[#245B45]"
                        >

                            <tr>

                                <th class="px-6 py-4">
                                    ID
                                </th>

                                <th class="px-6 py-4">
                                    Nom
                                </th>

                                <th class="px-6 py-4">
                                    Description
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

                            @forelse($categories as $category)

                                <tr
                                    class="border-b border-gray-100 transition hover:bg-[#faf9f4]"
                                >

                                    {{-- ID --}}
                                    <td
                                        class="px-6 py-5 font-bold text-gray-500"
                                    >
                                        #{{ $category->id }}
                                    </td>


                                    {{-- NOM --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#eef2e7] text-lg"
                                            >
                                                🌿
                                            </div>

                                            <span
                                                class="font-black text-[#1F3A2D]"
                                            >
                                                {{ $category->name }}
                                            </span>

                                        </div>

                                    </td>


                                    {{-- DESCRIPTION --}}
                                    <td
                                        class="px-6 py-5 text-sm text-gray-500"
                                    >

                                        @if($category->description)

                                            {{ \Illuminate\Support\Str::limit(
                                                $category->description,
                                                70
                                            ) }}

                                        @else

                                            <span class="italic text-gray-400">
                                                Aucune description
                                            </span>

                                        @endif

                                    </td>


                                    {{-- DATE --}}
                                    <td
                                        class="px-6 py-5 text-sm text-gray-500"
                                    >

                                        @if($category->created_at)

                                            {{ $category->created_at->format('d/m/Y') }}

                                        @else

                                            —

                                        @endif

                                    </td>


                                    {{-- ACTIONS --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- MODIFIER --}}
                                            <a
                                                href="{{ route(
                                                    'admin.categories.edit',
                                                    $category
                                                ) }}"
                                                class="rounded-xl bg-blue-50 px-4 py-2.5 text-sm font-bold text-blue-700 transition hover:bg-blue-100"
                                            >
                                                Modifier
                                            </a>


                                            {{-- SUPPRIMER --}}
                                            <form
                                                action="{{ route(
                                                    'admin.categories.destroy',
                                                    $category
                                                ) }}"
                                                method="POST"
                                                onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');"
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

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-12 text-center"
                                    >

                                        <div class="text-5xl">
                                            📂
                                        </div>

                                        <h3
                                            class="mt-4 text-xl font-black text-[#245B45]"
                                        >
                                            Aucune catégorie
                                        </h3>

                                        <p
                                            class="mt-2 text-gray-500"
                                        >
                                            Commencez par créer votre première catégorie.
                                        </p>

                                        <a
                                            href="{{ route('admin.categories.create') }}"
                                            class="mt-5 inline-flex rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#194936]"
                                        >
                                            + Ajouter une catégorie
                                        </a>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </section>


        {{-- RETOUR --}}
        <div class="mb-4 mt-5">

            <a
                href="{{ route('admin.dashboard') }}"
                class="font-bold text-[#245B45] hover:underline"
            >
                ← Retour au dashboard
            </a>

        </div>

    </main>


    {{-- FOOTER PLUS PETIT --}}
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