<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SiteComentarioController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProductsController;

Route::middleware(['guest'])->group(function () {

    // Main Rootes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/products', [ProductsController::class, 'index'])->name('products');

});


// Admin routes

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

    // Route::get('/admin/policies-test', [PrivacyPolicyController::class, 'store']);

    Route::get('/admin/policies', [PrivacyPolicyController::class, 'index'])->name('admin.policies');
    Route::patch('/admin/policies', [PrivacyPolicyController::class, 'update']);

    Route::get('/admin/services', [ServicesController::class, 'index'])->name('admin.services');
    Route::post('/admin/services', [ServicesController::class, 'store'])->name('service.create');
    Route::patch('/admin/services/{id}', [ServicesController::class, 'update'])->name('service.update');
    Route::delete('/admin/services/{id}', [ServicesController::class, 'destroy'])->name('service.delete');

    // Route::get('/admin/about-us/test', [AboutUsController::class, 'store']);

    Route::get('/admin/about-us', [AboutUsController::class, 'index'])->name('admin.aboutUs');
    Route::patch('/admin/about-us', [AboutUsController::class, 'update'])->name('aboutUs.update');
});


Route::middleware('auth')->group(function () {

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/siteinfo', [SiteInfoController::class, 'index'])->name('admin.siteinfo');
    Route::get('/admin/siteinfo/test', [SiteInfoController::class, 'store']);
    Route::put('/admin/siteinfo', [SiteInfoController::class, 'update'])->name('siteinfo.update');

    Route::get('/admin/comments', [SiteComentarioController::class, 'index'])->name('admin.comments');
    Route::post('/admin/comments', [SiteComentarioController::class, 'store'])->name('comments.store');
    Route::put('/admin/comments/{comment}', [SiteComentarioController::class, 'update'])->name('comments.update');
    Route::delete('/admin/comments/{comment}', [SiteComentarioController::class, 'destroy'])->name('comments.destroy');
});



Route::middleware('auth')->group(function () {

    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/categories', CategoryController::class);
    
});

require __DIR__ . '/auth.php';
