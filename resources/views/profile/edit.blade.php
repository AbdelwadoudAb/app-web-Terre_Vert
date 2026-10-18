<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon profil - Terre Verte</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #f7f4e8;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <header class="bg-[#245B45] shadow-lg">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">

            <div>
                <h1 class="text-2xl font-bold text-white">
                    Terre Verte
                </h1>

                <p class="text-sm text-white/70">
                    Espace utilisateur
                </p>
            </div>

            <div class="flex items-center gap-3">

                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-xl border border-white/30 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/10"
                >
                    Tableau de bord
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-xl bg-white px-4 py-2 text-sm font-bold text-[#245B45] transition hover:bg-gray-100"
                    >
                        Déconnexion
                    </button>
                </form>

            </div>

        </div>

    </header>


    {{-- CONTENU --}}
    <main class="mx-auto max-w-5xl px-6 py-10">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-[#1F3A2D]">
                Mon profil
            </h2>

            <p class="mt-2 text-gray-600">
                Gérez les informations et la sécurité de votre compte.
            </p>

        </div>


        {{-- MESSAGE SUCCÈS --}}
        @if(session('status') === 'profile-updated')

            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-800">
                Vos informations ont été mises à jour avec succès.
            </div>

        @endif


        <div class="space-y-8">


            {{-- INFORMATIONS PERSONNELLES --}}
            <section class="rounded-3xl bg-white p-8 shadow-sm">

                <h3 class="text-2xl font-bold text-[#245B45]">
                    Informations personnelles
                </h3>

                <p class="mt-2 text-sm text-gray-500">
                    Modifiez votre nom et votre adresse e-mail.
                </p>


                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    class="mt-7 space-y-5"
                >

                    @csrf
                    @method('PATCH')


                    {{-- NOM --}}
                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Nom
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            autocomplete="name"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/20"
                        >

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Adresse e-mail
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            autocomplete="username"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/20"
                        >

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#1F3A2D]"
                    >
                        Enregistrer les modifications
                    </button>

                </form>

            </section>



            {{-- MODIFIER MOT DE PASSE --}}
            <section class="rounded-3xl bg-white p-8 shadow-sm">

                <h3 class="text-2xl font-bold text-[#245B45]">
                    Modifier le mot de passe
                </h3>

                <p class="mt-2 text-sm text-gray-500">
                    Utilisez un mot de passe sécurisé pour protéger votre compte.
                </p>


                @if(session('status') === 'password-updated')

                    <div class="mt-5 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-800">
                        Votre mot de passe a été modifié avec succès.
                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('password.update') }}"
                    class="mt-7 space-y-5"
                >

                    @csrf
                    @method('PUT')


                    {{-- MOT DE PASSE ACTUEL --}}
                    <div>

                        <label
                            for="update_password_current_password"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Mot de passe actuel
                        </label>

                        <input
                            id="update_password_current_password"
                            type="password"
                            name="current_password"
                            autocomplete="current-password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/20"
                        >

                        @error('current_password', 'updatePassword')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- NOUVEAU MOT DE PASSE --}}
                    <div>

                        <label
                            for="update_password_password"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Nouveau mot de passe
                        </label>

                        <input
                            id="update_password_password"
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/20"
                        >

                        @error('password', 'updatePassword')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- CONFIRMATION --}}
                    <div>

                        <label
                            for="update_password_password_confirmation"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Confirmer le nouveau mot de passe
                        </label>

                        <input
                            id="update_password_password_confirmation"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-[#245B45] focus:ring-2 focus:ring-[#245B45]/20"
                        >

                    </div>


                    <button
                        type="submit"
                        class="rounded-xl bg-[#245B45] px-6 py-3 font-bold text-white transition hover:bg-[#1F3A2D]"
                    >
                        Modifier le mot de passe
                    </button>

                </form>

            </section>



            {{-- SUPPRIMER COMPTE --}}
            <section class="rounded-3xl border border-red-200 bg-white p-8 shadow-sm">

                <h3 class="text-2xl font-bold text-red-700">
                    Supprimer mon compte
                </h3>

                <p class="mt-2 text-sm leading-6 text-gray-500">
                    La suppression de votre compte est définitive.
                    Toutes les données associées à votre compte seront supprimées.
                </p>


                <form
                    method="POST"
                    action="{{ route('profile.destroy') }}"
                    class="mt-7"
                    onsubmit="return confirm('Voulez-vous vraiment supprimer votre compte ?');"
                >

                    @csrf
                    @method('DELETE')


                    <div class="mb-5">

                        <label
                            for="delete_password"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Confirmez votre mot de passe
                        </label>

                        <input
                            id="delete_password"
                            type="password"
                            name="password"
                            placeholder="Votre mot de passe"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-500/20"
                        >

                        @error('password', 'userDeletion')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="rounded-xl bg-red-600 px-6 py-3 font-bold text-white transition hover:bg-red-700"
                    >
                        Supprimer mon compte
                    </button>

                </form>

            </section>

        </div>

    </main>


    {{-- FOOTER --}}
    <footer class="mt-10 bg-[#1F3A2D]">

        <div class="mx-auto max-w-7xl px-6 py-6 text-center text-sm text-white/70">
            © {{ date('Y') }} Terre Verte — Tous droits réservés
        </div>

    </footer>

</body>

</html>