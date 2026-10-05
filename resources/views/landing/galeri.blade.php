<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>
<body>

@include('landing.navbar')

<section style="padding:50px 0 60px;background:#f3f8fc;">
    <div class="container">

        <!-- Breadcrumb -->
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;"> » Foto & Video</span>
        </div>

        <!-- Judul -->
        <div style="margin-bottom:35px;">
            <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">
                DOKUMENTASI KEGIATAN
            </div>

            <h2 style="font-size:32px;font-weight:700;color:#005baa;margin-top:5px;">
                Galeri Sekolah
            </h2>

            <div style="width:200px;height:4px;background:#e9a000;margin:14px 0 0;"></div>
        </div>

        <div class="row g-4">

            @forelse($galeris->groupBy('judul') as $judul => $items)

                @php
                    $foto = $items->where('kategori', 'Foto');
                    $video = $items->where('kategori', 'Video');
                    $cover = $foto->first() ?? $items->first();
                @endphp

                <div class="col-md-6 col-lg-4">

                    <a href="{{ route('galeri.detail', ['kategori' => $cover->kategori, 'judul' => $judul]) }}" style="text-decoration:none;color:inherit;">

                        <div class="card h-100" style="border:1px solid #e5e7eb;border-radius:16px;overflow:hidden;transition:.3s;">

                            @if($cover->kategori == 'Foto')

                                <img src="{{ asset('storage/'.$cover->file) }}"
                                     alt="{{ $judul }}"
                                     style="width:100%;height:230px;object-fit:cover;">

                            @else

                                <div style="height:230px;background:#dfeaf3;display:flex;align-items:center;justify-content:center;">
                                    <i class="fa-brands fa-youtube" style="font-size:70px;color:#e00000;"></i>
                                </div>

                            @endif

                            <div style="padding:18px;">

                                <h5 style="font-size:19px;font-weight:600;color:#005baa;margin-bottom:12px;">
                                    {{ $judul }}
                                </h5>

                                <div style="display:flex;gap:18px;color:#777;font-size:14px;">

                                    @if($foto->count() > 0)
                                        <span>
                                            <i class="fa-solid fa-image me-1" style="color:#0866b3;"></i>
                                            {{ $foto->count() }}
                                        </span>
                                    @endif

                                    @if($video->count() > 0)
                                        <span>
                                            <i class="fa-solid fa-video me-1" style="color:#e00000;"></i>
                                            {{ $video->count() }}
                                        </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p style="color:#777;">Belum ada galeri.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>