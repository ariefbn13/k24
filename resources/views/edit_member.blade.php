@extends('layout/layoutMain')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Edit Member</h1>
    <form action="/update-member/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="no_ktp">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $user->no_ktp }}" required>
        </div>
        <div class="form-group">
            <label for="foto_diri">Foto Diri</label>
            <input type="file" class="form-control-file" id="foto_diri" name="foto_diri">
            <small class="form-text text-muted">Hanya file gambar yang diperbolehkan (maks. 1MB).</small>
            <img src="{{ asset(Storage::url($user->foto_diri)) }}" alt="Foto Diri" style="max-width: 200px;" class="mt-3">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        @if (Auth::guard('admin')->check())
        <a href="/homeAdmin" class="btn btn-secondary">Kembali</a>
        @else
        <a href="/view-member/{id}" class="btn btn-secondary">Kembali</a>
        @endif
    </form>
</div>

@endsection
