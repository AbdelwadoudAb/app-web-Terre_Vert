<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Vérification e-mail - Terre Verte</title>

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

            <h1 class="text-4xl font-bold text-white">
                Terre Verte
            </h1>

            <p class="mt-2 text-base text-white/80">
                Vérification du compte
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

            <h2 class="text-3xl font-bold text-white">
                Vérifiez votre adresse e-mail
            </h2>


            <p class="mt-3 leading-6 text-white/80">
                Merci pour votre inscription.
                Avant de continuer, veuillez vérifier votre adresse e-mail
                en cliquant sur le lien que nous vous avons envoyé.
            </p>


            <p class="mt-4 leading-6 text-white/80">
                Si vous n'avez pas reçu l'e-mail, vous pouvez demander
                l'envoi d'un nouveau lien de vérification.
            </p>


            {{-- MESSAGE DE SUCCÈS --}}
            @if (session('status') == 'verification-link-sent')

                <div
                    class="mt-6 rounded-xl
                           border border-green-200/40
                           bg-green-500/20
                           px-4 py-3
                           text-sm
                           font-medium
                           text-white"
                >
                    Un nouveau lien de vérification a été envoyé
                    à votre adresse e-mail.
                </div>

            @endif


            {{-- RENVOYER LE LIEN --}}
            <form
                method="POST"
                action="{{ route('verification.send') }}"
                class="mt-7"
            >

                @csrf

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
                    Renvoyer le lien de vérification
                </button>

            </form>


            {{-- DECONNEXION --}}
            <form
                method="POST"
                action="{{ route('logout') }}"
                class="mt-4"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full
                           rounded-xl
                           border border-white/40
                           bg-white/10
                           py-3
                           text-sm
                           font-semibold
                           text-white
                           transition
                           hover:bg-white/20"
                >
                    Se déconnecter
                </button>

            </form>

        </div>


        {{-- FOOTER --}}
        <p class="mt-6 text-center text-sm text-white/70">
            © {{ date('Y') }} Terre Verte — Tous droits réservés
        </p>

    </div>

</body>

</html>