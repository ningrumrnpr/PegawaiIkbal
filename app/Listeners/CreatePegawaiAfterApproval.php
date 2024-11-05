<?php

namespace App\Listeners;

use App\Events\UserApproved;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class CreatePegawaiAfterApproval
{
    /**
     * Handle the event.
     */
    public function handle(UserApproved $event): void
    {
        Pegawai::create([
            'nama' => $event->user->name,
            'nip' => $event->user->nip,
            'user_id' => $event->user->id,
            'password' => bcrypt('defaultpassword'),  // Pastikan password disimpan
        ]);
    }
}
