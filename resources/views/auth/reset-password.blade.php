<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Réinitialiser le mot de passe - Terre Verte</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;

            background:
                linear-gradient(
                    rgba(20, 70, 30, 0.25),
                    rgba(20, 70, 30, 0.35)
                ),
                url('{{ asset('images/login-bg.jpg') }}')
                center / cover no-repeat;
        }
    </style>
</head>


<body class="flex min-h-screen items-center justify-center px-4">

    <div class="w-full max-w-md">


        {{-- TITRE --}}
        <div class="mb-6 text-center">

            <h1
                class="text-4xl font-bold text-white"
            >
                Terre Verte
            </h1>

            <p
                class="mt-2 text-base text-white/80"
            >
                Sécurité du compte
            </p>

        </div>


        {{-- CARTE --}}
        <div
            class="rounded-3xl
                   border border-white/40
                   bg-white/15
                   p-8
                   shadow-2xl
                   backdrop-blur-xl"
        >

            <h2
                class="text-3xl font-bold text-white"
            >
                Nouveau mot de passe
            </h2>


            <p
                class="mb-7 mt-3 leading-6 text-white/80"
            >
                Choisissez un nouveau mot de passe
                pour accéder à votre compte.
            </p>


            <form
                method="POST"
                action="{{ route('password.store') }}"
            >

                @csrf


                {{-- TOKEN --}}
                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >


                {{-- EMAIL --}}
                <div class="mb-5">

                    <label
                        for="email"
                        class="mb-2 block text-sm font-medium text-white"
                    >
                        Adresse e-mail
                    </label>


                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
                        autocomplete="username"
                        class="w-full
                               rounded-xl
                               border border-white/40
                               bg-white/15
                               px-4 py-3
                               text-white
                               placeholder-white/60
                               outline-none
                               backdrop-blur-md
                               focus:border-white
                               focus:ring-2
                               focus:ring-white/30"
                    >


                    @error('email')

                        <p
                            class="mt-2 text-sm text-red-200"
                        >
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- NOUVEAU MOT DE PASSE --}}
                <div class="mb-5">

                    <label
                        for="password"
                        class="mb-2 block text-sm font-medium text-white"
                    >
                        Nouveau mot de passe
                    </label>


                    <div class="relative">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full
                                   rounded-xl
                                   border border-white/40
                                   bg-white/15
                                   px-4 py-3 pr-24
                                   text-white
                                   placeholder-white/60
                                   outline-none
                                   backdrop-blur-md
                                   focus:border-white
                                   focus:ring-2
                                   focus:ring-white/30"
                        >


                        <button
                            type="button"
                            id="password-toggle"
                            onclick="togglePassword()"
                            class="absolute
                                   right-4
                                   top-1/2
                                   -translate-y-1/2
                                   text-xs
                                   font-bold
                                   text-white/80
                                   transition
                                   hover:text-white"
                        >
                            Afficher
                        </button>

                    </div>


                    @error('password')

                        <p
                            class="mt-2 text-sm text-red-200"
                        >
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- CONFIRMATION --}}
                <div class="mb-6">

                    <label
                        for="password_confirmation"
                        class="mb-2 block text-sm font-medium text-white"
                    >
                        Confirmer le mot de passe
                    </label>


                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                        class="w-full
                               rounded-xl
                               border border-white/40
                               bg-white/15
                               px-4 py-3
                               text-white
                               placeholder-white/60
                               outline-none
                               backdrop-blur-md
                               focus:border-white
                               focus:ring-2
                               focus:ring-white/30"
                    >

                </div>


                {{-- BOUTON --}}
                <button
                    type="submit"
                    class="w-full
                           rounded-xl
                           bg-lime-700/90
                           py-3.5
                           text-base
                           font-bold
                           text-white
                           shadow-lg
                           transition
                           duration-300
                           hover:scale-[1.02]
                           hover:bg-lime-800"
                >
                    Réinitialiser le mot de passe
                </button>

            </form>


            {{-- RETOUR --}}
            <div class="mt-6 text-center">

                <a
                    href="{{ route('login') }}"
                    class="text-sm
                           text-white/90
                           underline
                           transition
                           hover:text-white"
                >
                    Retour à la connexion
                </a>

            </div>

        </div>


        {{-- FOOTER --}}
        <p
            class="mt-6 text-center text-sm text-white/70"
        >
            © {{ date('Y') }} Terre Verte — Tous droits réservés
        </p>

    </div>


    <script>
        function togglePassword() {

            const password =
                document.getElementById('password');

            const toggle =
                document.getElementById('password-toggle');


            if (password.type === 'password') {

                password.type = 'text';

                toggle.textContent = 'Masquer';

            } else {

                password.type = 'password';

                toggle.textContent = 'Afficher';

            }
        }
    </script>

</body>

</html>