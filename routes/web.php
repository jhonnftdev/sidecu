<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DireccionController;

Route::get('/', [DireccionController::class, 'index'])->name('home');
