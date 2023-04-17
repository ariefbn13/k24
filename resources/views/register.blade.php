@extends('layout/layoutMain')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col">

    <h1 class="text-center mb-4">Registrasi Member</h1>
    <form action="/registerMember" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputNama" class="form-label">Nama Member</label>
            <input type="text" class="form-control" name="name" id="inputNama" placeholder="Nama Lengkap" required>
        </div>

        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Kata Sandi" required>
        </div>

        <div class="mb-3">
            <label for="inputNoHP" class="form-label">No. HP</label>
            <input type="tel" class="form-control" name="no_hp" id="inputNoHP" placeholder="Nomor Handphone" required>
        </div>

        <div class="mb-3">
            <label for="inputTanggalLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="inputTanggalLahir" required>
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Alamat Email" required>
        </div>

        <div class="mb-3">
            <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" id="inputJenisKelamin" required>
                <option selected disabled value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="inputNoKTP" class="form-label">No. KTP</label>
            <input type="text" class="form-control" name="no_ktp" id="inputNoKTP" placeholder="Nomor KTP" required>
        </div>

        <div class="mb-3">
            <label for="inputFoto" class="form-label">Foto Diri</label>
            <input type="file" class="form-control" name="foto_diri" id="inputFoto" accept="image/*" required>
            <div class="form-text">Maksimal ukuran file: 1 MB</div>
        </div>
        <div id="imagePreview"></div>

        <button type="submit" class="btn btn-primary mt-3">Daftar</button>
    
    </form>
    </div>

    <div class="col"></div>
</div>


<script>
     document.getElementById('inputFoto').addEventListener('change', function () {
        const file = this.files[0];
        if (file.size > 1024 * 1024) {
            alert('Maksimal ukuran file: 1 MB');
            this.value = null;
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.width = 200;
            document.getElementById('imagePreview').innerHTML = '';
            document.getElementById('imagePreview').appendChild(img);
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection