<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staf & Guru - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

@include('landing.navbar')

<section style="padding:50px 0 60px;background:#f5f8fb;">
    <div class="container">

        <!-- Breadcrumb -->
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;" data-aos="fade-down">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;"> » Staf & Guru</span>
        </div>

        <!-- Judul -->
        <div style="margin-bottom:35px;" data-aos="fade-up">
            <div style="font-size:14px;letter-spacing:2px;color:#e99b00;margin-bottom:8px;">TENAGA PENDIDIK</div>
            <h2 style="font-size:32px;font-weight:700;color:#005baa;margin:0;">Staf & Guru</h2>
            <div style="width:200px;height:4px;background:#e9a000;margin:14px 0;"></div>
        </div>

        <!-- Data Guru -->
        <div class="row g-4">

            @forelse($gurus as $guru)

                <div class="col-lg-3 col-md-6" data-aos="fade-up">

                <a href="{{ route('staf.guru.detail', $guru->id_guru) }}" style="text-decoration:none;color:inherit;display:block;height:100%;">

                    <div style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;transition:.3s;">

                        @if($guru->foto)

                            <img src="{{ asset('storage/'.$guru->foto) }}" style="width:100%;height:300px;object-fit:cover;" alt="{{ $guru->nama_guru }}">

                        @else

                            <div style="height:300px;background:#eee;display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-user" style="font-size:70px;color:#aaa;"></i>
                            </div>

                        @endif

                        <div style="padding:18px;text-align:center;">
                            <h5 style="font-weight:600;color:#333;">{{ $guru->nama_guru }}</h5>
                            <p style="color:#666;margin:0;">{{ $guru->jabatan }}</p>
                            <small style="color:#888;">{{ $guru->mapel }}</small>
                        </div>

                    </div>

                </a>

            </div>

            @empty

                <div class="text-center">
                    <p>Belum ada data guru.</p>
                </div>

            @endforelse

        </div>

        

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

</body>
</html>