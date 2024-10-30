<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;

Route::get('/marcas', [MarcaController::class, 'viewAllMarcas'])->name('marca.index');
Route::get('/marcas/create', [MarcaController::class, 'viewCreateMarca'])->name('marca.create');
Route::post('/marcas/create', [MarcaController::class, 'createMarca'])->name('marca.store');
Route::get('/marcas/edit/{id_marca}', [MarcaController::class, 'viewUpdateMarca'])->name('marca.edit');
Route::put('/marcas/update/{id_marca}', [MarcaController::class, 'updateMarca'])->name('marca.update');
Route::delete('/marcas/delete/{id_marca}', [MarcaController::class, 'deleteMarca'])->name('marca.delete');
