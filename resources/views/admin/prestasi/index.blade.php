@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-trophy me-2"></i>Data Prestasi</h2>
            <p class="text-muted mb-0">Kelola data prestasi sekolah</p>
        </div>

        @if(session('user_role') === 'Admin')
            <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i>Tambah Prestasi
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">

            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <div>
                    <h5 class="fw-bold mb-1" style="color:#244D73;">Daftar Prestasi</h5>
                    <small class="text-muted">Data prestasi yang terdaftar</small>
                </div>

                <div class="d-flex gap-2">
                    <form action="{{ route('admin.prestasi') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Cari prestasi..." value="{{ $search ?? '' }}">
                        <button class="btn btn-primary ms-2">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </form>

                    @if(!empty($search))
                        <a href="{{ route('admin.prestasi') }}" class="btn btn-secondary">Reset</a>
                    @endif

                    <span class="badge rounded-pill align-content-center" style="background:#C8DFDB;color:#3368A0;">
                        {{ $prestasis->count() }} Prestasi
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Tahun Ajaran</th>

                            @if(session('user_role') === 'Admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($prestasis as $prestasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if($prestasi->foto)
                                        <img src="{{ asset('storage/'.$prestasi->foto) }}" width="80" height="60" style="object-fit:cover;border-radius:8px;">
                                    @else
                                        <i class="fa-solid fa-image fs-3 text-secondary"></i>
                                    @endif
                                </td>

                                <td>{{ $prestasi->deskripsi }}</td>

                                <td>
                                    <span class="badge" style="background:#EEF5F4;color:#3368A0;">
                                        {{ $prestasi->tahun_ajaran }}
                                    </span>
                                </td>

                                @if(session('user_role') === 'Admin')
                                    <td>
                                        <a href="{{ route('admin.prestasi.edit', $prestasi->id_prestasi) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route('admin.prestasi.destroy', $prestasi->id_prestasi) }}" method="POST" class="d-inline form-hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>

                        @empty
                            <tr>
                                <td colspan="{{ session('user_role') === 'Admin' ? 5 : 4 }}" class="text-center py-5">
                                    <i class="fa-solid fa-trophy fs-1 text-secondary"></i>
                                    <p class="text-muted mb-0">Belum ada data prestasi.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection