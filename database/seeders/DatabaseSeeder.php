<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // Tambahkan ini
use Illuminate\Support\Facades\Hash;  // Tambahkan ini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'nip' => '123456',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_approved' => true,
        ]);
    }
}
