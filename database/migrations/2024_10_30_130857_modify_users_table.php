<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip')->unique()->after('id');
            $table->dropColumn('email'); // Hapus email jika tidak diperlukan

        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nip');
            $table->string('email')->unique()->after('name'); // Tambahkan kembali jika rollback

        });
    }
};
