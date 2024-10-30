<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoteController;

Route::get('/lotes', [LoteController::class, 'viewAllLotes'])->name('lote.index');
Route::get('/lotes/create', [LoteController::class, 'viewCreateLote'])->name('lote.create');
Route::post('/lotes/create', [LoteController::class, 'createLote'])->name('lote.store');
Route::get('/lotes/edit/{id_lote}', [LoteController::class, 'viewUpdateLote'])->name('lote.edit');
Route::put('/lotes/update/{id_lote}', [LoteController::class, 'updateLote'])->name('lote.update');
Route::delete('/lotes/delete/{id_lote}', [LoteController::class, 'deleteLote'])->name('lote.delete');
Route::post('/lotes/search', [LoteController::class, 'searchLotesByColumn'])->name('lote.search');