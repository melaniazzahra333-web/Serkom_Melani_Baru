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
        $berita = Berita::where('status', 'Publish')
    ->latest()
    ->first();

        $pengumuman = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->take(3)
            ->get();

        $prestasis = Prestasi::latest()->first();

        $gurus = Guru::latest()
            ->take(4)
            ->get();

        $ekskuls = Ekstrakurikuler::latest()
            ->take(2)
            ->get();

        $galeris = Galeri::latest()
    ->get()
    ->groupBy(function ($item) {
        return $item->kategori . '|' . $item->judul;
    })
    ->map(function ($items) {
        return (object) [
            'judul' => $items->first()->judul,
            'kategori' => $items->first()->kategori,
            'file' => $items->first()->file,
            'jumlah' => $items->count(),
        ];
    })
    ->values()
    ->take(6);

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
