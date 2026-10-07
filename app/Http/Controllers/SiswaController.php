<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Menampilkan semua data siswa di halaman admin
    public function index(Request $request)
    {
        // Mengambil kata pencarian dari form
        $search = $request->search;

        // Membuat query untuk mengambil data siswa
        $siswas = Siswa::query();

        // Jika ada pencarian, cari berdasarkan NISN, nama, jenis kelamin, atau tahun masuk
        if ($search) {
            $siswas->where('nisn', 'like', "%$search%")
                ->orWhere('nama_siswa', 'like', "%$search%")
                ->orWhere('jenis_kelamin', 'like', "%$search%")
                ->orWhere('tahun_masuk', 'like', "%$search%");
        }

        // Mengurutkan data dari yang paling lama dibuat lalu mengambil semua data
        $siswas = $siswas->orderBy('created_at', 'asc')->get();

        // Mengirim data siswa dan search ke halaman admin
        // compact() digunakan untuk mengirim variabel ke view dengan lebih singkat
        return view('admin.siswa.index', compact('siswas', 'search'));
    }

    // Menampilkan form untuk menambah siswa
    public function create()
    {
        return view('admin.siswa.create');
    }

    // Menyimpan data siswa baru ke database
    public function store(Request $request)
    {
        // Mengecek data yang wajib diisi
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
        ]);

        // Menyimpan data siswa ke database
        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        // Kembali ke halaman siswa setelah berhasil menyimpan
        return redirect()->route('admin.siswa');
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        // Mencari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Mengirim data siswa ke halaman edit
        return view('admin.siswa.edit', compact('siswa'));
    }

    // Mengubah data siswa
    public function update(Request $request, $id)
    {
        // Mencari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Mengecek data yang akan diubah
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
        ]);

        // Mengubah data siswa
        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        // Kembali ke halaman siswa dengan pesan berhasil
        return redirect()->route('admin.siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        // Mencari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Menghapus data siswa dari database
        $siswa->delete();

        // Kembali ke halaman siswa
        return redirect()->route('admin.siswa');
    }
}