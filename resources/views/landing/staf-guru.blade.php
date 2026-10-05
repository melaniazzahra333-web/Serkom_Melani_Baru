<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staf & Guru - SMK YPC Tasikmalaya</title>

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
                    TENAGA PENDIDIK
                </div>

                <h2 style="font-size:32px;font-weight:700;color:#005baa;margin-top:5px;">
                    Staf & Guru
                </h2>

                <div style="width:200px;height:4px;background:#e9a000;margin:14px auto 0;"></div>
            </div>

            <div class="row g-4">

                @forelse($gurus as $guru)

                    <div class="col-lg-3 col-md-6">

                        <div style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;">

                            @if($guru->foto)

                                <img src="{{ asset('storage/'.$guru->foto) }}"
                                     alt="{{ $guru->nama_guru }}"
                                     style="width:100%;height:300px;object-fit:cover;">

                            @else

                                <div style="width:100%;height:300px;background:#eee;display:flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-user" style="font-size:70px;color:#aaa;"></i>
                                </div>

                            @endif

                            <div style="padding:18px;text-align:center;">

                                <h5 style="font-size:17px;font-weight:600;color:#333;margin-bottom:8px;">
                                    {{ $guru->nama_guru }}
                                </h5>

                                <p style="font-size:14px;color:#666;margin-bottom:5px;">
                                    {{ $guru->jabatan }}
                                </p>

                                <p style="font-size:14px;color:#666;margin-bottom:0;">
                                    {{ $guru->mapel }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p style="color:#777;">Belum ada data guru.</p>
                    </div>

                @endforelse

            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $gurus->links() }}
            </div>

        </div>
    </section>

    @include('landing.footer')

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>