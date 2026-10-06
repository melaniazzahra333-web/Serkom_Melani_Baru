<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $galeris->first()->judul ?? 'Detail Galeri' }} - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>

@include('landing.navbar')

<section style="padding:50px 0 60px;background:#f5f8fb;min-height:80vh;">
    <div class="container">

        <!-- BREADCRUMB -->
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">
                Beranda
            </a>

            <span style="color:#777;font-size:14px;">
                » <a href="{{ route('galeri') }}" style="text-decoration:none;color:#333;">Foto & Video</a>
            </span>

            <span style="color:#777;font-size:14px;">
                » {{ $galeris->first()->judul ?? 'Detail Galeri' }}
            </span>
        </div>

        <!-- JUDUL DAN DESKRIPSI -->
        <div style="margin-bottom:35px;">

            <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">
                DOKUMENTASI KEGIATAN
            </div>

            <h2 style="font-size:32px;font-weight:700;color:#005baa;margin-top:5px;">
                {{ $galeris->first()->judul ?? 'Detail Galeri' }}
            </h2>

            <p style="font-size:15px;color:#666;line-height:1.7;margin-top:12px;max-width:850px;">
                {{ $galeris->first()->keterangan ?? 'Dokumentasi kegiatan SMK YPC Tasikmalaya.' }}
            </p>

            <div style="width:200px;height:4px;background:#e9a000;margin:14px 0 0;"></div>

        </div>

        <!-- FOTO / VIDEO -->
        <div class="row g-4">

            @forelse($galeris as $galeri)

                <div class="col-lg-4 col-md-6">

                    <div style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);">

                        @if($galeri->kategori == 'Foto')

                            <img src="{{ asset('storage/'.$galeri->file) }}"
                                 alt="{{ $galeri->judul }}"
                                 style="width:100%;height:280px;object-fit:cover;">

                        @else

                            <div style="height:280px;background:#fff;display:flex;align-items:center;justify-content:center;flex-direction:column;padding:25px;text-align:center;">

                                <i class="fa-brands fa-youtube" style="font-size:70px;color:#e00000;margin-bottom:20px;"></i>

                                <h5 style="color:#333;margin-bottom:15px;">
                                    Video Kegiatan
                                </h5>

                                <a href="{{ $galeri->file }}"
                                   target="_blank"
                                   class="btn btn-danger">
                                    <i class="fa-brands fa-youtube me-1"></i>
                                    Tonton di YouTube
                                </a>

                            </div>

                        @endif

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p style="color:#777;">
                        Dokumentasi belum tersedia.
                    </p>
                </div>

            @endforelse

        </div>

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>