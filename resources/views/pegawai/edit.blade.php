@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Edit Data Pegawai</h3>

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pegawai->nama }}" required>
        </div>

        <!-- NIP -->
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $pegawai->nip }}" required>
        </div>

        <!-- Password (Opsional) -->
        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Dokumen Pendukung -->
        @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $document)
            <div class="mb-3">
                <label for="{{ $document }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $document)) }}</label>
                <input type="file" class="form-control" id="{{ $document }}" name="{{ $document }}">
                @if($pegawai->{$document})
                    <p class="mt-1">File saat ini: <a href="{{ asset('storage/' . $pegawai->{$document}) }}" target="_blank">Lihat Dokumen</a></p>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
