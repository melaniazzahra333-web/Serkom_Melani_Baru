<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ekstrakurikuler->nama_eskul }} - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

@include('landing.navbar')

<section style="padding:75px 0 60px;background:#fff;">
    <div class="container">

        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;" data-aos="fade-down">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;"> » </span>
            <a href="{{ route('ekstrakurikuler') }}" style="text-decoration:none;color:#333;font-size:14px;">Ekstrakurikuler</a>
            <span style="color:#777;font-size:14px;"> » {{ $ekstrakurikuler->nama_eskul }}</span>
        </div>

        <div style="margin-bottom:35px;" data-aos="fade-up">
            <h1 style="font-size:34px;font-weight:700;color:#333;margin:0;">
                {{ $ekstrakurikuler->nama_eskul }}
            </h1>
            <div style="width:120px;height:4px;background:#e9a000;margin:14px 0;"></div>
        </div>

        <!-- DOKUMENTASI -->
        <div style="margin-bottom:45px;" data-aos="fade-up">

            <h3 style="font-size:22px;font-weight:600;color:#333;margin-bottom:20px;">
                Dokumentasi Kegiatan
            </h3>

            <div id="carouselDokumentasi" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">
                    @foreach($galeri->chunk(2) as $index => $fotoGroup)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row g-4">
                                @foreach($fotoGroup as $foto)
                                    <div class="col-md-6">
                                        <img src="{{ asset('storage/'.$foto->gambar) }}"
                                             alt="{{ $ekstrakurikuler->nama_eskul }}"
                                             style="width:100%;height:320px;object-fit:cover;border-radius:14px;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($galeri->count() > 2)

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDokumentasi" data-bs-slide="prev" style="width:50px;">
                        <span style="background:#005baa;border-radius:50%;width:40px;height:40px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-chevron-left" style="color:#fff;"></i>
                        </span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDokumentasi" data-bs-slide="next" style="width:50px;">
                        <span style="background:#005baa;border-radius:50%;width:40px;height:40px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-chevron-right" style="color:#fff;"></i>
                        </span>
                    </button>

                @endif

            </div>

        </div>

        <!-- INFORMASI -->
        <div class="row" data-aos="fade-up">

            <div class="col-lg-4 mb-4">

                <div style="background:#f5f8fb;border-radius:14px;padding:25px;">

                    <h4 style="font-size:20px;font-weight:600;color:#333;margin-bottom:20px;">
                        Informasi Ekstrakurikuler
                    </h4>

                    <p style="font-size:15px;color:#666;margin-bottom:14px;">
                        <i class="fa-solid fa-calendar-days me-2" style="color:#005baa;"></i>
                        <strong>Jadwal:</strong><br>
                        {{ $ekstrakurikuler->jadwal_latihan }}
                    </p>

                    <p style="font-size:15px;color:#666;margin-bottom:14px;">
                        <i class="fa-solid fa-user-tie me-2" style="color:#005baa;"></i>
                        <strong>Pembina:</strong><br>
                        {{ $ekstrakurikuler->pembina }}
                    </p>

                    <p style="font-size:15px;color:#666;margin-bottom:0;">
                        <i class="fa-solid fa-circle-check me-2" style="color:#198754;"></i>
                        <strong>Status:</strong> Aktif
                    </p>

                </div>

            </div>

            <div class="col-lg-8">

                <h3 style="font-size:22px;font-weight:600;color:#333;margin-bottom:15px;">
                    Tentang {{ $ekstrakurikuler->nama_eskul }}
                </h3>

                <div style="font-size:16px;line-height:1.9;color:#555;">
                    @foreach($deskripsi as $isi)
                        <p style="margin-bottom:20px;">
                            {!! nl2br(e($isi)) !!}
                        </p>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</section>

<!-- EKSTRAKURIKULER LAINNYA -->
<section style="padding:60px 0;background:#f5f8fb;">
    <div class="container">

        <div style="margin-bottom:35px;" data-aos="fade-up">
            <h2 style="font-size:30px;font-weight:700;color:#333;margin:0;">
                Ekstrakurikuler Lainnya
            </h2>
            <div style="width:120px;height:4px;background:#e9a000;margin:14px 0;"></div>
        </div>

        <div class="row g-4">

            @foreach($ekskuls->take(4) as $eskul)

                <div class="col-lg-3 col-md-6" data-aos="fade-up">

                    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;">

                        @if($eskul->gambar)
                            <img src="{{ asset('storage/'.$eskul->gambar) }}"
                                 alt="{{ $eskul->nama_eskul }}"
                                 style="width:100%;height:180px;object-fit:cover;">
                        @endif

                        <div style="padding:18px;text-align:left;">

                            <h5 style="font-size:18px;font-weight:600;color:#333;margin-bottom:10px;">
                                {{ $eskul->nama_eskul }}
                            </h5>

                            <p style="font-size:14px;color:#777;margin-bottom:12px;">
                                <i class="fa-solid fa-user-tie me-1"></i>
                                {{ $eskul->pembina }}
                            </p>

                            <a href="{{ route('ekstrakurikuler.detail', $eskul->slug) }}" style="font-size:14px;color:#005baa;text-decoration:none;">
                                Selengkapnya »
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init({
    duration:800,
    once:true
});
</script>

</body>
</html>