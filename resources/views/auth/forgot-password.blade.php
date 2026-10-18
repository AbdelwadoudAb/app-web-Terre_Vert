<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mot de passe oublié - Terre Verte</title>

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
                Récupération du compte
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
                Mot de passe oublié ?
            </h2>


            <p
                class="mb-7 mt-3 leading-6 text-white/80"
            >
                Entrez votre adresse e-mail.
                Nous vous enverrons un lien permettant
                de réinitialiser votre mot de passe.
            </p>


            {{-- MESSAGE DE SUCCÈS --}}
            @if(session('status'))

                <div
                    class="mb-5 rounded-xl border border-green-200/50 bg-green-500/20 px-4 py-3 text-sm font-medium text-white"
                >
                    {{ session('status') }}
                </div>

            @endif


            <form
                method="POST"
                action="{{ route('password.email') }}"
            >

                @csrf


                {{-- EMAIL --}}
                <div class="mb-6">

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
                        placeholder="votre@email.com"
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
                    Envoyer le lien de réinitialisation
                </button>

            </form>


            {{-- RETOUR LOGIN --}}
            <div class="mt-6 text-center">

                <a
                    href="{{ route('login') }}"
                    class="text-sm text-white/90 underline transition hover:text-white"
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

</body>

</html>