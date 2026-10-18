<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Connexion - Terre Verte</title>

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


<body class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">


        {{-- TITRE --}}
        <div class="text-center mb-6">

            <h1
                class="text-4xl font-bold text-white"
            >
                Terre Verte
            </h1>

            <p
                class="mt-2 text-base text-white/80"
            >
                Administration
            </p>

        </div>



        {{-- CARTE CONNEXION --}}
        <div
            class="rounded-3xl
                   border border-white/40
                   bg-white/15
                   backdrop-blur-xl
                   shadow-2xl
                   p-8"
        >

            <h2
                class="text-3xl font-bold text-white"
            >
                Connexion
            </h2>


            <p
                class="mt-2 mb-7 text-white/80"
            >
                Bienvenue ! Connectez-vous à votre compte.
            </p>



            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


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
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="admin@terreverte.ma"
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



                {{-- MOT DE PASSE --}}
                <div class="mb-4">

                    <label
                        for="password"
                        class="mb-2 block text-sm font-medium text-white"
                    >
                        Mot de passe
                    </label>


                    <div class="relative">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
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
                            onclick="togglePassword()"
                            id="password-toggle"
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



                {{-- SE SOUVENIR --}}
                <div
                    class="mb-6 flex items-center"
                >

                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4
                               rounded
                               border-white/40
                               text-green-700
                               focus:ring-green-500"
                    >


                    <label
                        for="remember"
                        class="ml-2 text-sm text-white"
                    >
                        Se souvenir de moi
                    </label>

                </div>



                {{-- BOUTON CONNEXION --}}
                <button
                    type="submit"
                    class="w-full
                           rounded-xl
                           bg-lime-700/90
                           py-3.5
                           text-lg
                           font-bold
                           text-white
                           shadow-lg
                           transition
                           duration-300
                           hover:scale-[1.02]
                           hover:bg-lime-800"
                >
                    Se connecter
                </button>

            </form>



            {{-- MOT DE PASSE OUBLIÉ --}}
            @if(Route::has('password.request'))

                <div class="mt-6 text-center">

                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm
                               text-white/90
                               underline
                               transition
                               hover:text-white"
                    >
                        Mot de passe oublié ?
                    </a>

                </div>

            @endif

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