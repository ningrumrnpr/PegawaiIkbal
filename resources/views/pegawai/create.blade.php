@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Tambah Data Pegawai</h3>

    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <!-- NIP -->
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Dokumen Pendukung -->
        @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $document)
            <div class="mb-3">
                <label for="{{ $document }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $document)) }}</label>
                <input type="file" class="form-control" id="{{ $document }}" name="{{ $document }}">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>
@endsection
