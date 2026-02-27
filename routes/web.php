<?php

//crea automáticamente las rutas para listar,
//  crear, editar, actualizar y eliminar productos.

use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'catalogo'])->name('catalogo');
Route::resource('productos', ProductoController::class);

