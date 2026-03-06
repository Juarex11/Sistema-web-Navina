<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteComentarioController;
use App\Http\Controllers\SiteInfoController;
use Laravel\Mcp\Enums\Role;

Route::middleware(['guest'])->group(function() {

    // Main Roote

    Route::get('/', function() {
        return view('welcome');
    });

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


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/siteinfo', [SiteInfoController::class, 'index'])->name('admin.siteinfo');
    Route::get('/siteinfo/test', [SiteInfoController::class, 'store']);
    Route::put('/siteinfo', [SiteInfoController::class, 'update'])->name('siteinfo.update');

    Route::get('/comments', [SiteComentarioController::class, 'index'])->name('admin.comments');
    Route::post('/comments', [SiteComentarioController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [SiteComentarioController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [SiteComentarioController::class, 'destroy'])->name('comments.destroy');

});

require __DIR__.'/auth.php';
