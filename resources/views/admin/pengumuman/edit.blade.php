@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-pen-to-square me-2"></i>Edit Pengumuman
            </h2>
            <p class="text-muted mb-0">Ubah informasi pengumuman</p>
        </div>
    </div>

    {{-- FORM EDIT --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;">
                    Form Edit Pengumuman
                </h5>
                <small class="text-muted">
                    Silakan perbarui informasi pengumuman di bawah ini.
                </small>
            </div>

            <form action="{{ route('admin.pengumuman.update', ['id' => $pengumuman->id_pengumuman]) }}" method="POST">

                @csrf
                @method('PUT')

                {{-- JUDUL --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-heading me-1" style="color:#244D73;"></i>Judul Pengumuman
                    </label>

                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $pengumuman->judul) }}" maxlength="50" required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TANGGAL + STATUS --}}
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-calendar-days me-1" style="color:#244D73;"></i>Tanggal
                        </label>

                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $pengumuman->tanggal->format('Y-m-d')) }}" required>

                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-circle-info me-1" style="color:#244D73;"></i>Status
                        </label>

                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>

                            <option value="Publish" {{ old('status', $pengumuman->status) == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft" {{ old('status', $pengumuman->status) == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- ISI --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>Isi Pengumuman
                    </label>

                    <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="7" required>{{ old('isi', $pengumuman->isi) }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                    <a href="{{ route('admin.pengumuman') }}" class="btn btn-secondary">
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

@endsection