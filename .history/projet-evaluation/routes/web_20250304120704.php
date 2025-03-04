<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Condidate\CandidateController;
use League\CommonMark\Node\Block\Document;
use App\Http\Controllers\Candidate\Documents\DocumentsController;
use App\Http\Controllers\Candidate\Quiz\QuizController;


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
    Route::get('/documents', [DocumentsController::class, 'index'])->name('documents.index');
    Route::post('/documents', [DocumentsController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/download', [DocumentsController::class, 'download'])->name('documents.download');
    Route::get('/documents/{document}/preview', [DocumentsController::class, 'preview'])->name('documents.preview');
    Route::get('/documents/{document}/stream', [DocumentsController::class, 'stream'])->name('documents.stream');
    Route::delete('/documents/{document}', [DocumentsController::class, 'destroy'])->name('documents.destroy');


    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::post('/quizzes/{id}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    Route::get('/quiz-attempts/{attemptId}/results', [QuizController::class, 'results'])->name('quizzes.results');
});




require __DIR__.'/auth.php';


Route::get('/debug-auth', function() {
    dd(auth()->check(), auth()->user());
});
