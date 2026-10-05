<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a href="#banner" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="width:50px;height:50px;object-fit:contain;" class="me-3">
            <span class="fw-bold">SMK YPC TASIKMALAYA</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fa-solid fa-house me-1"></i>Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staf.guru') }}">
                        <i class="fa-solid fa-chalkboard-user me-1"></i>Staf & Guru
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-users me-1"></i>Kesiswaan
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('ekstrakurikuler') }}">
                                Ekstrakurikuler
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('prestasi') }}">
                                Prestasi
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-newspaper me-1"></i>Publikasi
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('pengumuman') }}">
                                Pengumuman
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('berita') }}">
                                Berita
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('galeri') }}">
                        <i class="fa-solid fa-images me-1"></i>Foto & Video
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#sambutan">
                        <i class="fa-solid fa-building me-1"></i>Profil Sekolah
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>