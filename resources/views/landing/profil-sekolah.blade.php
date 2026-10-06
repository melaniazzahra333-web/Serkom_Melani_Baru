<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - {{ $profil->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}</title>
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
            <span style="color:#777;"> » Profil Sekolah</span>
        </div>

        <div style="margin-bottom:40px;" data-aos="fade-down">
            <span style="color:#e99b00;font-size:14px;letter-spacing:2px;">TENTANG SEKOLAH</span>
            <h2 style="color:#005baa;font-size:32px;font-weight:700;margin-top:5px;">Profil Sekolah</h2>
            <div style="width:180px;height:4px;background:#e9a000;margin:12px 0;"></div>
            <p style="color:#666;">Mengenal lebih dekat {{ $profil->nama_sekolah ?? 'sekolah kami' }}</p>
        </div>

        <div class="row g-5 align-items-center" data-aos="fade-up">

            <div class="col-lg-5">
                @if($profil && $profil->foto)
                    <img src="/storage/{{ $profil->foto }}"
                         alt="{{ $profil->nama_sekolah }}"
                         style="width:100%;height:350px;object-fit:cover;border-radius:15px;">
                @endif
            </div>

            <div class="col-lg-7">

                <h3 style="color:#005baa;font-weight:700;margin-bottom:25px;">
                    {{ $profil->nama_sekolah ?? '-' }}
                </h3>

                <p>
                    <b>Kepala Sekolah</b><br>
                    {{ $profil->kepala_sekolah ?? '-' }}
                </p>

                <p>
                    <b>NPSN</b><br>
                    {{ $profil->npsn ?? '-' }}
                </p>

                <p>
                    <b>Kontak</b><br>
                    {{ $profil->kontak ?? '-' }}
                </p>

                <p>
                    <b>Tahun Berdiri</b><br>
                    {{ $profil->tahun_berdiri ?? '-' }}
                </p>

                <p>
                    <b>Alamat</b><br>
                    {{ $profil->alamat ?? '-' }}
                </p>

            </div>

        </div>

        <div style="margin-top:60px;" data-aos="fade-up">

            <span style="color:#e99b00;font-size:14px;letter-spacing:2px;">
                TENTANG SEKOLAH
            </span>

            <h2 style="color:#005baa;font-size:30px;font-weight:700;margin-top:5px;">
                Visi dan Misi
            </h2>

            <div style="width:150px;height:4px;background:#e9a000;margin:12px 0 25px;"></div>

            <p style="color:#555;font-size:16px;line-height:1.9;white-space:pre-line;">
                {{ $profil->visi_misi ?? '-' }}
            </p>

        </div>

        <div style="margin-top:50px;" data-aos="fade-up">

            <span style="color:#e99b00;font-size:14px;letter-spacing:2px;">
                TENTANG SEKOLAH
            </span>

            <h2 style="color:#005baa;font-size:30px;font-weight:700;margin-top:5px;">
                Deskripsi Sekolah
            </h2>

            <div style="width:180px;height:4px;background:#e9a000;margin:12px 0 25px;"></div>

            <p style="color:#555;font-size:16px;line-height:1.9;">
                {{ $profil->deskripsi ?? '-' }}
            </p>

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