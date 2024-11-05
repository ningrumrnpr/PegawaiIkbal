@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Daftar Pegawai</h3>

    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>SK CPNS</th>
                <th>SK PNS</th>
                <th>KK</th>
                <th>Akte</th>
                <th>KTP</th>
                <th>Ijazah SD</th>
                <th>Ijazah SMP</th>
                <th>Ijazah SMA</th>
                <th>Ijazah Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->nip }}</td>

                    <!-- Kolom untuk status dokumen, cek jika ada file -->
                    <td>{!! $pegawai->sk_cpns ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->sk_pns ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->kk ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->akte ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->ktp ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->ijazah_sd ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->ijazah_smp ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->ijazah_sma ? '✓' : '' !!}</td>
                    <td>{!! $pegawai->ijazah_kuliah ? '✓' : '' !!}</td>

                    <td>
                        <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
