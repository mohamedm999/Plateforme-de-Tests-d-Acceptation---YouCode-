// In routes/web.php
Route::middleware(['auth', 'role:candidate'])->prefix('candidate')->group(function () {
    Route::get('/documents', [\App\Http\Controllers\Candidate\Documents\DocumentsController::class, 'index'])->name('candidate.documents.index');
});
