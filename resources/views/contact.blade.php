<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Contact | Terre Verte</title>

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


<body class="bg-[#F7F4E8] text-[#263A30]">


{{-- ========================================================= --}}
{{-- NAVBAR --}}
{{-- ========================================================= --}}

<header
    class="sticky top-0 z-50 border-b border-[#e6e0cf] bg-white/95 backdrop-blur"
>

    <div
        class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4"
    >


        {{-- LOGO --}}
        <a
            href="{{ route('home') }}"
            class="flex items-center gap-3"
        >

            <img
                src="{{ asset('images/logo-terre-verte.png') }}"
                alt="Terre Verte"
                class="h-12 w-auto"
            >


            <div class="hidden sm:block">

                <p
                    class="font-playfair text-xl font-bold text-[#245B45]"
                >
                    Terre Verte
                </p>

                <p class="text-xs text-gray-500">
                    Agriculture & produits naturels
                </p>

            </div>

        </a>



        {{-- MENU --}}
        <nav
            class="hidden items-center gap-7 lg:flex"
        >

            <a
                href="{{ route('home') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245B45]"
            >
                Accueil
            </a>


            <a
                href="{{ route('products.index') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245B45]"
            >
                Produits
            </a>


            <a
                href="{{ route('about') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245B45]"
            >
                À propos
            </a>


            <a
                href="{{ route('services') }}"
                class="font-semibold text-gray-600 transition hover:text-[#245B45]"
            >
                Services
            </a>


            <a
                href="{{ route('contact') }}"
                class="font-bold text-[#245B45]"
            >
                Contact
            </a>

        </nav>



        {{-- AUTH --}}
        <div class="flex items-center gap-3">

            @auth

                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
                >
                    Mon espace
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="rounded-xl bg-[#245B45] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#194936]"
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

<section class="relative overflow-hidden bg-[#245B45]">

    <div
        class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-white/5"
    ></div>

    <div
        class="absolute -bottom-32 -left-24 h-96 w-96 rounded-full bg-[#F5D85F]/10"
    ></div>


    <div
        class="relative mx-auto max-w-7xl px-6 py-20 text-center"
    >

        <span
            class="inline-flex rounded-full bg-white/10 px-5 py-2 text-sm font-bold text-[#F5D85F]"
        >
            Contactez-nous
        </span>


        <h1
            class="font-playfair mx-auto mt-6 max-w-4xl text-4xl font-bold leading-tight text-white md:text-6xl"
        >
            Nous sommes à votre écoute
        </h1>


        <p
            class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-white/80"
        >
            Une question concernant nos produits ou nos services ?
            Envoyez-nous votre message et notre équipe vous répondra.
        </p>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CONTACT --}}
{{-- ========================================================= --}}

<main
    class="mx-auto max-w-7xl px-6 py-16"
>

    <div
        class="grid gap-10 lg:grid-cols-5"
    >


        {{-- ========================================================= --}}
        {{-- INFORMATIONS --}}
        {{-- ========================================================= --}}

        <section class="lg:col-span-2">

            <p
                class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
            >
                Terre Verte
            </p>


            <h2
                class="font-playfair mt-3 text-4xl font-bold text-[#1F3A2D]"
            >
                Parlons de votre besoin
            </h2>


            <p
                class="mt-5 leading-8 text-gray-600"
            >
                Notre équipe reste disponible pour répondre à vos
                demandes concernant les produits, les services ou toute
                autre information.
            </p>



            <div class="mt-10 space-y-5">


                {{-- EMAIL --}}
                <div
                    class="rounded-2xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
                >

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#eef2e7] text-sm font-black text-[#245B45]"
                        >
                            @
                        </div>


                        <div>

                            <p
                                class="font-bold text-[#245B45]"
                            >
                                Email
                            </p>

                            <p
                                class="mt-1 text-sm text-gray-500"
                            >
                                Envoyez-nous votre demande
                            </p>

                            <a
                                href="mailto:contact@terreverte.ma"
                                class="mt-2 block font-semibold text-[#263A30] hover:text-[#245B45]"
                            >
                                contact@terreverte.ma
                            </a>

                        </div>

                    </div>

                </div>



                {{-- TELEPHONE --}}
                <div
                    class="rounded-2xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
                >

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#eef2e7] text-sm font-black text-[#245B45]"
                        >
                            TEL
                        </div>


                        <div>

                            <p
                                class="font-bold text-[#245B45]"
                            >
                                Téléphone
                            </p>

                            <p
                                class="mt-1 text-sm text-gray-500"
                            >
                                Contactez notre équipe
                            </p>

                            <p
                                class="mt-2 font-semibold text-[#263A30]"
                            >
                                +212 6 00 00 00 00
                            </p>

                        </div>

                    </div>

                </div>



                {{-- LOCALISATION --}}
                <div
                    class="rounded-2xl border border-[#e7e2d3] bg-white p-6 shadow-sm"
                >

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#eef2e7] text-sm font-black text-[#245B45]"
                        >
                            MA
                        </div>


                        <div>

                            <p
                                class="font-bold text-[#245B45]"
                            >
                                Localisation
                            </p>

                            <p
                                class="mt-1 text-sm text-gray-500"
                            >
                                Maroc
                            </p>

                            <p
                                class="mt-2 font-semibold text-[#263A30]"
                            >
                                Casablanca
                            </p>

                        </div>

                    </div>

                </div>


            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- FORMULAIRE --}}
        {{-- ========================================================= --}}

        <section class="lg:col-span-3">

            <div
                class="rounded-3xl bg-white p-7 shadow-sm md:p-10"
            >


                <div class="mb-8">

                    <p
                        class="text-sm font-black uppercase tracking-[0.25em] text-[#789383]"
                    >
                        Formulaire
                    </p>


                    <h2
                        class="font-playfair mt-2 text-3xl font-bold text-[#1F3A2D]"
                    >
                        Envoyer un message
                    </h2>

                </div>



                {{-- SUCCESS --}}
                @if(session('success'))

                    <div
                        class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-bold text-green-700"
                    >
                        {{ session('success') }}
                    </div>

                @endif



                {{-- ERREURS --}}
                @if($errors->any())

                    <div
                        class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4"
                    >

                        <p
                            class="font-bold text-red-700"
                        >
                            Veuillez vérifier les informations saisies.
                        </p>


                        <ul
                            class="mt-2 list-inside list-disc text-sm text-red-600"
                        >

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="space-y-6"
                >

                    @csrf



                    {{-- NOM + EMAIL --}}
                    <div
                        class="grid gap-6 md:grid-cols-2"
                    >


                        {{-- NOM --}}
                        <div>

                            <label
                                for="name"
                                class="mb-2 block text-sm font-bold text-[#245B45]"
                            >
                                Nom complet

                                <span class="text-red-500">
                                    *
                                </span>
                            </label>


                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                placeholder="Votre nom complet"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                            >


                            @error('name')

                                <p
                                    class="mt-2 text-sm text-red-600"
                                >
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- EMAIL --}}
                        <div>

                            <label
                                for="email"
                                class="mb-2 block text-sm font-bold text-[#245B45]"
                            >
                                Adresse email

                                <span class="text-red-500">
                                    *
                                </span>
                            </label>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="exemple@email.com"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                            >


                            @error('email')

                                <p
                                    class="mt-2 text-sm text-red-600"
                                >
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                    </div>



                    {{-- TELEPHONE + SUJET --}}
                    <div
                        class="grid gap-6 md:grid-cols-2"
                    >


                        {{-- TELEPHONE --}}
                        <div>

                            <label
                                for="phone"
                                class="mb-2 block text-sm font-bold text-[#245B45]"
                            >
                                Téléphone
                            </label>


                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="06 00 00 00 00"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                            >


                            @error('phone')

                                <p
                                    class="mt-2 text-sm text-red-600"
                                >
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- SUJET --}}
                        <div>

                            <label
                                for="subject"
                                class="mb-2 block text-sm font-bold text-[#245B45]"
                            >
                                Sujet

                                <span class="text-red-500">
                                    *
                                </span>
                            </label>


                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                required
                                placeholder="Sujet de votre demande"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                            >


                            @error('subject')

                                <p
                                    class="mt-2 text-sm text-red-600"
                                >
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                    </div>



                    {{-- MESSAGE --}}
                    <div>

                        <label
                            for="message"
                            class="mb-2 block text-sm font-bold text-[#245B45]"
                        >
                            Message

                            <span class="text-red-500">
                                *
                            </span>
                        </label>


                        <textarea
                            id="message"
                            name="message"
                            rows="7"
                            required
                            placeholder="Écrivez votre message ici..."
                            class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3.5 text-gray-800 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/10"
                        >{{ old('message') }}</textarea>


                        @error('message')

                            <p
                                class="mt-2 text-sm text-red-600"
                            >
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- BOUTON --}}
                    <div
                        class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
                    >

                        <p
                            class="text-sm text-gray-500"
                        >
                            Les champs avec

                            <span
                                class="font-bold text-red-500"
                            >
                                *
                            </span>

                            sont obligatoires.
                        </p>


                        <button
                            type="submit"
                            class="rounded-xl bg-[#245B45] px-7 py-3.5 font-bold text-white shadow-sm transition hover:bg-[#194936]"
                        >
                            Envoyer le message
                        </button>

                    </div>


                </form>

            </div>

        </section>


    </div>

</main>



{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}

<section
    class="bg-[#245B45]"
>

    <div
        class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-6 px-6 py-12 text-center md:flex-row md:text-left"
    >

        <div>

            <p
                class="text-sm font-bold uppercase tracking-[0.2em] text-[#F5D85F]"
            >
                Terre Verte
            </p>


            <h2
                class="font-playfair mt-2 text-3xl font-bold text-white"
            >
                Découvrez également nos produits
            </h2>

        </div>


        <a
            href="{{ route('products.index') }}"
            class="rounded-xl bg-[#F5D85F] px-7 py-3.5 font-black text-[#245B45] transition hover:scale-[1.02]"
        >
            Voir les produits
        </a>

    </div>

</section>



{{-- ========================================================= --}}
{{-- FOOTER --}}
{{-- ========================================================= --}}

<footer
    class="bg-[#18392D] text-white"
>

    <div
        class="mx-auto grid max-w-7xl gap-10 px-6 py-12 md:grid-cols-3"
    >


        {{-- MARQUE --}}
        <div>

            <div
                class="flex items-center gap-3"
            >

                <img
                    src="{{ asset('images/logo-terre-verte.png') }}"
                    alt="Terre Verte"
                    class="h-12 w-auto"
                >

                <p
                    class="font-playfair text-xl font-bold"
                >
                    Terre Verte
                </p>

            </div>


            <p
                class="mt-4 max-w-sm leading-7 text-white/70"
            >
                Des produits agricoles et naturels accessibles à travers
                une plateforme simple et moderne.
            </p>

        </div>



        {{-- NAVIGATION --}}
        <div>

            <h3
                class="font-bold text-[#F5D85F]"
            >
                Navigation
            </h3>


            <div
                class="mt-4 space-y-3 text-white/70"
            >

                <a
                    href="{{ route('home') }}"
                    class="block transition hover:text-white"
                >
                    Accueil
                </a>


                <a
                    href="{{ route('products.index') }}"
                    class="block transition hover:text-white"
                >
                    Produits
                </a>


                <a
                    href="{{ route('about') }}"
                    class="block transition hover:text-white"
                >
                    À propos
                </a>


                <a
                    href="{{ route('services') }}"
                    class="block transition hover:text-white"
                >
                    Services
                </a>


                <a
                    href="{{ route('contact') }}"
                    class="block transition hover:text-white"
                >
                    Contact
                </a>

            </div>

        </div>



        {{-- ESPACE --}}
        <div>

            <h3
                class="font-bold text-[#F5D85F]"
            >
                Espace
            </h3>


            <div
                class="mt-4 space-y-3 text-white/70"
            >

                @auth

                    <a
                        href="{{ route('dashboard') }}"
                        class="block transition hover:text-white"
                    >
                        Mon espace
                    </a>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="block transition hover:text-white"
                    >
                        Connexion
                    </a>

                @endauth

            </div>

        </div>


    </div>



    {{-- COPYRIGHT --}}
    <div
        class="border-t border-white/10"
    >

        <div
            class="mx-auto max-w-7xl px-6 py-5 text-center text-sm text-white/50"
        >
            © {{ date('Y') }} Terre Verte. Tous droits réservés.
        </div>

    </div>

</footer>


</body>

</html>