<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

Route::get('/proveedores', [ProveedorController::class, 'viewAllProveedores'])->name('proveedor.index');
Route::get('/proveedores/create', [ProveedorController::class, 'viewCreateProveedor'])->name('proveedor.create');
Route::post('/proveedores/create', [ProveedorController::class, 'createProveedor'])->name('proveedor.store');
Route::get('/proveedores/edit/{id_proveedor}', [ProveedorController::class, 'viewUpdateProveedor'])->name('proveedor.edit');
Route::put('/proveedores/update/{id_proveedor}', [ProveedorController::class, 'updateProveedor'])->name('proveedor.update');
Route::delete('/proveedores/delete/{id_proveedor}', [ProveedorController::class, 'deleteProveedor'])->name('proveedor.delete');
Route::post('/proveedores/search', [ProveedorController::class, 'searchProveedoresByColumn'])->name('proveedor.search');
