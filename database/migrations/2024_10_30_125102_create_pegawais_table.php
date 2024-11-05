<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('password');
            $table->string('sk_cpns')->nullable();
            $table->string('sk_pns')->nullable();
            $table->string('kk')->nullable();
            $table->string('akte')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah_sd')->nullable();
            $table->string('ijazah_smp')->nullable();
            $table->string('ijazah_sma')->nullable();
            $table->string('ijazah_kuliah')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
