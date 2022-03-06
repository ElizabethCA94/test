<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductosController;



Route::get('', [HomeController::class, 'index']);
Route::get('/liz', function() {
    return 'uello';
})->middleware('peticion');

// Route::get('productos', [ProductosController::class, 'index']);
// // Route::resource('productos', ProductosController::class)->middleware('peticion');
Route::resource('admin/productos', ProductosController::class)->names('admin.productos')->middleware('peticion');
