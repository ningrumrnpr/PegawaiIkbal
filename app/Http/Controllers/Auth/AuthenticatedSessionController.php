<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        // Cek jika pegawai terkait ada, jika tidak arahkan ke form pengisian data
        if (!$user->pegawai) {
            return redirect()->route('pegawai.create')->with(
                'warning', 'Lengkapi data pegawai Anda terlebih dahulu.'
            );
        }

        // Arahkan pengguna ke halaman profil jika login berhasil
        return redirect()->route('profile.show');
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
