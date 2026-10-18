<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $client->name }} | Terre Verte</title>

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
                    Gestion des clients
                </p>


                <h2
                    class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                >
                    Détails du client
                </h2>


                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Consultez les coordonnées enregistrées
                    pour ce client.
                </p>

            </div>


            <a
                href="{{ route('user.clients.edit', $client) }}"
                class="inline-flex shrink-0 items-center justify-center rounded-xl bg-white px-6 py-3.5 font-bold text-[#245B45] transition hover:bg-[#F7F4E8]"
            >
                Modifier le client
            </a>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- MESSAGES --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div
            class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 font-semibold text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- INFORMATIONS CLIENT --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >

        {{-- TITRE --}}
        <div
            class="border-b border-gray-100 px-7 py-6"
        >

            <p
                class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
            >
                Client
            </p>

            <h3
                class="font-playfair mt-1 text-3xl font-bold text-[#1F3A2D]"
            >
                {{ $client->name }}
            </h3>

            <p
                class="mt-2 text-sm text-gray-500"
            >
                Client #{{ $client->id }}
            </p>

        </div>



        {{-- INFORMATIONS --}}
        <div
            class="grid gap-0 md:grid-cols-2"
        >


            {{-- NOM --}}
            <div
                class="border-b border-gray-100 p-6 md:border-r"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.15em] text-[#789383]"
                >
                    Nom complet
                </p>

                <p
                    class="mt-2 text-lg font-bold text-[#1F3A2D]"
                >
                    {{ $client->name }}
                </p>

            </div>



            {{-- CIN --}}
            <div
                class="border-b border-gray-100 p-6"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.15em] text-[#789383]"
                >
                    CIN
                </p>

                <p
                    class="mt-2 text-lg font-bold text-[#1F3A2D]"
                >
                    {{ $client->cin ?: 'Non renseigné' }}
                </p>

            </div>



            {{-- TÉLÉPHONE --}}
            <div
                class="border-b border-gray-100 p-6 md:border-r"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.15em] text-[#789383]"
                >
                    Téléphone
                </p>

                <p
                    class="mt-2 text-lg font-bold text-[#1F3A2D]"
                >
                    {{ $client->phone ?: 'Non renseigné' }}
                </p>

            </div>



            {{-- EMAIL --}}
            <div
                class="border-b border-gray-100 p-6"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.15em] text-[#789383]"
                >
                    Adresse e-mail
                </p>

                <p
                    class="mt-2 break-all text-lg font-bold text-[#1F3A2D]"
                >
                    {{ $client->email ?: 'Non renseignée' }}
                </p>

            </div>



            {{-- ADRESSE --}}
            <div
                class="p-6 md:col-span-2"
            >

                <p
                    class="text-xs font-black uppercase tracking-[0.15em] text-[#789383]"
                >
                    Adresse
                </p>

                <p
                    class="mt-2 whitespace-pre-line leading-7 text-gray-600"
                >
                    {{ $client->address ?: 'Non renseignée' }}
                </p>

            </div>


        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- INFORMATIONS SUPPLÉMENTAIRES --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 grid gap-4 sm:grid-cols-2"
    >

        {{-- DATE CRÉATION --}}
        <div
            class="rounded-2xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
        >

            <p
                class="text-sm font-bold text-gray-500"
            >
                Client enregistré le
            </p>

            <p
                class="mt-2 font-black text-[#245B45]"
            >
                {{ $client->created_at?->format('d/m/Y à H:i') ?? '—' }}
            </p>

        </div>



        {{-- DERNIÈRE MODIFICATION --}}
        <div
            class="rounded-2xl border border-[#e7e2d3] bg-white p-5 shadow-sm"
        >

            <p
                class="text-sm font-bold text-gray-500"
            >
                Dernière modification
            </p>

            <p
                class="mt-2 font-black text-[#245B45]"
            >
                {{ $client->updated_at?->format('d/m/Y à H:i') ?? '—' }}
            </p>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- ACTIONS --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 rounded-3xl border border-[#e7e2d3] bg-white p-7 shadow-sm"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
        >
            Actions
        </p>


        <h3
            class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
        >
            Que souhaitez-vous faire ?
        </h3>


        <div
            class="mt-6 flex flex-wrap gap-3"
        >


            {{-- MODIFIER --}}
            <a
                href="{{ route('user.clients.edit', $client) }}"
                class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white transition hover:bg-[#194936]"
            >
                Modifier le client
            </a>



            {{-- NOUVELLE FACTURE --}}
            <a
                href="{{ route('user.invoices.create') }}"
                class="rounded-xl bg-[#eef2e7] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#dfe7d8]"
            >
                Créer une facture
            </a>



            {{-- RETOUR --}}
            <a
                href="{{ route('user.clients.index') }}"
                class="rounded-xl border border-[#245B45] px-5 py-3 font-bold text-[#245B45] transition hover:bg-[#eef2e7]"
            >
                Retour aux clients
            </a>

        </div>

    </section>



    {{-- ========================================================= --}}
    {{-- SUPPRESSION --}}
    {{-- ========================================================= --}}

    <section
        class="mt-6 rounded-3xl border border-red-200 bg-white p-7 shadow-sm"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.18em] text-red-500"
        >
            Suppression
        </p>


        <h3
            class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
        >
            Supprimer ce client
        </h3>


        <p
            class="mt-3 max-w-2xl text-sm leading-6 text-gray-500"
        >
            Cette action supprime définitivement le client.
            Vérifiez qu'il n'est plus nécessaire avant de continuer.
        </p>


        <form
            action="{{ route('user.clients.destroy', $client) }}"
            method="POST"
            class="mt-5"
            onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?');"
        >

            @csrf

            @method('DELETE')


            <button
                type="submit"
                class="rounded-xl bg-red-50 px-5 py-3 font-bold text-red-600 transition hover:bg-red-100"
            >
                Supprimer le client
            </button>

        </form>

    </section>



    {{-- ========================================================= --}}
    {{-- RETOUR DASHBOARD --}}
    {{-- ========================================================= --}}

    <div
        class="mt-8 flex flex-wrap gap-3"
    >

        <a
            href="{{ route('user.clients.index') }}"
            class="font-bold text-[#245B45] transition hover:text-[#194936]"
        >
            Retour à la liste des clients
        </a>

    </div>


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