<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body>

@include('landing.navbar')

<section style="padding:50px 0 60px;background:#f5f8fb;">
    <div class="container">

        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;"> » Berita Sekolah</span>
        </div>

        <div style="margin-bottom:35px;">
            <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">INFORMASI SEKOLAH</div>
            <h2 style="font-size:32px;font-weight:700;color:#005baa;margin-top:5px;">
                Berita Sekolah
            </h2>
            <div style="width:200px;height:4px;background:#e9a000;margin:14px 0 0;"></div>
        </div>

        <div class="row g-4">

            @forelse($beritas as $item)

                <div class="col-md-6">

                    <a href="{{ route('berita.detail', $item->id_berita) }}" style="text-decoration:none;color:inherit;">

                        <div class="card h-100 hover-card" style="border:1px solid #e5e7eb;border-radius:16px;overflow:hidden;">

                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" style="width:100%;height:250px;object-fit:cover;">
                            @endif

                            <div class="card-body">

                                <h4 style="font-size:20px;font-weight:600;color:#005baa;">
                                    <i class="fa-solid fa-newspaper me-2"></i>{{ $item->judul }}
                                </h4>

                                <small style="color:#888;">
                                    <i class="fa-regular fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                </small>

                                <p style="font-size:15px;color:#555;line-height:1.7;margin-top:15px;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi),150) }}
                                </p>

                                <span style="color:#0866b3;font-size:14px;font-weight:600;">
                                    Baca Selengkapnya »
                                </span>

                            </div>

                        </div>

                    </a>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p style="color:#777;">Belum ada berita.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>