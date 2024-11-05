<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
     /**
     * Menampilkan daftar semua pegawai (hanya untuk admin).
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

        // Menampilkan form edit untuk pegawai tertentu
        public function edit($id)
        {
            $pegawai = Pegawai::findOrFail($id);
            return view('pegawai.edit', compact('pegawai'));
        }

    /**
     * Menampilkan profil pengguna dalam format baca saja.
     */
    public function showProfile()
    {
        $pegawai = Pegawai::where('user_id', Auth::id())->first();

        if (!$pegawai) {
            return redirect()->route('pegawai.create')->with('warning', 'Lengkapi data pegawai Anda terlebih dahulu.');
        }

        return view('pegawai.show', compact('pegawai')); // Menggunakan tampilan show untuk baca saja
    }

    /**
     * Menampilkan form untuk mengedit profil pengguna.
     */
    public function editProfile()
    {
        // Ambil data pegawai yang terkait dengan pengguna yang login
        $pegawai = Pegawai::where('user_id', Auth::id())->first();

        if (!$pegawai) {
            return redirect()->route('pegawai.create')->with('warning', 'Lengkapi data pegawai Anda terlebih dahulu.');
        }

        return view('pegawai.edit', compact('pegawai'));
    }

    public function updateProfile(Request $request)
    {
        $pegawai = Pegawai::where('user_id', Auth::id())->first();
        $this->authorize('update', $pegawai); // Tambahkan ini untuk cek otorisasi

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawais,nip,' . $pegawai->id,
            'password' => 'nullable|string|min:8|confirmed',
            'sk_cpns' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'sk_pns' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'kk' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'akte' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'ktp' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'ijazah_sd' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'ijazah_smp' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'ijazah_sma' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
            'ijazah_kuliah' => 'nullable|file|mimes:jpg,png,pdf|max:5120',
        ]);

        // Update nama dan nip
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;

        if ($request->filled('password')) {
            $pegawai->password = Hash::make($request->password);
        }

        // Update dokumen jika ada file baru yang diunggah
        foreach (['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $pegawai->{$fileField} = $request->file($fileField)->store('documents', 'public');
            }
        }

        $pegawai->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'required|string|max:255|unique:pegawais,nip,' . $id,
    ]);

    $pegawai = Pegawai::findOrFail($id);
    $this->authorize('update', $pegawai); // Tambahkan ini untuk cek otorisasi
    $pegawai->nama = $request->nama;
    $pegawai->nip = $request->nip;
    $pegawai->save();

    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }
}
