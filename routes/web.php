<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard untuk user yang disetujui
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route untuk user yang terotentikasi
Route::middleware('auth')->group(function () {
    // Rute untuk Profil dan Pengelolaan Data Pribadi
    Route::get('/profile', [PegawaiController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [PegawaiController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [PegawaiController::class, 'updateProfile'])->name('profile.updateProfile');
    // Rute untuk ganti password
    Route::get('/password/change', [PasswordController::class, 'edit'])->name('password.change');
    Route::post('/password/change', [PasswordController::class, 'update'])->name('password.update');
});

// Route khusus admin dengan role:admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/approvals', [AdminController::class, 'index'])->name('admin.approvals');
    Route::post('/admin/approve/{user}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
});

Route::resource('pegawai', PegawaiController::class);

// Route untuk registrasi user
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Route otentikasi
require __DIR__ . '/auth.php';
