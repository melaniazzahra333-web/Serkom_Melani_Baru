@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Galeri</h2>
            <p class="text-muted mb-0">Perbarui data foto atau video</p>
        </div>

        <!-- <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i>Kembali
        </a> -->
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;">Form Edit Galeri</h5>
                <small class="text-muted">Silakan perbarui informasi foto atau video di bawah ini.</small>
            </div>

            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-heading me-1" style="color:#244D73;"></i>Judul
                    </label>

                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" maxlength="50" required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>Keterangan
                    </label>

                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5" required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-layer-group me-1" style="color:#244D73;"></i>Kategori
                    </label>

                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Foto" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>Foto</option>
                        <option value="Video" {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>Video</option>
                    </select>

                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- FOTO --}}
                <div class="mb-4" id="fotoInput">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Ganti Foto
                    </label>

                    @if($galeri->kategori == 'Foto' && $galeri->file)
                        <div class="mb-3">
                            <p class="text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $galeri->file) }}" width="180" height="120" class="rounded" style="object-fit:cover;">
                        </div>
                    @endif

                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>

                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- VIDEO --}}
                <div class="mb-4" id="videoInput">
                    <label class="form-label fw-semibold">
                        <i class="fa-brands fa-youtube me-1" style="color:#244D73;"></i>Link Video YouTube
                    </label>

                    @if($galeri->kategori == 'Video' && $galeri->file)
                        <div class="mb-3">
                            <p class="text-muted mb-2">Video saat ini:</p>

                            <a href="{{ $galeri->file }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                <i class="fa-brands fa-youtube me-1"></i>Buka Video Saat Ini
                            </a>
                        </div>
                    @endif

                    <input type="url" name="file" id="videoFile" class="form-control @error('file') is-invalid @enderror" value="{{ $galeri->kategori == 'Video' ? old('file', $galeri->file) : '' }}" placeholder="https://www.youtube.com/watch?v=...">

                    <small class="text-muted">Kosongkan jika tidak ingin mengganti link video.</small>

                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-calendar-days me-1" style="color:#244D73;"></i>Tanggal
                    </label>

                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $galeri->tanggal) }}" required>

                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-xmark me-1"></i>Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i>Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const kategori = document.getElementById('kategori');
    const fotoInput = document.getElementById('fotoInput');
    const videoInput = document.getElementById('videoInput');

    function tampilkanInput() {
        if (kategori.value === 'Foto') {
            fotoInput.style.display = 'block';
            videoInput.style.display = 'none';
        } else if (kategori.value === 'Video') {
            fotoInput.style.display = 'none';
            videoInput.style.display = 'block';
        } else {
            fotoInput.style.display = 'none';
            videoInput.style.display = 'none';
        }
    }

    kategori.addEventListener('change', tampilkanInput);
    tampilkanInput();
</script>

@endsection