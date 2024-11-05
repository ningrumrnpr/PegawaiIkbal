@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Profil Saya</h3>

    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <p class="form-control-plaintext">{{ $pegawai->nama }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">NIP</label>
        <p class="form-control-plaintext">{{ $pegawai->nip }}</p>
    </div>

    <!-- SK CPNS -->
    <div class="mb-3">
        <label class="form-label">SK CPNS</label>
        <p class="form-control-plaintext">
            @if($pegawai->sk_cpns)
                <a href="{{ asset('storage/' . $pegawai->sk_cpns) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- SK PNS -->
    <div class="mb-3">
        <label class="form-label">SK PNS</label>
        <p class="form-control-plaintext">
            @if($pegawai->sk_pns)
                <a href="{{ asset('storage/' . $pegawai->sk_pns) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- KK -->
    <div class="mb-3">
        <label class="form-label">KK</label>
        <p class="form-control-plaintext">
            @if($pegawai->kk)
                <a href="{{ asset('storage/' . $pegawai->kk) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- Akte -->
    <div class="mb-3">
        <label class="form-label">Akte</label>
        <p class="form-control-plaintext">
            @if($pegawai->akte)
                <a href="{{ asset('storage/' . $pegawai->akte) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- KTP -->
    <div class="mb-3">
        <label class="form-label">KTP</label>
        <p class="form-control-plaintext">
            @if($pegawai->ktp)
                <a href="{{ asset('storage/' . $pegawai->ktp) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- Ijazah SD -->
    <div class="mb-3">
        <label class="form-label">Ijazah SD</label>
        <p class="form-control-plaintext">
            @if($pegawai->ijazah_sd)
                <a href="{{ asset('storage/' . $pegawai->ijazah_sd) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- Ijazah SMP -->
    <div class="mb-3">
        <label class="form-label">Ijazah SMP</label>
        <p class="form-control-plaintext">
            @if($pegawai->ijazah_smp)
                <a href="{{ asset('storage/' . $pegawai->ijazah_smp) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- Ijazah SMA -->
    <div class="mb-3">
        <label class="form-label">Ijazah SMA</label>
        <p class="form-control-plaintext">
            @if($pegawai->ijazah_sma)
                <a href="{{ asset('storage/' . $pegawai->ijazah_sma) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- Ijazah Kuliah -->
    <div class="mb-3">
        <label class="form-label">Ijazah Kuliah</label>
        <p class="form-control-plaintext">
            @if($pegawai->ijazah_kuliah)
                <a href="{{ asset('storage/' . $pegawai->ijazah_kuliah) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak Ada Dokumen
            @endif
        </p>
    </div>

    <!-- Tombol Edit Profil -->
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
</div>
@endsection
