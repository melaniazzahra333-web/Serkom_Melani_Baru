@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-user-pen me-2"></i>Edit Siswa</h2>
            <p class="text-muted mb-0">Perbarui data siswa yang sudah terdaftar</p>
        </div>
       
    </div>

    {{-- FORM EDIT --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;">Form Edit Data Siswa</h5>
                <small class="text-muted">Silakan perbarui informasi siswa di bawah ini.</small>
            </div>

            <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-id-card me-1" style="color:#244D73;"></i>NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user me-1" style="color:#244D73;"></i>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-venus-mars me-1" style="color:#244D73;"></i>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-Laki" {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-calendar me-1" style="color:#244D73;"></i>Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" class="form-control" value="{{ $siswa->tahun_masuk }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admin.siswa') }}" class="btn btn-secondary"><i class="fa-solid fa-xmark me-1"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection