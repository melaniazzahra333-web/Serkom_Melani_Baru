<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Prestasi - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body>

@include('landing.navbar')

<section style="padding:50px 0 70px;background:#fff;">
    <div class="container">

        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:40px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;"> » </span>
            <a href="{{ route('prestasi') }}" style="text-decoration:none;color:#333;font-size:14px;">Prestasi</a>
            <span style="color:#777;"> » Detail Prestasi</span>
        </div>

        <div style="text-align:left;margin-bottom:45px;" data-aos="fade-down">
            <span style="color:#e99b00;font-size:14px;letter-spacing:2px;">PRESTASI SEKOLAH</span>
            <h2 style="color:#005baa;font-size:32px;font-weight:700;margin-top:5px;">Detail Prestasi</h2>
            <div style="width:150px;height:4px;background:#e9a000;margin:12px 0;"></div>
        </div>

        <div class="row g-5 align-items-center" data-aos="fade-up">
            <div class="col-lg-6">
                @if($prestasi->foto)
                    <img src="{{ asset('storage/'.$prestasi->foto) }}" alt="Prestasi" style="width:100%;height:400px;object-fit:cover;border-radius:15px;">
                @else
                    <div style="height:400px;background:#f1f3f5;border-radius:15px;display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-trophy" style="font-size:80px;color:#ccc;"></i>
                    </div>
                @endif
            </div>

            <div class="col-lg-6">
                <h3 style="color:#005baa;font-weight:700;margin-bottom:20px;">
                    <i class="fa-solid fa-trophy me-2"></i> Prestasi Siswa
                </h3>

                <p style="font-size:16px;color:#555;line-height:1.9;margin-bottom:20px;">
                    {{ $prestasi->deskripsi }}
                </p>

                <p style="font-size:15px;color:#666;">
                    <i class="fa-regular fa-calendar me-2" style="color:#005baa;"></i>
                    <b>Tahun Ajaran:</b> {{ $prestasi->tahun_ajaran }}
                </p>

            </div>

        </div>

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({duration:800,once:true});
</script>

</body>
</html>