<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        // Administrateur
        if ($user->role && $user->role->name === 'Administrateur') {
            return redirect()->route('admin.dashboard');
        }

        // Utilisateur
        if ($user->role && $user->role->name === 'Utilisateur') {
            return redirect()->route('user.dashboard');
        }

        // Si aucun rôle n'est trouvé
        Auth::guard('web')->logout();

        return redirect()
            ->route('login')
            ->withErrors([
                'email' => 'Votre compte ne possède pas de rôle valide.',
            ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}