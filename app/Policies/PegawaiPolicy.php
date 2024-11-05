<?php

namespace App\Policies;

use App\Models\Pegawai;
use App\Models\User;

class PegawaiPolicy
{
    /**
     * Izinkan user untuk memperbarui profil pegawai jika `user_id` cocok.
     */
    public function update(User $user, Pegawai $pegawai)
    {
        // Mengizinkan admin atau user pemilik data
        return $user->role === 'admin' || $user->id === $pegawai->user_id;
    }

    public function view(User $user, Pegawai $pegawai)
    {
        // Mengizinkan admin atau user pemilik data
        return $user->role === 'admin' || $user->id === $pegawai->user_id;
    }


}
