@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Persetujuan User') }}
    </h2>
@endsection

@section('content')
    <div class="container mt-5">
        <h3>Daftar User yang Menunggu Persetujuan</h3>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendingUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nip }}</td>
                        <td>
                            <form action="{{ route('admin.approve', $user) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Setujui</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada user yang menunggu persetujuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
