<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guru->nama_guru }} - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

@include('landing.navbar')

<section style="padding:50px 0 70px;background:#f5f8fb;min-height:600px;">
    <div class="container">

        <!-- Breadcrumb -->
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:35px;" data-aos="fade-down">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;">
                » <a href="{{ route('staf.guru') }}" style="text-decoration:none;color:#333;">Staf & Guru</a>
                » {{ $guru->nama_guru }}
            </span>
        </div>

        <div class="row g-4">

            <!-- BAGIAN FOTO + DATA GURU -->
            <div class="col-lg-8" data-aos="fade-up">
                <div style="background:#fff;border-radius:15px;padding:25px;box-shadow:0 3px 15px rgba(0,0,0,.08);">
                    <div class="row g-4 align-items-center">

                        <!-- FOTO -->
                        <div class="col-md-5">
                            @if($guru->foto)
                                <img src="{{ asset('storage/'.$guru->foto) }}"
                                     alt="{{ $guru->nama_guru }}"
                                     style="width:100%;height:400px;object-fit:cover;border-radius:12px;">
                            @else
                                <div style="height:400px;background:#eee;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-user" style="font-size:90px;color:#aaa;"></i>
                                </div>
                            @endif
                        </div>

                        <!-- DATA GURU -->
                        <div class="col-md-7">
                            <div style="margin-bottom:20px;">
                                <div style="font-size:14px;color:#e99b00;letter-spacing:2px;margin-bottom:5px;">TENAGA PENDIDIK</div>
                                <h2 style="font-size:28px;font-weight:700;color:#005baa;margin:0;">{{ $guru->nama_guru }}</h2>
                            </div>

                            <div style="border-top:1px solid #eee;">
                                <div style="padding:13px 0;border-bottom:1px solid #eee;">
                                    <div style="font-size:13px;color:#888;"><i class="fa-solid fa-id-card" style="width:22px;color:#005baa;"></i>NIP</div>
                                    <div style="font-weight:600;color:#333;margin-top:4px;">{{ $guru->nip }}</div>
                                </div>

                                <div style="padding:13px 0;border-bottom:1px solid #eee;">
                                    <div style="font-size:13px;color:#888;"><i class="fa-solid fa-briefcase" style="width:22px;color:#005baa;"></i>Jabatan</div>
                                    <div style="font-weight:600;color:#333;margin-top:4px;">{{ $guru->jabatan }}</div>
                                </div>

                                <div style="padding:13px 0;border-bottom:1px solid #eee;">
                                    <div style="font-size:13px;color:#888;"><i class="fa-solid fa-book" style="width:22px;color:#005baa;"></i>Mata Pelajaran</div>
                                    <div style="font-weight:600;color:#333;margin-top:4px;">{{ $guru->mapel }}</div>
                                </div>

                                <div style="padding:13px 0;border-bottom:1px solid #eee;">
                                    <div style="font-size:13px;color:#888;"><i class="fa-solid fa-circle-check" style="width:22px;color:#198754;"></i>Status</div>
                                    <div style="font-weight:600;color:#198754;margin-top:4px;">Aktif</div>
                                </div>

                                <div style="padding:13px 0;">
                                    <div style="font-size:13px;color:#888;"><i class="fa-solid fa-mosque" style="width:22px;color:#005baa;"></i>Agama</div>
                                    <div style="font-weight:600;color:#333;margin-top:4px;">Islam</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- GURU & STAF LAINNYA -->
            <div style="margin-top:55px;" data-aos="fade-up">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <div style="font-size:14px;letter-spacing:2px;color:#e99b00;margin-bottom:6px;">TENAGA PENDIDIK</div>
                        <h3 style="font-size:28px;font-weight:700;color:#005baa;margin:0;">Guru & Staf Lainnya</h3>
                        <div style="width:100px;height:4px;background:#e9a000;margin-top:10px;"></div>
                    </div>

                    <!-- TOMBOL GESER -->
                    <div style="display:flex;gap:8px;">
                        <button type="button" onclick="geserGuru(-1)" style="width:42px;height:42px;border:1px solid #005baa;background:#fff;color:#005baa;border-radius:50%;font-size:18px;">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button type="button" onclick="geserGuru(1)" style="width:42px;height:42px;border:1px solid #005baa;background:#005baa;color:#fff;border-radius:50%;font-size:18px;">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- SLIDER -->
                <div id="guruLainnya" style="display:flex;gap:24px;overflow:hidden;scroll-behavior:smooth;padding:5px 2px 15px;">
                    @foreach($guruLainnya as $guruItem)
                        <div style="min-width:calc(25% - 18px);flex:0 0 calc(25% - 18px);">
                            <a href="{{ route('staf.guru.detail', $guruItem->id_guru) }}" style="text-decoration:none;color:inherit;">
                                <div style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;">

                                    @if($guruItem->foto)
                                        <img src="{{ asset('storage/'.$guruItem->foto) }}"
                                             alt="{{ $guruItem->nama_guru }}"
                                             style="width:100%;height:250px;object-fit:cover;">
                                    @else
                                        <div style="height:250px;background:#eee;display:flex;align-items:center;justify-content:center;">
                                            <i class="fa-solid fa-user" style="font-size:65px;color:#aaa;"></i>
                                        </div>
                                    @endif

                                    <div style="padding:15px;text-align:center;">
                                        <h5 style="font-size:17px;font-weight:600;color:#333;margin-bottom:5px;">{{ $guruItem->nama_guru }}</h5>
                                        <p style="color:#666;margin:0;font-size:14px;">{{ $guruItem->jabatan }}</p>
                                        <small style="color:#888;">{{ $guruItem->mapel }}</small>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

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

<script>
    function geserGuru(arah) {
        const slider = document.getElementById('guruLainnya');

        slider.scrollBy({
            left: arah * 350,
            behavior: 'smooth'
        });
    }
</script>

</body>
</html>