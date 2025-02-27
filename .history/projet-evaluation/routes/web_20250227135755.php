<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Condidate\CandidateController;
use League\CommonMark\Node\Block\Document;

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
    Route::get('/documents', [DocumentController::class, 'documents'])->name('candidate.documents.index');
});

require __DIR__.'/auth.php';


Route::get('/debug-auth', function() {
    dd(auth()->check(), auth()->user());
});
