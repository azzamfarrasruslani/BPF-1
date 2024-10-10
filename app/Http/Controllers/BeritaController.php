<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;

        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('images', 'public');
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita, int $id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Berita $berita)
    // {
    //     $request->validate([
    //         'judul' => 'required|string|max:255',
    //         'isi_berita' => 'required|string|max:255',
    //         'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     ]);
    //     $berita->judul = $request->judul;
    //     $berita->isi_berita = $request->isi_berita;

    //     if ($request->hasFile('gambar')) {
    //         $berita->gambar = $request->file('gambar')->store('images', 'public');
    //     }
        
    //     $berita->save();

    //     return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbaharui');
    // }

    public function update(Request $request, $id)
{
    // Mengambil berita berdasarkan ID yang diberikan
    $berita = Berita::findOrFail($id);

    // Validasi
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi_berita' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Mengupdate data berita
    $berita->judul = $request->judul;
    $berita->isi_berita = $request->isi_berita;

    if ($request->hasFile('gambar')) {
        // Menghapus gambar lama jika ada
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }
        // Menyimpan gambar baru
        $berita->gambar = $request->file('gambar')->store('images', 'public');
    }
    
    $berita->save();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbaharui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita, $id): RedirectResponse
    {
        $berita = Berita::findOrFail($id);

        // dd($berita->id);
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }
    
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
    
}
