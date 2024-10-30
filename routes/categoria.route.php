<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/categorias', [CategoriaController::class, 'viewAllCategorias'])->name('categoria.index');
Route::get('/categorias/create', [CategoriaController::class, 'viewCreateCategoria'])->name('categoria.create');
Route::post('/categorias/create', [CategoriaController::class, 'createCategoria'])->name('categoria.store');
Route::get('/categorias/edit/{id_categoria}', [CategoriaController::class, 'viewUpdateCategoria'])->name('categoria.edit');
Route::put('/categorias/update/{id_categoria}', [CategoriaController::class, 'updateCategoria'])->name('categoria.update');
Route::delete('/categorias/delete/{id_categoria}', [CategoriaController::class, 'deleteCategoria'])->name('categoria.delete');