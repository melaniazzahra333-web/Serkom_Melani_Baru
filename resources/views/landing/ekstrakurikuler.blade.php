<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>

    @include('landing.navbar')

    <section style="padding:130px 0 60px;background:#f5f8fb;">
        <div class="container">

            <div class="text-center mb-5">
                <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">
                    PENGEMBANGAN MINAT & BAKAT
                </div>

                <h2 style="font-size:32px;font-weight:700;color:#005baa;margin-top:5px;">
                    Ekstrakurikuler Sekolah
                </h2>

                <div style="width:250px;height:4px;background:#e9a000;margin:14px auto 0;"></div>
            </div>

            <div class="row g-4">

                @forelse($ekskuls as $eskul)

                    <div class="col-md-6">

                        <div class="eskul-card">

                            @if($eskul->gambar)
                                <img src="{{ asset('storage/'.$eskul->gambar) }}"
                                     alt="{{ $eskul->nama_ekskul }}">
                            @endif

                            <div class="eskul-info">

                                <h4>{{ $eskul->nama_ekskul }}</h4>

                                <p>
                                    <i class="fa-solid fa-users"></i>
                                    {{ $eskul->jumlah_anggota }} Anggota
                                </p>

                                <p>
                                    <i class="fa-solid fa-user"></i>
                                    {{ $eskul->pembina }}
                                </p>

                                <p>
                                    <i class="fa-solid fa-calendar"></i>
                                    {{ $eskul->jadwal_latihan }}
                                </p>

                                <p>
                                    {{ $eskul->deskripsi }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p style="color:#777;">Belum ada data ekstrakurikuler.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    @include('landing.footer')

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>