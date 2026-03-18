<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DireccionController;

Route::get('/', [DireccionController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| CREAR DIRECCIÓN
|--------------------------------------------------------------------------
*/

Route::get('/crear-direccion', [DireccionController::class, 'create'])
    ->name('direcciones.create');

Route::post('/direcciones', [DireccionController::class, 'store'])
    ->name('direcciones.store');


/*
|--------------------------------------------------------------------------
| LISTAR DIRECCIONES
|--------------------------------------------------------------------------
*/

Route::get('/listar-direcciones', [DireccionController::class, 'listar'])
    ->name('direcciones.listar');

