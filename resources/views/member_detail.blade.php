@extends('layout/layoutMain')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Detail Member</h1>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $user->no_hp }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $user->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $user->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>No KTP</th>
                <td>{{ $user->no_ktp }}</td>
            </tr>
            <tr>
                <th>Foto Diri</th>
                <td><img src="{{ url(Storage::url($user->foto_diri)) }}" alt="Foto Diri" style="max-width: 200px;"></td>
            </tr>
        </tbody>
    </table>
    <div class="mt-3">
        <a href="/edit-member/{{ $user->id }}" class="btn btn-warning">Edit</a>
        @if (Auth::guard('admin')->check())
        <a href="/homeAdmin" class="btn btn-secondary">Kembali</a>
        @else
        <a href="/view-member/{id}" class="btn btn-secondary">Kembali</a>
        @endif
    </div>
</div>

@endsection
