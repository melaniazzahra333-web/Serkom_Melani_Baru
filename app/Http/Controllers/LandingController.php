<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Mengambil data berita
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;


class LandingController extends Controller
{
    public function index()
    {
       $kepalaSekolah = Guru::where('jabatan', 'Kepala Sekolah')->first();  // Mengambil 1 guru yang jabatannya Kepala Sekolah

        $berita = Berita::where('status', 'Publish')->latest()->first(); // Mengambil 1 berita yang statusnya Publish dan paling terbaru

        $pengumuman = Pengumuman::where('status', 'Publish')->latest('tanggal')->take(2)->get();  // Mengambil 2 pengumuman yang Publish dan paling terbaru berdasarkan tanggal

        $prestasis = Prestasi::latest()->first();

        $gurus = Guru::latest()->take(4)->get();


        $ekskuls = Ekstrakurikuler::latest()->get()->groupBy('nama_eskul')->map(function ($items) {
                return $items->first();
            })->values()->take(2);

   
        $galeris = Galeri::latest()->get()->groupBy(function ($item) {   // Mengelompokkan galeri berdasarkan kategori dan judul
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
            ->values()->take(6);

        return view('landing.index', [
            'kepalaSekolah' => $kepalaSekolah,
            'berita' => $berita,
            'pengumuman' => $pengumuman,
            'prestasis' => $prestasis,
            'gurus' => $gurus,
            'ekskuls' => $ekskuls,
            'galeris' => $galeris,
        ]);
    }
}