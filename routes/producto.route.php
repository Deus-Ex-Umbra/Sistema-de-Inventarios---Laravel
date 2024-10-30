<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoteController;

Route::get('/productos', [ProductoController::class, 'viewAllProductos'])->name('producto.index');
#Route::get('/productos/create', [ProductoController::class, 'viewCreateProducto'])->name('producto.create');
#Route::post('/productos/create', [ProductoController::class, 'create'])->name('producto.store');
Route::get('/productos/edit/{id_producto}', [ProductoController::class, 'viewUpdateProducto'])->name('producto.edit');
Route::put('/productos/update/{id_producto}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/productos/delete/{id_producto}', [ProductoController::class, 'delete'])->name('producto.delete');
Route::post('/productos/search', [ProductoController::class, 'searchProductosByColumn'])->name('producto.search');
Route::get('/productos/{id_producto}/lotes', [LoteController::class, 'viewAllLotesByProducto'])->name('producto.lotes');
Route::get('/productos/{id_producto}/lotes/create', [LoteController::class, 'viewCreateLote'])->name('lote.create');
Route::post('/productos/{id_producto}/lotes/create', [LoteController::class, 'create'])->name('lote.store');