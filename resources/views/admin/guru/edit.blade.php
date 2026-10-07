@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-chalkboard-user me-2"></i>Edit Data Guru</h2>
        <p class="text-muted mb-0">Ubah data guru dan tenaga pendidik</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;">Form Edit Data Guru</h5>
                <small class="text-muted">Silakan perbarui informasi guru di bawah ini.</small>
            </div>

            <form action="{{ route('admin.guru.update',$guru->id_guru) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user me-1" style="color:#244D73;"></i>Nama Guru</label>
                        <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru',$guru->nama_guru) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-id-card me-1" style="color:#244D73;"></i>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ old('nip',$guru->nip) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-briefcase me-1" style="color:#244D73;"></i>Jabatan</label>
                        <select name="jabatan" class="form-select">
                            <option value="">Pilih Jabatan</option>
                            <option value="Kepala Sekolah" {{ old('jabatan',$guru->jabatan)=='Kepala Sekolah'?'selected':'' }}>Kepala Sekolah</option>
                            <option value="Wakasek" {{ old('jabatan',$guru->jabatan)=='Wakasek'?'selected':'' }}>Wakasek</option>
                            <option value="Guru" {{ old('jabatan',$guru->jabatan)=='Guru'?'selected':'' }}>Guru</option>
                            <option value="Staf Perpustakaan" {{ old('jabatan',$guru->jabatan)=='Staf Perpustakaan'?'selected':'' }}>Staf Perpustakaan</option>
                            <option value="Staf Administrasi" {{ old('jabatan',$guru->jabatan)=='Staf Administrasi'?'selected':'' }}>Staf Administrasi</option>
                            <option value="Bimbingan Konseling (BK)" {{ old('jabatan',$guru->jabatan)=='Bimbingan Konseling (BK)'?'selected':'' }}>Bimbingan Konseling (BK)</option>
                            <option value="Pembina Ekstrakurikuler" {{ old('jabatan',$guru->jabatan)=='Pembina Ekstrakurikuler'?'selected':'' }}>Pembina Ekstrakurikuler</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-book me-1" style="color:#244D73;"></i>Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control" value="{{ old('mapel',$guru->mapel) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Foto Guru</label>

                        @if($guru->foto)
                        <div class="mb-3">
                            <p class="text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ asset('storage/'.$guru->foto) }}" width="120" height="120" style="object-fit:cover;border-radius:8px;" alt="Foto Guru">
                        </div>
                        @endif

                        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                        <small class="text-muted">Pilih foto baru jika ingin mengganti foto guru.</small>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admin.guru') }}" class="btn btn-secondary"><i class="fa-solid fa-xmark me-1"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save me-1"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection