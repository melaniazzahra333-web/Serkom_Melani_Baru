<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Menampilkan semua berita
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        $beritas = Berita::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('isi', 'like', '%' . $search . '%')
                    ->orWhere('tanggal', 'like', '%' . $search . '%');
                });
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()->get();

            return view('admin.berita.index', compact('beritas','search','status'));
    }

    /**
     * Form tambah berita
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Menyimpan berita
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:Publish,Draft',
            
             
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar-berita', 'public');
        }

        $user = DB::table('user')->first();
        if (!$user) {
            return back()->with('error', 'Belum ada data user.');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar,
            'status' => $request->status,
            'id_user' => $user->id_user,
            'slug' => Str::slug($request->judul),
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Form edit berita
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    public function show($slug)
{
      $berita = Berita::where('status', 'Publish')
        ->where('slug', $slug)
        ->firstOrFail();

    $beritaLainnya = Berita::where('status', 'Publish')
        ->where('id_berita', '!=', $berita->id_berita)
        ->latest()
        ->take(3)
        ->get();

    return view('landing.berita.detail', compact('berita', 'beritaLainnya'));
}

    /**
     * Update berita
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:Publish,Draft',
        ]);

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'slug' => Str::slug($request->judul),
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar-berita', 'public');

            $berita->update([
                'gambar' => $gambar,
            ]);
        }

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        $berita->delete();

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus.');
    }

public function landing(Request $request)
{
    $search = $request->search;

    if ($search) {
        $beritas = Berita::where('status', 'Publish')
            ->where(function ($query) use ($search) {
                $query->where('judul', 'like', "%$search%")
                      ->orWhere('isi', 'like', "%$search%");
            })
            ->latest()
            ->get();
    } else {
        $beritas = Berita::where('status', 'Publish')
            ->latest()
            ->get();
    }

    return view('landing.berita.index', compact('beritas', 'search'));
}
}
