<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Message - Terre Verte</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="{{ route('admin.dashboard') }}"
               class="text-2xl font-bold text-green-700">
                Terre Verte
            </a>

            <a href="{{ route('admin.contact-messages.index') }}"
               class="text-gray-600 hover:text-green-700">
                ← Retour aux messages
            </a>

        </div>
    </nav>


    <!-- Contenu -->
    <main class="max-w-4xl mx-auto px-6 py-10">

        <div class="bg-white rounded-2xl shadow-sm border p-8">

            <!-- Titre -->
            <div class="mb-8 border-b pb-6">

                <h1 class="text-3xl font-bold text-gray-900">
                    Message de contact
                </h1>

                <p class="mt-2 text-gray-500">
                    Reçu le
                    {{ $contactMessage->created_at->format('d/m/Y à H:i') }}
                </p>

            </div>


            <!-- Informations du visiteur -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">

                <div>
                    <p class="text-sm text-gray-500">
                        Nom complet
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $contactMessage->name }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Email
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $contactMessage->email }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Téléphone
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $contactMessage->phone ?? 'Non renseigné' }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Sujet
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $contactMessage->subject ?? 'Sans sujet' }}
                    </p>
                </div>

            </div>


            <!-- Statut -->
            <div class="mb-8">

                <p class="text-sm text-gray-500 mb-2">
                    Statut
                </p>

                @if ($contactMessage->status === 'non_lu')

                    <span class="inline-block px-3 py-1 rounded-full
                                 bg-red-100 text-red-700">
                        Non lu
                    </span>

                @elseif ($contactMessage->status === 'lu')

                    <span class="inline-block px-3 py-1 rounded-full
                                 bg-yellow-100 text-yellow-700">
                        Lu
                    </span>

                @else

                    <span class="inline-block px-3 py-1 rounded-full
                                 bg-green-100 text-green-700">
                        Traité
                    </span>

                @endif

            </div>


            <!-- Message -->
            <div class="mb-8">

                <p class="text-sm text-gray-500 mb-2">
                    Message
                </p>

                <div class="bg-gray-50 border rounded-xl p-6 whitespace-pre-line">
                    {{ $contactMessage->message }}
                </div>

            </div>


            <!-- Actions -->
            <div class="flex flex-wrap gap-3 border-t pt-6">

                @if ($contactMessage->status === 'non_lu')

                    <form
                        action="{{ route('admin.contact-messages.read', $contactMessage) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-yellow-500
                                   text-white hover:bg-yellow-600"
                        >
                            Marquer comme lu
                        </button>

                    </form>

                @endif


                @if ($contactMessage->status !== 'traite')

                    <form
                        action="{{ route('admin.contact-messages.process', $contactMessage) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-green-600
                                   text-white hover:bg-green-700"
                        >
                            Marquer comme traité
                        </button>

                    </form>

                @endif


                <form
                    action="{{ route('admin.contact-messages.destroy', $contactMessage) }}"
                    method="POST"
                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce message ?');"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-lg bg-red-600
                               text-white hover:bg-red-700"
                    >
                        Supprimer
                    </button>

                </form>

            </div>

        </div>

    </main>

</body>
</html>