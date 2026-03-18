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

/*
|--------------------------------------------------------------------------
| BUSCADOR
|--------------------------------------------------------------------------
*/

Route::get('/direcciones/buscar', [DireccionController::class, 'buscar'])
    ->name('direcciones.buscar');


/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------
*/

// Mostrar registro individual
Route::get('/direcciones/{id}', [DireccionController::class, 'show'])
    ->name('direcciones.show');

// Formulario editar
Route::get('/direcciones/{id}/editar', [DireccionController::class, 'edit'])
    ->name('direcciones.edit');

// Actualizar
Route::put('/direcciones/{id}', [DireccionController::class, 'update'])
    ->name('referencias.update');

// Eliminar
Route::delete('/direcciones/{id}', [DireccionController::class, 'destroy'])
    ->name('direcciones.destroy');
