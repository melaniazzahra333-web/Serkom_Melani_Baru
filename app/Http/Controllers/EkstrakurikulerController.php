<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EkstrakurikulerController extends Controller
{
    // Menampilkan data ekstrakurikuler di halaman admin
    public function index(Request $request)
    {
        // Mengambil kata pencarian dari form
        $search = $request->search;

        // Membuat query untuk mengambil data ekstrakurikuler
        $ekstrakurikulers = Ekstrakurikuler::query();

        // Jika ada pencarian, cari berdasarkan nama, pembina, jadwal, atau deskripsi
        if ($search) {
            $ekstrakurikulers->where('nama_eskul', 'like', "%$search%")
                ->orWhere('pembina', 'like', "%$search%")
                ->orWhere('jadwal_latihan', 'like', "%$search%")
                ->orWhere('deskripsi', 'like', "%$search%");
        }

        $ekstrakurikulers = $ekstrakurikulers->get();  // Mengambil semua data

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikulers', 'search')); // Mengirim data dan search ke halaman admin
    }

    // Menampilkan form tambah ekstrakurikuler
    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    // Menyimpan ekstrakurikuler baru
    public function store(Request $request)
    {
        // Mengecek data yang wajib diisi
        $request->validate([
            'nama_eskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = $request->file('gambar')->store('gambar-eskul', 'public');  // Menyimpan gambar ke storage

        // Menyimpan data ekstrakurikuler ke database
        Ekstrakurikuler::create([
            'nama_eskul' => $request->nama_eskul,
            'slug' => Str::slug($request->nama_eskul),
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        // Kembali ke halaman admin dengan pesan berhasil
        return redirect()->route('admin.ektrakurikuler')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    // Menampilkan form edit ekstrakurikuler
    public function edit($id)
    {
        // Mencari data berdasarkan ID
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Mengirim data ke halaman edit
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    // Mengubah data ekstrakurikuler
    public function update(Request $request, $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Mengecek data yang akan diubah
        $request->validate([
            'nama_eskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Data yang akan diperbarui
        $data = [
            'nama_eskul' => $request->nama_eskul,
            'slug' => Str::slug($request->nama_eskul),
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

        // Jika ada gambar baru, simpan gambar baru
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar-eskul', 'public');
        }

        $ekstrakurikuler->update($data); // Mengupdate data di database

        // Kembali ke halaman admin
        return redirect()->route('admin.ektrakurikuler')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    // Menghapus data ekstrakurikuler
    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);  // Mencari data berdasarkan ID

        $ekstrakurikuler->delete();  // Menghapus data

        // Kembali ke halaman admin
        return redirect()->route('admin.ektrakurikuler')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    // Menampilkan ekstrakurikuler di halaman landing
    public function landing()
    {
        // Mengambil data terbaru lalu mengelompokkan berdasarkan nama ekstrakurikuler
        $ekskuls = Ekstrakurikuler::latest()->get()->groupBy('nama_eskul');

        // Mengirim data ke halaman landing
        return view('landing.ekstrakurikuler.index', compact('ekskuls'));
    }

    // Menampilkan detail ekstrakurikuler berdasarkan slug
    public function detail($slug)
    {
        // Mencari ekstrakurikuler berdasarkan slug
        $ekstrakurikuler = Ekstrakurikuler::where('slug', $slug)->firstOrFail();

        // Mengambil semua dokumentasi dengan nama ekstrakurikuler yang sama
        $galeri = Ekstrakurikuler::where('nama_eskul', $ekstrakurikuler->nama_eskul)->get();

        // Mengambil deskripsi dan menghilangkan data yang sama
        $deskripsi = $galeri->pluck('deskripsi')->filter()->unique()->values(); //pluck = ambil kolom, filter = buang kosong, unique = buang duplikat.

        // Mengambil ekstrakurikuler lainnya yng memiliki nama berbeda dari yang sedang dibuka
        $ekskuls = Ekstrakurikuler::where('nama_eskul', '!=', $ekstrakurikuler->nama_eskul)
            ->latest()->get()->groupBy('nama_eskul')->map(function ($items) {
                return $items->first();
            });

        // Mengirim semua data ke halaman detail
        return view('landing.ekstrakurikuler.detail', compact(
            'ekstrakurikuler',
            'galeri',
            'deskripsi',
            'ekskuls'
        ));
    }
}