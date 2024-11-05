<?php

namespace App\Http\Controllers;

use App\Events\UserApproved;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');  // Buat view ini di resources/views/admin/dashboard.blade.php
    }

    public function index()
    {
        // Menampilkan user yang belum disetujui
        $pendingUsers = User::where('is_approved', false)->get();
        return view('admin.approvals', compact('pendingUsers'));
    }

    public function approve(User $user)
    {
        // Set is_approved menjadi true
        $user->is_approved = true;
        $user->save();

        // Panggil event UserApproved dengan parameter user yang disetujui
        event(new UserApproved($user));

        return redirect()->route('admin.approvals')->with(
            'status', 'User berhasil disetujui dan data pegawai telah dibuat.'
        );
    }
}
