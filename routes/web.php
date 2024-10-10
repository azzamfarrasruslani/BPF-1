<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesanSaranController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Pesan Saran
Route::resource('pesan_saran', PesanSaranController::class)->only(['index', 'store', 'edit', 'destroy', 'update']);

Route::resource('berita', BeritaController::class)->only(['index', 'store', 'edit', 'destroy', 'update','create']);



// Question & Answer
Route::resource('qna',QuestionAnswerController::class)->only(['index','store','edit','update','destroy']) ;

require __DIR__.'/auth.php';
