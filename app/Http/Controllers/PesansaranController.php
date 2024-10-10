<?php

namespace App\Http\Controllers;

use App\Models\Pesansaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

class PesansaranController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pesansaran = Pesansaran::all();
        return view('pesansaran.index', compact('pesansaran'));  //Menampilkan view form input pesan dan saran
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Reques digunakan untuk merequest data
    {
        //Validasi data yang diinput oleh pengguna
        $validated =$request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',


        ]);


        // //Menyimpan data yang telah validasi ke table 'pesansarans'
        // request()->user()->pesanSaran->create($validated);
        request()->user()->pesanSaran()->create($validated);
        // Pesansaran::create($validated);

        return redirect()->route('pesan_saran.index')->with('success','Pesan sarang berhasil dikirim!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pesansaran $pesansaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Pesansaran $pesansaran, int $id): View
    {
        $pesanSaran = Pesansaran::findOrFail($id);

        return view('pesansaran.edit', compact('pesanSaran'));
    }

    // public function edit(Pesansaran $pesansaran, int $id): View
    // {
    //     $pesanSaran = Pesansaran::findOrFail($id);

    //     return view('pesansaran.edit',compact('pesanSaran'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        // Cari pesan saran berdasarkan id
        $pesanSaran = PesanSaran::findOrFail($id);

        // Update data
        $pesanSaran->update($validated);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('pesan_saran.index')->with('success', 'Pesan berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(PesanSaran $pesanSaran):RedirectResponse {
    //     $pesanSaran->delete();
    //     return redirect()->route('pesan_saran.index')->with('success','Pesan saran berhasil dihapus! ');
    // }




    public function destroy(PesanSaran $pesanSaran): RedirectResponse
    {
        // // Otorisasi jika diperlukan
        $this->authorize('delete', $pesanSaran);

        // Hapus pesan saran
        $pesanSaran->delete();

        // Redirect setelah penghapusan
        return redirect()->route('pesan_saran.index')->with('success', 'Pesan saran berhasil dihapus!');
    }
}
