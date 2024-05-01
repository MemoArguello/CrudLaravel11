<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('layout');
});


/**
 * Rutas para los productos
 */

Route::get("/producto", [ProductoController::class, 'index'])->name("producto.index");
Route::get("/producto/create",[ProductoController::class, 'create'])->name("producto.create");
Route::post("/producto", [ProductoController::class, 'store'])->name("producto.store");
Route::get("/producto/{id}",[ProductoController::class,'editar'])->name("producto.editar");
Route::put("/producto/{id}",[ProductoController::class,'update'])->name("producto.update");