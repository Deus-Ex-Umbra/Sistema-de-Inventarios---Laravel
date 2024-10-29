<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;

Route::get('/inventarios', [InventarioController::class, 'viewAllInventarios'])->name('inventario.index');
Route::get('/inventarios/create', [InventarioController::class, 'viewCreateInventario'])->name('inventario.create');
Route::post('/inventarios/create', [InventarioController::class, 'createInventario'])->name('inventario.store');
