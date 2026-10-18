<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Administration') - Terre Verte</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="hidden w-72 flex-col bg-gradient-to-b from-green-950 via-green-900 to-emerald-900 text-white lg:flex">

            <!-- Logo -->
            <div class="border-b border-white/10 p-6">

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-2xl">
                        🌿
                    </div>

                    <div>
                        <h1 class="text-xl font-extrabold">
                            Terre Verte
                        </h1>

                        <p class="text-xs text-green-300">
                            Administration
                        </p>
                    </div>

                </a>

            </div>


            <!-- Navigation -->
            <nav class="flex-1 space-y-2 p-5">

                <p class="mb-4 px-3 text-xs font-bold uppercase tracking-wider text-green-400">
                    Menu principal
                </p>


                <!-- Dashboard -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3
                           text-sm font-semibold text-green-100
                           transition hover:bg-white/10 hover:text-white"
                >
                    <span class="text-lg">🏠</span>
                    Dashboard
                </a>


                <!-- Catégories -->
                <a
                    href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3
                           text-sm font-semibold text-green-100
                           transition hover:bg-white/10 hover:text-white"
                >
                    <span class="text-lg">📂</span>
                    Catégories
                </a>


                <!-- Produits -->
                <a
                    href="#"
                    class="flex items-center gap-3 rounded-xl px-4 py-3
                           text-sm font-semibold text-green-100
                           transition hover:bg-white/10 hover:text-white"
                >
                    <span class="text-lg">🌾</span>
                    Produits
                </a>


                <!-- Utilisateurs -->
                <a
                    href="#"
                    class="flex items-center gap-3 rounded-xl px-4 py-3
                           text-sm font-semibold text-green-100
                           transition hover:bg-white/10 hover:text-white"
                >
                    <span class="text-lg">👥</span>
                    Utilisateurs
                </a>


                <!-- Messages -->
                <a
                    href="{{ route('admin.contact-messages.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3
                           text-sm font-semibold text-green-100
                           transition hover:bg-white/10 hover:text-white"
                >
                    <span class="text-lg">💬</span>
                    Messages
                </a>


                <div class="my-5 border-t border-white/10"></div>


                <p class="mb-4 px-3 text-xs font-bold uppercase tracking-wider text-green-400">
                    Système
                </p>


                <!-- Site public -->
                <a
                    href="{{ route('home') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3
                           text-sm font-semibold text-green-100
                           transition hover:bg-white/10 hover:text-white"
                >
                    <span class="text-lg">🌍</span>
                    Voir le site
                </a>

            </nav>


            <!-- User -->
            <div class="border-t border-white/10 p-5">

                <div class="mb-4 flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-500 font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">

                        <p class="truncate text-sm font-bold">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="truncate text-xs text-green-300">
                            Administrateur
                        </p>

                    </div>

                </div>


                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3
                               text-sm font-semibold text-red-200
                               transition hover:bg-red-500/10 hover:text-red-100"
                    >
                        <span>🚪</span>
                        Déconnexion
                    </button>

                </form>

            </div>

        </aside>


        <!-- MAIN AREA -->
        <div class="flex min-w-0 flex-1 flex-col">


            <!-- TOPBAR -->
            <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">

                <div class="flex h-20 items-center justify-between px-6 lg:px-8">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Administration
                        </p>

                        <h2 class="text-xl font-extrabold text-green-950">
                            @yield('page-title', 'Terre Verte')
                        </h2>

                    </div>


                    <div class="flex items-center gap-4">

                        <a
                            href="{{ route('home') }}"
                            class="hidden rounded-xl border border-slate-200
                                   px-4 py-2 text-sm font-semibold text-slate-600
                                   transition hover:bg-slate-50 sm:block"
                        >
                            🌍 Voir le site
                        </a>


                        <div class="flex h-11 w-11 items-center justify-center
                                    rounded-full bg-green-100 font-bold text-green-800">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <main class="flex-1 p-6 lg:p-8">

                @yield('content')

            </main>


            <!-- FOOTER -->
            <footer class="border-t border-slate-200 bg-white px-6 py-5">

                <p class="text-center text-sm text-slate-400">
                    🌿 Terre Verte — Administration
                </p>

            </footer>

        </div>

    </div>

</body>

</html>