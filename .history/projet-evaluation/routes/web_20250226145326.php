<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->prefix('candidate')->group(function () {
    Route::get('/', [CandidateController::class, 'index'])->name('candidate.index');
    Route::get('/create', [CandidateController::class, 'create'])->name('candidate.create');
    Route::post('/store', [CandidateController::class, 'store'])->name('candidate.store');
    Route::get('/{candidate}', [CandidateController::class, 'show'])->name('candidate.show');
    Route::get('/{candidate}/edit', [CandidateController::class, 'edit'])->name('candidate.edit');
    Route::put('/{candidate}', [CandidateController::class, 'update'])->name('candidate.update');
    Route::delete('/{candidate}', [CandidateController::class, 'destroy'])->name('candidate.destroy');
});

require __DIR__.'/auth.php';


Route::get('/debug-auth', function() {
    dd(auth()->check(), auth()->user());
});
