<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan semua data guru di halaman admin
    public function index(Request $request)
    {
        $search = $request->search;  // Mengambil kata pencarian dari input search

        $gurus = Guru::query();  // Membuat query untuk mengambil data guru

        // Jika ada pencarian, cari berdasarkan nama, NIP, jabatan, atau mata pelajaran
        if ($search) {
            $gurus->where('nama_guru', 'like', "%$search%")
                ->orWhere('nip', 'like', "%$search%")
                ->orWhere('jabatan', 'like', "%$search%")
                ->orWhere('mapel', 'like', "%$search%");
        }

        $gurus = $gurus->orderBy('created_at', 'asc')->get();  // Mengurutkan data dari yang paling lama dibuat lalu mengambil semua data

        // Mengirim data guru dan search ke halaman admin guru
        // compact() digunakan untuk mengirim beberapa variabel ke view dengan lebih singkat
        return view('admin.guru.index', compact('gurus', 'search'));
    }

    // Menampilkan form untuk menambah data guru
    public function create()
    {
        return view('admin.guru.create');
    }

    // Menyimpan data guru baru ke database
    public function store(Request $request)
    {
        // Mengecek agar data yang wajib diisi tidak kosong
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Menyiapkan foto dengan nilai awal kosong
        $foto = null;

        // Mengecek apakah user mengupload foto
        if ($request->hasFile('foto')) {
           
            $foto = $request->file('foto')->store('foto-guru', 'public');  // Menyimpan foto ke folder storage/app/public/foto-guru
        }

        // Menyimpan data guru ke database
        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'jabatan' => $request->jabatan,
            'foto' => $foto
        ]);

        // Kembali ke halaman guru setelah berhasil menyimpan
        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan.');
    }

    // Menampilkan form edit berdasarkan ID guru
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);  // Mencari data guru berdasarkan ID

        // Mengirim data guru ke halaman edit
        return view('admin.guru.edit', compact('guru'));
    }

    // Mengubah data guru yang sudah ada
    public function update(Request $request, $id)
    {
        // Mencari guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Mengecek data yang akan diubah
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'jabatan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Mengubah data guru
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'jabatan' => $request->jabatan
        ]);

        // Jika ada foto baru, maka foto lama diganti dengan foto baru
        if ($request->hasFile('foto')) {
            $guru->update([
                'foto' => $request->file('foto')->store('foto-guru', 'public')
            ]);
        }

        // Kembali ke halaman guru setelah berhasil mengubah data
        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil diperbarui.');
    }

    // Menghapus data guru
    public function destroy($id)
    {
        // Mencari guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Menghapus data guru dari database
        $guru->delete();

        // Kembali ke halaman guru dengan pesan berhasil
        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil dihapus.');
    }

    // Menampilkan data guru di halaman landing
    public function stafGuru()
    {
        // Mengambil semua guru kecuali Kepala Sekolah
        $gurus = Guru::where('jabatan', '!=', 'Kepala Sekolah')->latest()->get();

        // Mengirim data guru ke halaman landing
        return view('landing.guru.index', compact('gurus'));
    }

    // Menampilkan detail satu guru di halaman landing
    public function show($id)
    {
        // Mencari guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Mengambil guru lainnya, kecuali Kepala Sekolah dan guru yang sedang dibuka
        $guruLainnya = Guru::where('jabatan', '!=', 'Kepala Sekolah')
            ->where('id_guru', '!=', $guru->id_guru)->latest()->get();

        // Mengirim data guru dan guru lainnya ke halaman detail
        return view('landing.guru.detail', compact('guru', 'guruLainnya'));
    }
}