<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        Pegawai::create([
            'nama' => 'Pegawai Contoh',
            'nip' => '123456789',
            'user_id' => 2, // Pastikan user dengan id 1 sudah ada
            'password' => Hash::make('password'),
        ]);
    }
}