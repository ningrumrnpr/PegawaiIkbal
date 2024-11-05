<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan form registrasi.
     */
    public function create(): View
    {
        return view('auth.register');  // Pastikan Anda memiliki view ini di resources/views/auth/
    }

    /**
     * Proses registrasi pengguna baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:users,nip',
            'password' => 'required|string|confirmed|min:8',
        ]);
        
        // dd([
        //     'name' => $request->name,
        //     'nip' => $request->nip,
        //     'password' => Hash::make($request->password),
        //     'role' => 'user',  // Pastikan ini adalah string
        // ]);
        

        User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'is_approved' => false,
        ]);

        return redirect()->route('login')->with('status', 'Akun Anda sedang menunggu persetujuan admin.');
    }
}
