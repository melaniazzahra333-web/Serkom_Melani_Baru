<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMK YPC Tasikmalaya</title>

    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:white; box-shadow:0 4px 15px rgba(0,0,0,0.10);">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="width:50px;height:50px;object-fit:contain;" class="me-3">
                <span class="fw-bold">SMK YPC TASIKMALAYA</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link px-3" href="#"><i class="fa-solid fa-house me-1"></i>Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3" href="#"><i class="fa-solid fa-chalkboard-user me-1"></i>Staf & Guru</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-users me-1"></i>Kesiswaan</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#"></i>Ekstrakurikuler</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"></i>Prestasi</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-newspaper me-1"></i>Publikasi</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#"></i>Pengumuman</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"></i>Berita</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3" href="#"><i class="fa-solid fa-images me-1"></i>Foto & Video</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3" href="#"><i class="fa-solid fa-building me-1"></i>Profil Sekolah</a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>

    <!-- BANNER -->
    <div id="Banner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#Banner" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#Banner" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#Banner" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="assets/images/baner1.png" class="d-block w-100" alt="Baner Sekolah 1">
            </div>

            <div class="carousel-item">
                <img src="assets/images/baner2.png" class="d-block w-100" alt="Baner Sekolah 2">
            </div>

            <div class="carousel-item">
                <img src="assets/images/baner1.png" class="d-block w-100" alt="Baner Sekolah 3">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#Banner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#Banner" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>


    <!-- SAMBUTAN KEPALA SEKOLAH -->
    <div class="container py-5">

        <div class="row align-items-center g-4">

            <div class="col-md-3 text-center" data-aos="fade-right">
                <img src="assets/images/kpl.jpg" alt="Kepala Sekolah" class="img-fluid rounded-3" style="width:100%;max-height:340px;object-fit:cover;">
            </div>

            <div class="col-md-9" data-aos="fade-left">

                <div style="color:#e58b00;letter-spacing:2px;font-size:14px;">
                    KOMITMEN KAMI UNTUK PENDIDIKAN
                </div>

                <h2 class="fw-bold mb-2" style="color:#0759a5;">
                    Sambutan Kepala Sekolah
                </h2>

                <div style="width:290px;height:4px;background:#e58b00;margin-bottom:20px;"></div>

                <p class="mb-3">
                    Puji syukur ke hadirat Tuhan YME atas segala rahmat dan karunia-Nya.
                    Selamat datang di website resmi sekolah kami. Website ini kami hadirkan
                    sebagai sarana informasi dan komunikasi antara sekolah dengan orang tua,
                    peserta didik, serta masyarakat luas.
                </p>

                <p class="mb-4">
                    Melalui media ini, kami berharap seluruh informasi mengenai kegiatan,
                    prestasi, serta program pendidikan dapat tersampaikan secara transparan,
                    cepat, dan akurat.
                </p>

                <hr>

                <h5 class="fw-bold mb-1">Drs. Melani Azahra, M.M</h5>
                <div>Kepala Sekolah</div>

            </div>

        </div>
    </div>


   <!-- PENGUMUMAN / PRESTASI / BERITA -->
<section style="background:#f3f8fc;padding:60px 0;">
    <div class="container">
        <div class="row g-4">

            <!-- PENGUMUMAN -->
            <div class="col-lg-4">
                <div class="card h-100"
                     style="border:1px solid #e5e7eb;border-radius:16px;">

                    <div class="card-body">

                        <h3 style="color:#0866b3;font-size:22px;">
                            <i class="fa-solid fa-bullhorn"></i>
                            Pengumuman
                        </h3>

                        <hr>

                        @foreach($pengumuman as $item)

                            <div style="margin-bottom:20px;">

                                <h5 style="font-size:16px;">
                                    {{ $item->judul }}
                                </h5>

                                <small style="color:#888;">
                                    {{ $item->tanggal }}
                                </small>

                                <p style="font-size:14px;color:#666;margin-top:8px;">
                                    {{ $item->isi }}
                                </p>

                            </div>

                        @endforeach

                        <a href="{{ route('admin.pengumuman') }}"
                           style="color:#0866b3;text-decoration:none;">
                            Lihat Semua Pengumuman →
                        </a>

                    </div>
                </div>
            </div>


            <!-- PRESTASI -->
            <div class="col-lg-4">
                <div class="card h-100"
                     style="border:1px solid #e5e7eb;border-radius:16px;">

                    <div class="card-body">

                        <h3 style="color:#0866b3;font-size:22px;">
                            <i class="fa-solid fa-trophy"></i>
                            Prestasi
                        </h3>

                        <hr>

                        @foreach($prestasis as $item)

                            <div style="margin-bottom:20px;">

                                @if($item->foto)
                                    <img src="{{ asset('storage/'.$item->foto) }}"
                                         style="width:100%;height:300px;object-fit:cover;border-radius:8px;margin-bottom:8px;">
                                @endif

                                <h5 style="font-size:16px;">
                                    {{ $item->deskripsi }}
                                </h5>

                                <small style="color:#888;">
                                    Tahun Ajaran {{ $item->tahun_ajaran }}
                                </small>
                            </div>
                        @endforeach

                        <a href="{{ route('admin.prestasi') }}"
                           style="color:#0866b3;text-decoration:none;">
                            Lihat Semua Prestasi →
                        </a>

                    </div>
                </div>
            </div>


            <!-- BERITA -->
            <div class="col-lg-4">
                <div class="card h-100"
                     style="border:1px solid #e5e7eb;border-radius:16px;">

                    <div class="card-body">

                        <h3 style="color:#0866b3;font-size:22px;">
                            <i class="fa-solid fa-newspaper"></i>
                            Berita
                        </h3>

                        <hr>

                        @if($berita)

                            @if($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}"
                                     style="width:100%;height:250px;object-fit:cover;border-radius:8px;margin-bottom:8px;">
                            @endif

                            <h5 style="font-size:16px;">
                                {{ $berita->judul }}
                            </h5>

                            <small style="color:#888;">
                                {{ $berita->tanggal }}
                            </small>

                            <p style="font-size:14px;color:#666;margin-top:8px;">
                                {{ $berita->isi }}
                            </p>

                        @else

                            <p>Belum ada berita.</p>

                        @endif

                        <a href="#"
                           style="color:#0866b3;text-decoration:none;">
                            Lihat Semua Berita →

                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- KEUNGGULAN -->
    <section style="padding:60px 0;background:#fff;">

        <div class="container">

            <div class="text-center" style="margin-bottom:70px;" data-aos="fade-down">

                <div style="font-size:14px;letter-spacing:2px;color:#e9a000;margin-bottom:5px;">
                    KEUNGGULAN KAMI
                </div>

                <h2 style="font-size:30px;font-weight:700;color:#005baa;margin:0;">
                    Mengapa Kami Menjadi Pilihan Tepat
                </h2>

                <div style="width:290px;height:4px;background:linear-gradient(to right,#fff,#e9a000,#fff);margin:14px auto 20px;"></div>

                <p style="font-size:15px;line-height:1.6;color:#222;max-width:800px;margin:auto;">
                    Kami tidak hanya mendidik, tetapi membentuk masa depan. Dengan kurikulum berbasis industri,
                    kelas praktik modern, dan kolaborasi dengan perusahaan ternama, siswa kami dipersiapkan
                    menjadi lulusan yang siap kerja siap bersaing, dan siap sukses.
                </p>

            </div>


           <div class="row g-4">

            <!-- CARD 1 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>

                    <h4>
                        Tenaga Pengajar Profesional
                    </h4>

                    <p>
                        Guru berpengalaman dan kompeten di bidangnya,
                        siap membimbing siswa dengan pendekatan pembelajaran
                        yang efektif.
                    </p>

                </div>

            </div>


            <!-- CARD 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>

                    <h4>
                        Magang & Penempatan Kerja
                    </h4>

                    <p>
                        Kesempatan magang di dunia industri serta dukungan
                        penyaluran kerja bagi lulusan yang siap terjun
                        ke dunia profesional.
                    </p>

                </div>

            </div>


            <!-- CARD 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">

                <div class="keunggulan-card">

                    <div class="keunggulan-icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>

                    <h4>
                        Pengembangan Soft Skills
                    </h4>

                    <p>
                        Membentuk karakter, komunikasi, dan kemampuan kerja
                        tim untuk menunjang kesuksesan di dunia kerja
                        maupun wirausaha.
                    </p>

                </div>

            </div>

        </div>


        </div>

    </section>


    <!-- GURU & STAF -->
    <section style="padding:60px 0;background:#f3f8fc;">

    <div class="container">

        <div class="text-center mb-5">

            <h2 style="color:#0866b3;font-weight:700;">
                Guru & Staf Berkualitas
            </h2>

            <p style="color:#666;">
                Tenaga pendidik dan staf yang siap mendukung perkembangan siswa.
            </p>

        </div>


        <div class="row g-4">

            @foreach($gurus as $guru)

                <div class="col-lg-4 col-md-6">

                    <div class="card guru-card h-100">

                        @if($guru->foto)

                            <img src="{{ asset('storage/'.$guru->foto) }}"
                                 alt="{{ $guru->nama_guru }}"
                                 style="width:100%;height:250px;object-fit:cover;">

                        @else

                            <div style="height:250px;background:#e8f1f8;display:flex;align-items:center;justify-content:center;">

                                <i class="fa-solid fa-user"
                                   style="font-size:70px;color:#0866b3;"></i>

                            </div>

                        @endif


                        <div class="card-body text-center">

                            <h5 style="font-weight:600;">
                                {{ $guru->nama_guru }}
                            </h5>

                            <p style="color:#0866b3;margin:0;">
                                {{ $guru->jabatan }}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


    <!-- EKSTRAKURIKULER -->
<section style="padding:35px 0 60px;background:#fff;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">PENGEMBANGAN MINAT & BAKAT</div>
                <h2 style="font-size:30px;font-weight:700;color:#005baa;margin:0;">Ekstrakurikuler Sekolah</h2>
                <div style="width:295px;height:4px;background:#e9a000;margin-top:14px;"></div>
            </div>
            <a href="#" style="background:#0863aa;color:white;padding:10px 15px;border-radius:6px;text-decoration:none;font-size:14px;">› Lihat Semua</a>
        </div>

        <p style="font-size:15px;line-height:1.7;color:#555;margin:20px 0 35px;">
            Kami menyediakan beragam kegiatan ekstrakurikuler sebagai wadah pengembangan minat, bakat, dan karakter siswa.
        </p>

        <div class="row g-4">
            @foreach($ekskuls as $eskul)
            <div class="col-md-6">
                <div class="eskul-card">
                    @if($eskul->gambar)
                    <img src="{{ asset('storage/'.$eskul->gambar) }}" alt="{{ $eskul->nama_ekskul }}">
                    @endif
                    <div class="eskul-info">
                        <h4>{{ $eskul->nama_ekskul }}</h4>
                        <p><i class="fa-solid fa-users"></i> {{ $eskul->jumlah_anggota }} Anggota</p>
                        <p><i class="fa-solid fa-user"></i> {{ $eskul->pembina }}</p>
                        <a href="#">Selengkapnya »</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section style="padding:60px 0;background:#f3f8fc;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">DOKUMENTASI KEGIATAN</div>
                <h2 style="font-size:30px;font-weight:700;color:#005baa;margin:0;">Galeri Sekolah</h2>
                <div style="width:295px;height:4px;background:#e9a000;margin-top:14px;"></div>
            </div>
            <a href="#" style="background:#0863aa;color:white;padding:10px 15px;border-radius:6px;text-decoration:none;font-size:14px;">› Lihat Semua</a>
        </div>

        <p style="font-size:15px;line-height:1.7;color:#555;margin:20px 0 35px;">
            Galeri sekolah menampilkan berbagai dokumentasi kegiatan dan momen berharga siswa selama proses pembelajaran dan pengembangan diri.
        </p>

        <div class="row g-4">
            @foreach($galeris as $galeri)
            <div class="col-md-4">
                <div class="galeri-card">
                    <div style="position:relative;">
                        <img src="{{ asset('storage/'.$galeri->file) }}" alt="{{ $galeri->judul }}">
                        <span class="galeri-jumlah">
                            <i class="fa-solid fa-camera"></i>
                        </span>
                    </div>
                    <div style="padding:14px 15px;">
                        <h5>{{ $galeri->judul }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


    <!-- FOOTER -->
    <footer style="background:#07579b;color:white;">

        <div class="container py-5">

            <div class="row">

                <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">

                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Sekolah" class="me-3" style="width:55px;height:55px;object-fit:contain;">
                        <h4 class="fw-bold mb-0">SMK YPC TASIKMALAYA</h4>
                    </div>

                    <div class="d-flex align-items-start" style="gap:15px;">
                        <i class="fa-solid fa-location-dot" style="width:20px;margin-top:5px;"></i>
                        <span>
                            Jl. Garut - Tasikmalaya, Cikunten Singaparna
                            Tasikmalaya, Jawa Barat 46414
                        </span>
                    </div>

                </div>


                <div class="col-md-6" data-aos="fade-left">

                    <div class="d-flex align-items-center mb-3" style="gap:15px;">
                        <i class="fa-solid fa-envelope" style="width:20px;"></i>
                        <span>smkypctasikmalaya@gmail.com</span>
                    </div>

                    <div class="d-flex align-items-center mb-3" style="gap:15px;">
                        <i class="fa-brands fa-whatsapp" style="width:20px;"></i>
                        <span>08112224563</span>
                    </div>

                    <div class="d-flex align-items-center" style="gap:15px;">
                        <i class="fa-solid fa-phone" style="width:20px;"></i>
                        <span>0265-546717</span>
                    </div>

                </div>

            </div>

        </div>


        <div class="text-center py-3" style="border-top:1px solid rgba(255,255,255,0.2);font-size:14px;">
            <strong>
                © 2026 SMK YPC TASIKMALAYA.
            </strong>
            Mencetak Generasi Siap Kerja, Siap Berkarya.
        </div>

    </footer>


    <!-- BOOTSTRAP -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>

</body>
</html>
