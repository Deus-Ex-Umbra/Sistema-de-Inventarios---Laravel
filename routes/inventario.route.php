<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;

Route::get('/inventarios', [InventarioController::class, 'viewAllInventarios'])->name('inventario.index');
Route::get('/inventarios/create', [InventarioController::class, 'viewCreateInventario'])->name('inventario.create');
Route::post('/inventarios/create', [InventarioController::class, 'createInventario'])->name('inventario.store');
Route::get('/inventarios/edit/{id}', [InventarioController::class, 'viewUpdateInventario'])->name('inventario.edit');
Route::put('/inventarios/update/{id}', [InventarioController::class, 'updateInventario'])->name('inventario.update');
Route::delete('/inventarios/delete/{id}', [InventarioController::class, 'deleteInventario'])->name('inventario.delete');
