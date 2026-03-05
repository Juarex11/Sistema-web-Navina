<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Ruta para crear un usuario de test

Route::get('/user', [UserController::class, 'create'])->name('user');


Route::middleware(['guest'])->group(function() {

    // Main Roote

    Route::get('/', function() {
        return view('welcome');
    });

    // Auth Routes

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


// Admin routes

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/policies-test', [PrivacyPolicyController::class, 'store']);

    Route::get('/dashboard/policies', [PrivacyPolicyController::class, 'index'])->name('admin.policies');
    Route::patch('/dashboard/policies', [PrivacyPolicyController::class, 'update']);

    Route::get('/dashboard/services', [ServicesController::class, 'index'])->name('admin.services');
    Route::post('/dashboard/services', [ServicesController::class, 'store'])->name('service.create');
    Route::patch('/dashboard/services/{id}', [ServicesController::class, 'update'])->name('service.update');
    Route::delete('/dashboard/services/{id}', [ServicesController::class, 'destroy'])->name('service.delete');

    Route::get('/dashboard/about-us/test', [AboutUsController::class, 'store']);

    Route::get('/dashboard/about-us', [AboutUsController::class, 'index'])->name('admin.aboutUs');
    Route::patch('/dashboard/about-us', [AboutUsController::class, 'update'])->name('aboutUs.update');

});


