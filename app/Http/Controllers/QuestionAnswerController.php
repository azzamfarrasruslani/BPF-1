<?php

namespace App\Http\Controllers;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionAnswerController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index(): View
    {
        $qna = QuestionAnswer::all();
        return view('qna.index', compact('qna'));  //Menampilkan view form input pesan dan saran
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
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);


        // //Menyimpan data yang telah validasi ke table 'pesansarans'
        // request()->user()->qna()->create($validated);
        // Pesansaran::create($validated);
        QuestionAnswer::create($validated);

        return redirect()->route('qna.index')->with('success','Pesan sarang berhasil dikirim!');

    }

    public function edit(QuestionAnswer $questionAnswer, int $id): View
    {
        $qna = QuestionAnswer::findOrFail($id);

        return view('qna.edit', compact('qna'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // Cari pesan saran berdasarkan id
        $qna =  QuestionAnswer::findOrFail($id);

        // Update data
        $qna->update($validated);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('qna.index')->with('success', 'Pesan berhasil diupdate');
    }

    public function destroy(QuestionAnswer $qna): RedirectResponse
    {
        // // Otorisasi jika diperlukan
        // $this->authorize('delete', $questionAnswer);

        // Hapus pesan saran
        $qna->delete();

        // Redirect setelah penghapusan
        return redirect()->route('qna.index')->with('success', 'Pesan saran berhasil dihapus!');
    }


}
