<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductosController;



Route::get('', [HomeController::class, 'index']);
Route::resource('admin/productos', ProductosController::class)->names('admin.productos')->middleware('peticion');
