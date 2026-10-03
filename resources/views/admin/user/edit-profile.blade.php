@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1" style="color:#244D73;">
            <i class="fa-solid fa-user-pen me-2"></i>
            Edit Profil
        </h2>

        <p class="text-muted mb-0">
            Ubah informasi akun pengguna
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="text-center mb-4">
    <div style="position:relative;display:inline-block;">

        @if($user->foto)
            <img id="profilePreview"
                 src="{{ asset('storage/' . $user->foto) }}"
                 style="width:130px;height:130px;object-fit:cover;border-radius:50%;border:5px solid white;box-shadow:0 4px 12px rgba(0,0,0,.15);">
        @else
            <div id="profilePreview"
                 style="width:130px;height:130px;border-radius:50%;background:#eef3f8;border:5px solid white;box-shadow:0 4px 12px rgba(0,0,0,.15);display:flex;align-items:center;justify-content:center;">
                <i class="fa-solid fa-user" style="font-size:50px;color:#6c8ba8;"></i>
            </div>
        @endif

        <label for="fotoProfile"
               style="position:absolute;right:0;bottom:0;width:40px;height:40px;border-radius:50%;background:#244D73;color:white;border:3px solid white;display:flex;align-items:center;justify-content:center;cursor:pointer;">
            <i class="fa-solid fa-pen"></i>
        </label>

        <input type="file" name="foto" id="fotoProfile" accept="image/*" style="display:none;">

    </div>
</div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        value="{{ old('username', $user->username) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Role
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $user->role }}"
                        readonly
                    >
                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.user.profile') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>

<script>
document.getElementById('fotoProfile').addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById('profilePreview');

            if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                preview.outerHTML = `
                    <img id="profilePreview"
                         src="${e.target.result}"
                         width="130"
                         height="130"
                         class="rounded-circle"
                         style="object-fit:cover;border:5px solid #fff;box-shadow:0 4px 12px rgba(0,0,0,.15);">
                `;
            }
        };

        reader.readAsDataURL(file);
    }
});
</script>

@endsection
