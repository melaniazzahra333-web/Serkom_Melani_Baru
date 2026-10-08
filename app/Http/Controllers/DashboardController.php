<?php

namespace App\Http\Controllers;

use App\Models\Guru; //mengambil data dari model Guru
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\Profil;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = Guru::count(); // Menghitung jumlah guru
        $totalSiswa = Siswa::count();
        $totalBerita = Berita::count();
        $totalPrestasi = Prestasi::count();

        $profil = Profil::first(); //ambil data pertama dari tabel profil

        $beritaTerbaru = Berita::latest()->take(3)->get(); // Mengambil 3 berita terbaru
        $guruTerbaru = Guru::latest()->take(4)->get(); // Mengambil 4 guru terbaru

         // Mengirim semua data ke halaman dashboard
        return view('admin.dasboard', compact(
            'totalGuru',
            'totalSiswa',
            'totalBerita',
            'totalPrestasi',
            'profil',
            'beritaTerbaru',
            'guruTerbaru'
        ));
    }
}
