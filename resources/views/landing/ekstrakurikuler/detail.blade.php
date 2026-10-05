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

        <!-- BREADCRUMB -->
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;" data-aos="fade-down">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">
                Beranda
            </a>

            <span style="color:#777;font-size:14px;"> » </span>

            <a href="{{ route('ekstrakurikuler') }}" style="text-decoration:none;color:#333;font-size:14px;">
                Ekstrakurikuler
            </a>

            <span style="color:#777;font-size:14px;">
                » {{ $ekstrakurikuler->nama_eskul }}
            </span>
        </div>

        <!-- JUDUL -->
        <div class="text-center mb-4" data-aos="fade-up">
            <h1 style="font-size:34px;font-weight:700;color:#333;">
                {{ $ekstrakurikuler->nama_eskul }}
            </h1>

            <div style="width:100px;height:3px;background:#e9a000;margin:15px auto;"></div>
        </div>

        <!-- GAMBAR -->
        @if($ekstrakurikuler->gambar)
            <div class="text-center mb-5" data-aos="zoom-in">
                <img src="{{ asset('storage/'.$ekstrakurikuler->gambar) }}"
                     alt="{{ $ekstrakurikuler->nama_eskul }}"
                     style="width:100%;max-width:900px;height:450px;object-fit:cover;border-radius:15px;">
            </div>
        @endif

        <!-- INFORMASI -->
        <div class="row justify-content-center">
            <div class="col-lg-9" data-aos="fade-up">

                <div style="margin-bottom:25px;">
                    <p style="font-size:15px;color:#666;margin-bottom:10px;">
                        <i class="fa-solid fa-user-tie me-2" style="color:#005baa;"></i>
                        <strong>Pembina:</strong> {{ $ekstrakurikuler->pembina }}
                    </p>

                    <p style="font-size:15px;color:#666;margin-bottom:10px;">
                        <i class="fa-solid fa-calendar-days me-2" style="color:#005baa;"></i>
                        <strong>Jadwal:</strong> {{ $ekstrakurikuler->jadwal_latihan }}
                    </p>
                </div>

                <div style="font-size:16px;line-height:1.9;color:#555;">
                    {!! nl2br(e($ekstrakurikuler->deskripsi)) !!}
                </div>

            </div>
        </div>

    </div>
</section>

<!-- EKSTRAKURIKULER LAINNYA -->
<section style="padding:60px 0;background:#f5f8fb;">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 style="font-size:30px;font-weight:700;color:#333;">
                Ekstrakurikuler Lainnya
            </h2>

            <div style="width:100px;height:3px;background:#e9a000;margin:15px auto;"></div>
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

                        <div style="padding:18px;">
                            <h5 style="font-size:18px;font-weight:600;color:#333;margin-bottom:10px;">
                                {{ $eskul->nama_eskul }}
                            </h5>

                            <p style="font-size:14px;color:#777;margin-bottom:12px;">
                                <i class="fa-solid fa-user-tie me-1"></i>
                                {{ $eskul->pembina }}
                            </p>

                            <a href="{{ route('ekstrakurikuler.detail', $eskul->id_eskul) }}" style="font-size:14px;color:#005baa;text-decoration:none;">
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