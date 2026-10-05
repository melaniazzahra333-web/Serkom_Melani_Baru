@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-school me-2"></i>Profil Sekolah</h2>
            <p class="text-muted mb-0">Kelola informasi lengkap tentang sekolah</p>
        </div>
        @if(!$profil)
            <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i>Tambah Profil
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if($profil)

    {{-- DATA PROFIL SEKOLAH --}}
    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius:20px;">
        <div class="card-body p-0">
            <div class="p-4 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-building-columns me-2"></i>Data Profil Sekolah</h5>
                        <small class="text-muted">Informasi lengkap mengenai sekolah</small>
                    </div>
                    <span class="badge rounded-pill px-3 py-2" style="background:#EAF3FA;color:#244D73;">
                        <i class="fa-solid fa-circle-info me-1"></i>Profil Sekolah
                    </span>
                </div>
            </div>

            <div class="p-4">
                <div class="row g-4 align-items-stretch">

                    {{-- FOTO SEKOLAH --}}
                    <div class="col-lg-4">
                        <div class="h-100 text-center p-3" style="background:#F7FAFC;border-radius:18px;border:1px solid #edf1f5;">

                            <div style="position:relative;display:inline-block;margin-bottom:18px;">
                                @if($profil->foto)
                                    <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Sekolah" style="width:100%;height:100%;object-fit:cover;border-radius:15px;box-shadow:0 8px 20px rgba(36,77,115,.12);">
                                @else
                                    <div style="width:330px;max-width:100%;height:220px;background:#EAF3FA;border-radius:15px;display:flex;align-items:center;justify-content:center;">
                                        <i class="fa-solid fa-school" style="font-size:55px;color:#6c8ba8;"></i>
                                    </div>
                                @endif

                                @if($profil->logo)
                                    <div style="position:absolute;left:15px;bottom:-18px;width:72px;height:72px;background:#fff;border-radius:50%;padding:6px;box-shadow:0 5px 15px rgba(0,0,0,.15);">
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" style="width:100%;height:100%;object-fit:contain;border-radius:50%;">
                                    </div>
                                @endif
                            </div>

                           <div style="padding-top:5px;">
                                <h4 class="fw-bold mb-1" style="color:#244D73;">{{ $profil->nama_sekolah }}</h4>
                            </div>
                        </div>
                    </div>

                    {{-- INFORMASI SEKOLAH --}}
                    <div class="col-lg-8">
                        <div class="h-100">

                            <div class="mb-3">
                                <small class="text-uppercase fw-bold" style="color:#7A8A9A;letter-spacing:1px;">
                                    Informasi Utama
                                </small>
                            </div>

                            <div class="row g-3">

                                <div class="col-12">
                                    <div style="background:#F8FAFC;border:1px solid #edf1f5;border-radius:14px;padding:15px 17px;">
                                        <div class="d-flex align-items-center">
                                            <div style="width:42px;height:42px;min-width:42px;background:#EAF3FA;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa-solid fa-school" style="color:#244D73;font-size:17px;"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">Nama Sekolah</small>
                                                <strong style="color:#244D73;">{{ $profil->nama_sekolah }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div style="background:#F8FAFC;border:1px solid #edf1f5;border-radius:14px;padding:15px 17px;height:100%;">
                                        <div class="d-flex align-items-center">
                                            <div style="width:42px;height:42px;min-width:42px;background:#EAF3FA;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa-solid fa-user-tie" style="color:#244D73;font-size:17px;"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">Kepala Sekolah</small>
                                                <strong style="color:#244D73;">{{ $profil->kepala_sekolah }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div style="background:#F8FAFC;border:1px solid #edf1f5;border-radius:14px;padding:15px;height:100%;">
                                        <small class="text-muted d-block mb-1"><i class="fa-solid fa-id-card me-1" style="color:#244D73;"></i>NPSN</small>
                                        <strong style="color:#244D73;">{{ $profil->npsn }}</strong>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div style="background:#F8FAFC;border:1px solid #edf1f5;border-radius:14px;padding:15px;height:100%;">
                                        <small class="text-muted d-block mb-1"><i class="fa-solid fa-calendar-days me-1" style="color:#244D73;"></i>Berdiri</small>
                                        <strong style="color:#244D73;">{{ $profil->tahun_berdiri }}</strong>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div style="background:#F8FAFC;border:1px solid #edf1f5;border-radius:14px;padding:15px 17px;height:100%;">
                                        <div class="d-flex">
                                            <div style="width:42px;height:42px;min-width:42px;background:#EAF3FA;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa-solid fa-phone" style="color:#244D73;font-size:17px;"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">Kontak</small>
                                                <strong style="color:#244D73;">{{ $profil->kontak }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div style="background:#F8FAFC;border:1px solid #edf1f5;border-radius:14px;padding:15px 17px;">
                                        <div class="d-flex">
                                            <div style="width:42px;height:42px;min-width:42px;background:#EAF3FA;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa-solid fa-location-dot" style="color:#244D73;font-size:17px;"></i>
                                            </div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">Alamat</small>
                                                <span style="color:#334155;line-height:1.6;">{{ $profil->alamat }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- VISI & MISI + DESKRIPSI --}}
    <div class="row g-4 mt-0">

        {{-- VISI MISI --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius:20px;">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div style="width:46px;height:46px;background:#EAF3FA;border-radius:13px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-eye" style="color:#244D73;font-size:19px;"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold mb-0" style="color:#244D73;">Visi & Misi</h5>
                            <small class="text-muted">Visi dan misi sekolah</small>
                        </div>
                    </div>

                    <div style="background:#F8FAFC;border-radius:14px;padding:18px;border-left:4px solid #244D73;">
                        <p class="text-muted mb-0" style="line-height:1.8;white-space:pre-line;">{{ $profil->visi_misi }}</p>
                    </div>

                </div>
            </div>
        </div>

        {{-- DESKRIPSI --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius:20px;">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div style="width:46px;height:46px;background:#EAF3FA;border-radius:13px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-book-open" style="color:#244D73;font-size:19px;"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold mb-0" style="color:#244D73;">Deskripsi</h5>
                            <small class="text-muted">Tentang SMK YPC Tasikmalaya</small>
                        </div>
                    </div>

                    <div style="background:#F8FAFC;border-radius:14px;padding:18px;border-left:4px solid #244D73;">
                        <p class="text-muted mb-0" style="line-height:1.8;white-space:pre-line;">{{ $profil->deskripsi }}</p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- TOMBOL EDIT --}}
    <div class="text-end mt-4 mb-4">
        <a href="{{ route('admin.profil.edit', $profil->id_profil) }}" class="btn btn-warning px-4">
            <i class="fa-solid fa-pen me-1"></i>Edit Profil
        </a>
    </div>

    @else

    <div class="card border-0 shadow-sm" style="border-radius:20px;">
        <div class="card-body text-center py-5">
            <i class="fa-solid fa-school fs-1 mb-3" style="color:#244D73;"></i>
            <h5 class="fw-bold" style="color:#244D73;">Belum Ada Profil Sekolah</h5>
            <p class="text-muted">Silakan tambahkan data profil sekolah terlebih dahulu.</p>
            <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i>Tambah Profil
            </a>
        </div>
    </div>

    @endif
</div>
@endsection