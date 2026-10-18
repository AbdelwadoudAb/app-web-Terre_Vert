<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Messages de contact | Terre Verte</title>

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
                href="{{ route('user.dashboard') }}"
                class="hidden rounded-xl border border-[#245B45] px-4 py-2.5 text-sm font-bold text-[#245B45] sm:inline-flex"
            >
                Tableau de bord
            </a>


            <a
                href="{{ route('user.invoices.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 md:inline-flex"
            >
                Factures
            </a>


            <a
                href="{{ route('user.notifications.index') }}"
                class="hidden rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-bold text-gray-600 lg:inline-flex"
            >
                Notifications
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
    class="mx-auto w-full max-w-7xl flex-1 px-6 py-8"
>


    <section
        class="relative overflow-hidden rounded-3xl bg-[#245B45] p-8 text-white md:p-10"
    >

        <div
            class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.2em] text-[#F5D85F]"
                >
                    Espace Utilisateur
                </p>

                <h2
                    class="font-playfair mt-2 text-4xl font-bold md:text-5xl"
                >
                    Messages de contact
                </h2>

                <p
                    class="mt-4 max-w-2xl leading-7 text-white/75"
                >
                    Consultez les messages envoyés depuis
                    le formulaire de contact.
                </p>

            </div>


            <div
                class="rounded-2xl border border-white/10 bg-white/10 px-7 py-5"
            >

                <p class="text-sm text-white/70">
                    Total des messages
                </p>

                <p class="mt-1 text-3xl font-black">
                    {{ $messages->total() }}
                </p>

            </div>

        </div>

    </section>


    @if(session('success'))

        <div
            class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    <section
        class="mt-6 overflow-hidden rounded-3xl border border-[#e7e2d3] bg-white shadow-sm"
    >

        <div
            class="flex items-center justify-between border-b border-gray-100 px-6 py-5"
        >

            <div>

                <p
                    class="text-sm font-black uppercase tracking-[0.18em] text-[#789383]"
                >
                    Contact
                </p>

                <h3
                    class="font-playfair mt-1 text-2xl font-bold text-[#1F3A2D]"
                >
                    Messages reçus
                </h3>

            </div>


            <span
                class="rounded-full bg-[#eef2e7] px-4 py-2 text-sm font-bold text-[#245B45]"
            >
                {{ $messages->total() }} messages
            </span>

        </div>


        @if($messages->count() > 0)

            <div class="overflow-x-auto">

                <table
                    class="w-full min-w-[1200px]"
                >

                    <thead
                        class="bg-[#F7F4E8] text-left text-sm font-bold text-[#245B45]"
                    >

                        <tr>

                            <th class="px-5 py-4">
                                Nom
                            </th>

                            <th class="px-5 py-4">
                                Sujet
                            </th>

                            <th class="px-5 py-4">
                                Message
                            </th>

                            <th class="px-5 py-4">
                                Lecture
                            </th>

                            <th class="px-5 py-4">
                                Traitement
                            </th>

                            <th class="px-5 py-4">
                                Date
                            </th>

                            <th class="px-5 py-4 text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($messages as $message)

                            <tr
                                class="border-b border-gray-100 hover:bg-[#faf9f4]"
                            >

                                <td
                                    class="px-5 py-5"
                                >

                                    <p
                                        class="font-bold text-[#1F3A2D]"
                                    >
                                        {{ $message->name }}
                                    </p>

                                    <p
                                        class="mt-1 text-xs text-gray-500"
                                    >
                                        {{ $message->email }}
                                    </p>

                                </td>


                                <td
                                    class="px-5 py-5"
                                >
                                    {{ $message->subject }}
                                </td>


                                <td
                                    class="px-5 py-5"
                                >

                                    <p
                                        class="max-w-xs text-sm text-gray-600"
                                    >
                                        {{ \Illuminate\Support\Str::limit(
                                            $message->message,
                                            80
                                        ) }}
                                    </p>

                                </td>


                                <td
                                    class="px-5 py-5"
                                >

                                    @if($message->is_read)

                                        <span
                                            class="rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                        >
                                            Lu
                                        </span>

                                    @else

                                        <span
                                            class="rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700"
                                        >
                                            Non lu
                                        </span>

                                    @endif

                                </td>


                                <td
                                    class="px-5 py-5"
                                >

                                    @if($message->is_processed)

                                        <span
                                            class="rounded-full bg-blue-100 px-3 py-1.5 text-xs font-bold text-blue-700"
                                        >
                                            Traité
                                        </span>

                                    @else

                                        <span
                                            class="rounded-full bg-gray-100 px-3 py-1.5 text-xs font-bold text-gray-600"
                                        >
                                            Non traité
                                        </span>

                                    @endif

                                </td>


                                <td
                                    class="px-5 py-5"
                                >

                                    <p class="text-sm font-semibold">
                                        {{ $message->created_at?->format('d/m/Y') }}
                                    </p>

                                    <p class="text-xs text-gray-400">
                                        {{ $message->created_at?->format('H:i') }}
                                    </p>

                                </td>


                                <td
                                    class="px-5 py-5"
                                >

                                    <div
                                        class="flex flex-wrap justify-end gap-2"
                                    >

                                        <a
                                            href="{{ route(
                                                'user.contact-messages.show',
                                                $message
                                            ) }}"
                                            class="rounded-xl bg-[#eef2e7] px-4 py-2.5 text-sm font-bold text-[#245B45]"
                                        >
                                            Voir
                                        </a>


                                        @if(!$message->is_read)

                                            <form
                                                action="{{ route(
                                                    'user.contact-messages.read',
                                                    $message
                                                ) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="rounded-xl bg-yellow-50 px-4 py-2.5 text-sm font-bold text-yellow-700"
                                                >
                                                    Marquer lu
                                                </button>

                                            </form>

                                        @endif


                                        @if(!$message->is_processed)

                                            <form
                                                action="{{ route(
                                                    'user.contact-messages.process',
                                                    $message
                                                ) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="rounded-xl bg-blue-50 px-4 py-2.5 text-sm font-bold text-blue-700"
                                                >
                                                    Traiter
                                                </button>

                                            </form>

                                        @endif


                                        <form
                                            action="{{ route(
                                                'user.contact-messages.destroy',
                                                $message
                                            ) }}"
                                            method="POST"
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce message ?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-xl bg-red-50 px-4 py-2.5 text-sm font-bold text-red-600"
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


            @if($messages->hasPages())

                <div
                    class="border-t border-gray-100 px-6 py-5"
                >
                    {{ $messages->links() }}
                </div>

            @endif


        @else

            <div
                class="px-6 py-16 text-center"
            >

                <h3
                    class="text-2xl font-bold text-[#1F3A2D]"
                >
                    Aucun message
                </h3>

                <p
                    class="mt-3 text-gray-500"
                >
                    Aucun message de contact reçu.
                </p>

            </div>

        @endif

    </section>

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