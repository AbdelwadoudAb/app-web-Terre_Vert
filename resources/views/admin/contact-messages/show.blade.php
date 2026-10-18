<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Message de contact | Terre Verte</title>

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


<header
    class="border-b border-[#e5dfcf] bg-white"
>

    <div
        class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4"
    >

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

                <p class="text-xs text-gray-500">
                    Espace Utilisateur
                </p>

            </div>

        </a>


        <div class="flex items-center gap-3">

            <a
                href="{{ route('user.contact-messages.index') }}"
                class="rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45]"
            >
                Retour aux messages
            </a>


            <a
                href="{{ route('user.dashboard') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 sm:inline-flex"
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
                    class="rounded-xl bg-[#245B45] px-4 py-2.5 text-sm font-bold text-white"
                >
                    Déconnexion
                </button>

            </form>

        </div>

    </div>

</header>


<main
    class="mx-auto w-full max-w-6xl flex-1 px-6 py-8"
>


    <section
        class="relative overflow-hidden rounded-3xl bg-[#245B45] p-8 text-white md:p-10"
    >

        <p
            class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
        >
            Message de contact
        </p>

        <h2
            class="font-playfair mt-2 text-4xl font-bold"
        >
            Détail du message
        </h2>

        <p
            class="mt-3 max-w-2xl leading-7 text-white/75"
        >
            Consultez le message et marquez-le
            comme traité si nécessaire.
        </p>

    </section>


    @if(session('success'))

        <div
            class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-bold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    <section class="mt-6">

        <div
            class="overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
        >


            <div
                class="border-b border-gray-100 p-8"
            >

                <div
                    class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between"
                >

                    <div>

                        <p
                            class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                        >
                            Expéditeur
                        </p>

                        <h2
                            class="mt-2 text-3xl font-black text-[#1F3A2D]"
                        >
                            {{ $contactMessage->name }}
                        </h2>


                        <div
                            class="mt-4 space-y-2"
                        >

                            <a
                                href="mailto:{{ $contactMessage->email }}"
                                class="block font-semibold text-[#245B45] hover:underline"
                            >
                                {{ $contactMessage->email }}
                            </a>


                            @if($contactMessage->phone)

                                <a
                                    href="tel:{{ $contactMessage->phone }}"
                                    class="block text-gray-600"
                                >
                                    {{ $contactMessage->phone }}
                                </a>

                            @else

                                <p
                                    class="text-sm text-gray-400"
                                >
                                    Aucun téléphone renseigné
                                </p>

                            @endif

                        </div>

                    </div>


                    <div class="md:text-right">

                        <p class="text-sm text-gray-500">
                            Reçu le
                        </p>

                        <p
                            class="mt-1 font-bold"
                        >
                            {{ $contactMessage->created_at?->format('d/m/Y') }}
                        </p>

                        <p
                            class="text-sm text-gray-500"
                        >
                            à {{ $contactMessage->created_at?->format('H:i') }}
                        </p>

                    </div>

                </div>


                <div
                    class="mt-6 flex flex-wrap gap-3"
                >

                    @if($contactMessage->is_read)

                        <span
                            class="rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700"
                        >
                            Lu
                        </span>

                    @else

                        <span
                            class="rounded-full bg-yellow-100 px-4 py-2 text-sm font-bold text-yellow-700"
                        >
                            Non lu
                        </span>

                    @endif


                    @if($contactMessage->is_processed)

                        <span
                            class="rounded-full bg-blue-100 px-4 py-2 text-sm font-bold text-blue-700"
                        >
                            Traité
                        </span>

                    @else

                        <span
                            class="rounded-full bg-gray-100 px-4 py-2 text-sm font-bold text-gray-600"
                        >
                            Non traité
                        </span>

                    @endif

                </div>

            </div>


            <div
                class="border-b border-gray-100 p-8"
            >

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Sujet
                </p>

                <h3
                    class="font-playfair mt-2 text-2xl font-bold text-[#1F3A2D]"
                >
                    {{ $contactMessage->subject }}
                </h3>

            </div>


            <div class="p-8">

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#789383]"
                >
                    Message
                </p>

                <div
                    class="mt-4 rounded-2xl border border-[#e7e2d3] bg-[#F7F4E8] p-6"
                >

                    <p
                        class="whitespace-pre-line leading-8 text-gray-700"
                    >
                        {{ $contactMessage->message }}
                    </p>

                </div>

            </div>


            <div
                class="border-t border-gray-100 bg-[#faf9f4] p-8"
            >

                <div
                    class="flex flex-wrap gap-3"
                >


                    @if(!$contactMessage->is_read)

                        <form
                            action="{{ route(
                                'user.contact-messages.read',
                                $contactMessage
                            ) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="rounded-xl bg-yellow-100 px-5 py-3 font-bold text-yellow-700"
                            >
                                Marquer comme lu
                            </button>

                        </form>

                    @endif


                    @if(!$contactMessage->is_processed)

                        <form
                            action="{{ route(
                                'user.contact-messages.process',
                                $contactMessage
                            ) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="rounded-xl bg-blue-100 px-5 py-3 font-bold text-blue-700"
                            >
                                Marquer comme traité
                            </button>

                        </form>

                    @endif


                    <a
                        href="mailto:{{ $contactMessage->email }}?subject=Re: {{ urlencode($contactMessage->subject) }}"
                        class="rounded-xl bg-[#245B45] px-5 py-3 font-bold text-white"
                    >
                        Répondre par email
                    </a>


                    <form
                        action="{{ route(
                            'user.contact-messages.destroy',
                            $contactMessage
                        ) }}"
                        method="POST"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer ce message ?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-xl bg-red-100 px-5 py-3 font-bold text-red-600"
                        >
                            Supprimer
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>


    <div class="mb-4 mt-5">

        <a
            href="{{ route('user.contact-messages.index') }}"
            class="font-bold text-[#245B45] hover:underline"
        >
            Retour à tous les messages
        </a>

    </div>


</main>


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