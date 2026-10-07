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

@include('landing.navbar')

<!-- BANNER -->
<div id="banner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#banner" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#banner" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/foto1.png') }}" class="d-block w-100" alt="Banner Sekolah 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/foto2.png') }}" class="d-block w-100" alt="Banner Sekolah 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/foto3.png') }}" class="d-block w-100" alt="Banner Sekolah 3">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<!-- SAMBUTAN KEPALA SEKOLAH -->
<div id="sambutan" style="background:#fff;">
    <div class="container py-5">
        <div class="row align-items-center g-4">

            <div class="col-md-3 text-center" data-aos="fade-right">
                <div class="kepala-sekolah-img">
                    @if($kepalaSekolah && $kepalaSekolah->foto)
                        <img src="/storage/{{ $kepalaSekolah->foto }}" alt="{{ $kepalaSekolah->nama_guru }}">
                    @endif
                </div>
            </div>

            <div class="col-md-9" data-aos="fade-left">
                <div style="color:#e58b00;letter-spacing:2px;font-size:14px;">KOMITMEN KAMI UNTUK PENDIDIKAN</div>
                <h2 class="fw-bold mb-2" style="color:#0759a5;">Sambutan Kepala Sekolah</h2>
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
                <strong>{{ $kepalaSekolah->nama_guru ?? '-' }}</strong>
                <div>{{ $kepalaSekolah->jabatan ?? '-' }}</div>
            </div>

        </div>
    </div>
</div>


<!-- PENGUMUMAN / PRESTASI / BERITA -->
<section style="background:#f3f8fc;padding:60px 0;">
    <div class="container">
        <div class="row g-4">

            <!-- PENGUMUMAN -->
            <div class="col-lg-4" id="pengumuman" data-aos="fade-up">
                <div class="card h-100 info-card">
                    <div class="card-body">

                        <h3 style="color:#0866b3;font-size:22px;">
                            <i class="fa-solid fa-bullhorn"></i> Pengumuman
                        </h3>

                        <hr>    

                        @foreach($pengumuman as $item)
                            <div style="margin-bottom:20px;">
                                <h5 style="font-size:16px;">{{ $item->judul }}</h5>
                                <small style="color:#888;">{{ $item->tanggal }}</small>
                                <p style="font-size:14px;color:#666;margin-top:8px;">{{ $item->isi }}</p>
                            </div>
                        @endforeach

                        <a href="{{ route('pengumuman') }}" style="color:#0866b3;text-decoration:none;">
                            Lihat Semua Pengumuman →
                        </a>

                    </div>
                </div>
            </div>


            <!-- PRESTASI -->
            <div class="col-lg-4" id="prestasi" data-aos="fade-up" data-aos-delay="150">
                <div class="card h-100 info-card">
                    <div class="card-body">
                        <h3 style="color:#0866b3;font-size:22px;">
                            <i class="fa-solid fa-trophy"></i> Prestasi
                        </h3>

                        <hr>

                        @if($prestasis)

                            @if($prestasis->foto)
                                <div class="info-img">
                                    <img src="{{ asset('storage/'.$prestasis->foto) }}" alt="Foto Prestasi">
                                </div>
                            @endif

                            <h5 style="font-size:16px; ">{{ $prestasis->deskripsi }}</h5>
                            <small style="color:#888;">Tahun Ajaran {{ $prestasis->tahun_ajaran }}</small>
                            <br>

                        @else

                            <p style="color:#888;">Belum ada prestasi.</p>

                        @endif

                        <a href="{{ route('prestasi') }}" style="color:#0866b3;text-decoration:none;">
                            Lihat Semua Prestasi →
                        </a>

                    </div>
                </div>
            </div>


            <!-- BERITA -->
            <div class="col-lg-4" id="berita" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 info-card">
                    <div class="card-body">

                        <h3 style="color:#0866b3;font-size:22px;">
                            <i class="fa-solid fa-newspaper"></i> Berita
                        </h3>

                        <hr>

                        @if($berita)

                            @if($berita->gambar)
                                <div class="info-img">
                                    <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Foto Berita">
                                </div>
                            @endif

                            <h5 style="font-size:16px;">{{ $berita->judul }}</h5>
                            <small style="color:#888;">{{ $berita->tanggal }}</small>
                            <p style="font-size:14px;color:#666;margin-top:8px;" class="home-text">{{ $berita->isi }}</p>

                        @else

                            <p style="color:#888;">Belum ada berita.</p>

                        @endif

                        <a href="{{ route('berita') }}" style="color:#0866b3;text-decoration:none;">
                            Lihat Semua Berita →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- KEUNGGULAN -->
<section class="keunggulan">
    <div class="container">
        <div class="section-title" data-aos="fade-down">
            <span>KEUNGGULAN SEKOLAH</span>
            <h2>Mengapa Kami Menjadi Pilihan Tepat</h2>
            <hr>
            <p>Kami memberikan pendidikan berkualitas untuk mendukung prestasi dan potensi siswa.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h4>Pendidikan Berkualitas</h4>
                    <p>Guru kompeten membantu siswa mendapatkan pembelajaran yang baik.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h4>Minat & Bakat</h4>
                    <p>Siswa dapat mengembangkan minat, bakat, kreativitas, dan potensi diri.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fa-solid fa-school"></i></div>
                    <h4>Pendidikan Lanjutan</h4>
                    <p>Siswa dibekali pengetahuan dan keterampilan untuk melanjutkan pendidikan.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- GURU & STAF -->
<div id="guru" style="padding:60px 0;"> 
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
                <span style="color:#e58b00;letter-spacing:2px;">TENAGA PENDIDIK PROFESIONAL</span>
                <h2 style="color:#0866b3;font-weight:700;margin:5px 0;border-bottom:3px solid #e58b00;padding-bottom:10px;">
                    Guru & Staf Berkualitas
                </h2>
            </div>
            <a href="{{ route('staf.guru') }}" style="background:#0866b3;color:white;padding:10px 15px;text-decoration:none;border-radius:5px;">
                › Lihat Semua
            </a>
        </div>

        <p style="margin-bottom:30px;">
            Guru dan staf kami terdiri dari tenaga profesional yang kompeten,
            berpengalaman, dan berdedikasi tinggi dalam memberikan layanan pendidikan
            berkualitas.
        </p>

        <div class="row g-4">
            @foreach($gurus as $guru)
                <div class="col-lg-3 col-md-6" data-aos="fade-up">
                    <a href="{{ route('staf.guru.detail', $guru->id_guru) }}" style="text-decoration:none;color:inherit;">
                        <div class="guru-card">
                            <img src="{{ asset('storage/'.$guru->foto) }}" style="width:100%;height:360px;object-fit:cover;" alt="{{ $guru->nama_guru }}">
                            <div style="padding:15px;text-align:center;">
                                <h5 style="font-weight:700;margin:0;">{{ $guru->nama_guru }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- EKSTRAKURIKULER -->
<section class="eskul-section">
    <div class="container">

        <div class="section-head">
            <div>
                <span>PENGEMBANGAN MINAT & BAKAT</span>
                <h2>Ekstrakurikuler Sekolah</h2>
            </div>

            <a href="{{ route('ekstrakurikuler') }}">› Lihat Semua</a>
        </div>

        <p class="eskul-deskripsi">
            Kami menyediakan beragam kegiatan ekstrakurikuler
            sebagai wadah pengembangan minat, bakat, dan karakter siswa.
        </p>

        <div class="row g-4">

            @foreach($ekskuls as $eskul)

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                    <a href="{{ route('ekstrakurikuler.detail',  $eskul->slug) }}">

                        <div class="eskul-card">

                            @if($eskul->gambar)

                                <img src="{{ asset('storage/'.$eskul->gambar) }}" alt="{{ $eskul->nama_eskul }}">

                            @else

                                <div class="eskul-no-image">
                                    <i class="fa-solid fa-image"></i>
                                </div>

                            @endif

                            <div class="eskul-info">

                                <h4>{{ $eskul->nama_eskul }}</h4>

                                <p>
                                    <i class="fa-solid fa-user"></i>
                                    Nama Pembina: {{ $eskul->pembina }}
                                </p>

                                <p>
                                    <i class="fa-solid fa-calendar"></i>
                                    Jadwal Latihan: {{ $eskul->jadwal_latihan }}
                                </p>

                                <span>Selengkapnya »</span>

                            </div>
                        </div>
                    </a>
                </div>

            @endforeach

        </div>
    </div>
</section>


<!-- GALERI -->
<div id="galeri" style="padding:60px 0;background:#f3f8fc;">
    <div class="container">

        <div class="d-flex justify-content-between align-items-start">

            <div>
                <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">DOKUMENTASI KEGIATAN</div>
                <h2 style="font-size:30px;font-weight:700;color:#005baa;margin:0;">Galeri Sekolah</h2>
                <div style="width:295px;height:4px;background:#e9a000;margin-top:14px;"></div>
            </div>

            <a href="{{ route('galeri') }}" style="background:#0863aa;color:#fff;padding:10px 15px;border-radius:6px;text-decoration:none;font-size:14px;">
                › Lihat Semua
            </a>

        </div>

        <p style="font-size:15px;line-height:1.7;color:#555;margin:20px 0 35px;">
            Galeri sekolah menampilkan berbagai dokumentasi kegiatan dan momen berharga siswa
            selama proses pembelajaran dan pengembangan diri.
        </p>

        <div class="row g-4">

            @foreach($galeris as $galeri)

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <a href="{{ route('galeri.detail', ['kategori' => $galeri->kategori, 'judul' => $galeri->judul]) }}" style="text-decoration:none;color:inherit;display:block;height:100%;">
                        <div class="galeri-card" style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;position:relative;">
                            <div style="position:relative;">

                                @if($galeri->kategori == 'Foto')

                                    <img src="{{ asset('storage/'.$galeri->file) }}" alt="{{ $galeri->judul }}" style="width:100%;height:230px;object-fit:cover;display:block;">

                                    <div style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,.65);color:#fff;padding:5px 9px;border-radius:6px;font-size:13px;">
                                        <i class="fa-solid fa-camera"></i> Foto
                                    </div>

                                @else

                                    <video controls style="width:100%;height:230px;object-fit:cover;display:block;">
                                        <source src="{{ asset('storage/'.$galeri->file) }}" type="video/mp4">
                                        Browser kamu tidak mendukung video.
                                    </video>

                                    <div style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,.65);color:#fff;padding:5px 9px;border-radius:6px;font-size:13px;">
                                        <i class="fa-solid fa-video"></i> Video
                                    </div>

                                @endif

                            </div>

                            <div style="padding:16px;">
                                <h5 style="font-size:17px;font-weight:600;color:#333;margin:0;">
                                    {{ $galeri->judul }}
                                </h5>
                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>
    </div>
</div>

@include('landing.footer')

<!-- BOOTSTRAP -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({
        duration:800,
        once:true,
        offset:100
    });
</script>

</body>
</html>