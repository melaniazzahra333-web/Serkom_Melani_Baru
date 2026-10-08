@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-trophy me-2"></i>Tambah Prestasi</h2>
            <p class="text-muted mb-0">Tambahkan data prestasi sekolah</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <h5 class="fw-bold mb-1" style="color:#244D73;">Form Data Prestasi</h5>
            <small class="text-muted">Silakan isi data prestasi dengan lengkap.</small>

            <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>Deskripsi Prestasi
                    </label>

                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan deskripsi prestasi..." required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-calendar me-1" style="color:#244D73;"></i>Tahun Ajaran
                    </label>

                    <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2025/2026" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Foto Prestasi
                    </label>

                    <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">Foto boleh dikosongkan.</small>
                </div>

                <div class="border-top pt-3 text-end">
                    <a href="{{ route('admin.prestasi') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-xmark me-1"></i>Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i>Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection