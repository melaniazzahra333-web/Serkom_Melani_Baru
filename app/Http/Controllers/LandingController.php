<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;

class LandingController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->first();

        $pengumuman = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->take(3)
            ->get();

        $prestasis = Prestasi::latest()
            ->take(3)
            ->get();

        $gurus = Guru::latest()
            ->take(6)
            ->get();

        $ekskuls = Ekstrakurikuler::latest()
            ->take(6)
            ->get();

        $galeris = Galeri::where('kategori', 'Foto')
        ->latest()
        ->take(6)
        ->get();

        return view('landing.index', [
            'berita' => $berita,
            'pengumuman' => $pengumuman,
            'prestasis' => $prestasis,
            'gurus' => $gurus,
            'ekskuls' => $ekskuls,
            'galeris' => $galeris,
        ]);
    }
}
