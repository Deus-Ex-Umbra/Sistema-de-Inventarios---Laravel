<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;

Route::get('/inventarios', [InventarioController::class, 'viewAllInventarios'])->name('inventario.index');
Route::get('/inventarios/create', [InventarioController::class, 'viewCreateInventario'])->name('inventario.create');
Route::post('/inventarios/create', [InventarioController::class, 'createInventario'])->name('inventario.store');
Route::get('/inventarios/edit/{id_inventario}', [InventarioController::class, 'viewUpdateInventario'])->name('inventario.edit');
Route::put('/inventarios/update/{id_inventario}', [InventarioController::class, 'updateInventario'])->name('inventario.update');
Route::delete('/inventarios/delete/{id_inventario}', [InventarioController::class, 'deleteInventario'])->name('inventario.delete');
Route::post('/inventarios/search', [InventarioController::class, 'searchInventariosByColumn'])->name('inventario.search');
Route::get('/inventarios/{id_inventario}/productos', [ProductoController::class, 'viewAllProductosByInventario'])->name('inventario.productos');
Route::get('/inventarios/{id_inventario}/productos/create', [ProductoController::class, 'viewCreateProducto'])->name('producto.create');
Route::post('/inventarios/productos/create', [ProductoController::class, 'createProducto'])->name('producto.store');