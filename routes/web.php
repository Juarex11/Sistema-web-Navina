<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CorreoController;

// 🔥 Ruta principal simple
Route::get('/', function () {
    return "Proyecto en Funcionamiento";
});

// 🔥 TUS MÓDULOS
Route::resource('blogs', BlogController::class);
Route::resource('correos', CorreoController::class);