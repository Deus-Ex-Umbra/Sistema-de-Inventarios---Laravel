<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoteController;

Route::get('/lotes', [LoteController::class, 'viewAllLotes'])->name('lotes.index');
Route::get('/lotes/create', [LoteController::class, 'viewCreateLote'])->name('lotes.create');
Route::post('/lotes/create', [LoteController::class, 'createLote'])->name('lotes.store');
Route::get('/lotes/edit/{id}', [LoteController::class, 'viewUpdateLote'])->name('lotes.edit');
Route::put('/lotes/update/{id}', [LoteController::class, 'updateLote'])->name('lotes.update');
Route::delete('/lotes/delete/{id}', [LoteController::class, 'deleteLote'])->name('lotes.delete');
