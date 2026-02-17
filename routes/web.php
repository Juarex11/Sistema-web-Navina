<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// User routes (Aun falta terminar)

Route::get('/user', [UserController::class, 'create'])->name('user');

// Auth Routes

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return view('/dashboard/dashboard');
})->middleware('auth');
