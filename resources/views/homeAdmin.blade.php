@extends('layout/layoutMain')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Daftar Member</h1>
    <div class="mb-3">
        <a href="/reg" class="btn btn-primary">Tambah Member</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No KTP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->no_hp }}</td>
                <td>{{ $user->tanggal_lahir }}</td>
                <td>{{ $user->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $user->no_ktp }}</td>
                <td>
                    <a href="/view-member/{{ $user->id }}" class="btn btn-info">Lihat</a>
                    <a href="/edit-member/{{ $user->id }}" class="btn btn-warning">Edit</a>
                    <a href="/delete-member/{{ $user->id }}" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection