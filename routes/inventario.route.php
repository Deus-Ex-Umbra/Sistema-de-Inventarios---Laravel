<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoteController;

Route::get('/inventarios', [InventarioController::class, 'viewAllInventarios'])->name('inventario.index');
Route::get('/inventarios/create', [InventarioController::class, 'viewCreateInventario'])->name('inventario.create');
Route::post('/inventarios/create', [InventarioController::class, 'createInventario'])->name('inventario.store');
Route::get('/inventarios/edit/{id}', [InventarioController::class, 'viewUpdateInventario'])->name('inventario.edit');
Route::put('/inventarios/update/{id}', [InventarioController::class, 'updateInventario'])->name('inventario.update');
Route::delete('/inventarios/delete/{id}', [InventarioController::class, 'deleteInventario'])->name('inventario.delete');
Route::post('/inventarios/search', [InventarioController::class, 'searchInventariosByColumn'])->name('inventario.search');
Route::get('/inventarios/{id}/productos', [ProductoController::class, 'viewAllProductosByInventario'])->name('inventario.productos');
Route::post('/inventarios/{id}/productos/search', [ProductoController::class, 'searchProductosByColumn'])->name('inventario.productos.search');
Route::get('/inventarios/{id}/productos/create', [ProductoController::class, 'viewCreateProducto'])->name('inventario.productos.create');
Route::post('/inventarios/{id}/productos/store', [ProductoController::class, 'createProducto'])->name('inventario.productos.store');
Route::get('/inventarios/{id}/productos/edit/{id}', [ProductoController::class, 'viewUpdateProducto'])->name('inventario.productos.edit');
Route::put('/inventarios/{id}/productos/update/{id}', [ProductoController::class, 'updateProducto'])->name('inventario.productos.update');
Route::delete('/inventarios/{id}/productos/delete/{id}', [ProductoController::class, 'deleteProducto'])->name('inventario.productos.delete');
Route::get('/inventarios/{id}/productos/{id}/lotes', [LoteController::class, 'viewAllLotesByProducto'])->name('inventario.productos.lotes');
Route::post('/inventarios/{id}/productos/{id}/lotes/search', [LoteController::class, 'searchLotesByColumn'])->name('inventario.productos.lotes.search');
Route::get('/inventarios/{id}/productos/{id}/lotes/create', [LoteController::class, 'viewCreateLote'])->name('inventario.productos.lotes.create');
Route::post('/inventarios/{id}/productos/{id}/lotes/store', [LoteController::class, 'createLote'])->name('inventario.productos.lotes.store');
Route::get('/inventarios/{id}/productos/{id}/lotes/edit/{id}', [LoteController::class, 'viewUpdateLote'])->name('inventario.productos.lotes.edit');
Route::put('/inventarios/{id}/productos/{id}/lotes/update/{id}', [LoteController::class, 'updateLote'])->name('inventario.productos.lotes.update');
Route::delete('/inventarios/{id}/productos/{id}/lotes/delete/{id}', [LoteController::class, 'deleteLote'])->name('inventario.productos.lotes.delete');

