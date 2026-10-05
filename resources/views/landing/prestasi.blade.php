<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi - SMK YPC Tasikmalaya</title>

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
                    PRESTASI SEKOLAH
                </div>

                <h2 style="font-size:32px;font-weight:700;color:#005baa;margin-top:5px;">
                    Prestasi Siswa
                </h2>

                <div style="width:200px;height:4px;background:#e9a000;margin:14px auto 0;"></div>
            </div>

            <div class="row g-4">

                @forelse($prestasis as $prestasi)

                    <div class="col-md-6">

                        <div class="card h-100" style="border:1px solid #e5e7eb;border-radius:16px;overflow:hidden;">

                            @if($prestasi->foto)
                                <img src="{{ asset('storage/'.$prestasi->foto) }}"
                                     alt="Prestasi"
                                     style="width:100%;height:250px;object-fit:cover;">
                            @endif

                            <div class="card-body">

                                <h4 style="font-size:20px;font-weight:600;color:#005baa;">
                                    <i class="fa-solid fa-trophy me-2"></i>
                                    Prestasi
                                </h4>

                                <p style="font-size:15px;color:#555;line-height:1.7;">
                                    {{ $prestasi->deskripsi }}
                                </p>

                                <p style="font-size:14px;color:#888;margin-bottom:0;">
                                    <i class="fa-regular fa-calendar me-1"></i>
                                    Tahun Ajaran {{ $prestasi->tahun_ajaran }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p style="color:#777;">Belum ada data prestasi.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    @include('landing.footer')

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>