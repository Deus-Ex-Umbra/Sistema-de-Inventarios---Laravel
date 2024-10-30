<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/inventario.route.php';
require __DIR__.'/producto.route.php';
require __DIR__.'/lote.route.php';
require __DIR__.'/marca.route.php';
require __DIR__.'/categoria.route.php';
require __DIR__.'/proveedor.route.php';
