@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="mb-4" style="max-width:550px;margin:0 auto;text-align:left;">
        <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-user me-2"></i>Profil Pengguna</h2>
        <p class="text-muted mb-0">Informasi akun pengguna yang sedang login</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="profile-card mx-auto">
        <div class="profile-wave">
            <svg viewBox="0 0 500 180" preserveAspectRatio="none">
                <path d="M0,0 H500 V110 C420,145 360,150 280,125 C190,95 120,95 0,135 Z"></path>
            </svg>
        </div>

        <div class="profile-photo-wrapper">
            @if($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="profile-photo">
            @else
                <div class="profile-photo profile-photo-default"><i class="fa-solid fa-user"></i></div>
            @endif
        </div>

        <div class="profile-data">
            <div class="profile-row">
                <div class="profile-label"><i class="fa-solid fa-user"></i> Nama</div>
                <div class="profile-value">{{ $user->name }}</div>
            </div>

            <div class="profile-row">
                <div class="profile-label"><i class="fa-solid fa-at"></i> Username</div>
                <div class="profile-value">{{ $user->username }}</div>
            </div>

            <div class="profile-row">
                <div class="profile-label"><i class="fa-solid fa-user-shield"></i> Role</div>
                <div class="profile-value">{{ $user->role }}</div>
            </div>

            <div class="profile-buttons">
                <button type="button" class="btn profile-edit-btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    <i class="fa-solid fa-pen me-1"></i>Edit
                </button>
                <a href="javascript:history.back()" class="btn profile-cancel-btn">Batal</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:18px;">
            <div class="modal-header border-0 px-4 pt-4">
                <div>
                    <h5 class="modal-title fw-bold" id="editProfileModalLabel" style="color:#244D73;">
                        <i class="fa-solid fa-user-pen me-2"></i>Edit Profil
                    </h5>
                    <small class="text-muted">Ubah informasi akun kamu</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 pb-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="text-center mb-4">
                        <div style="position:relative;display:inline-block;">
                            @if($user->foto)
                                <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" style="width:130px;height:130px;object-fit:cover;border-radius:50%;border:5px solid #fff;box-shadow:0 4px 12px rgba(0,0,0,.15);">
                            @else
                                <div style="width:130px;height:130px;border-radius:50%;background:#eef3f8;border:5px solid #fff;box-shadow:0 4px 12px rgba(0,0,0,.15);display:flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-user" style="font-size:50px;color:#6c8ba8;"></i>
                                </div>
                            @endif

                            <label for="fotoProfile" style="position:absolute;right:0;bottom:0;width:40px;height:40px;border-radius:50%;background:#244D73;color:#fff;border:3px solid #fff;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                                <i class="fa-solid fa-pen" style="font-size:14px;"></i>
                            </label>

                            <input type="file" name="foto" id="fotoProfile" accept="image/*" style="display:none;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user me-1" style="color:#244D73;"></i>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-at me-1" style="color:#244D73;"></i>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-lock me-1" style="color:#244D73;"></i>Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user-shield me-1" style="color:#244D73;"></i>Role</label>
                        <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk me-1"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection