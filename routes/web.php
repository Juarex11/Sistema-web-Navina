<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SiteComentarioController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SubcategoryController;

use App\Http\Controllers\Public\AboutUsController as PublicAboutUsController;
 use App\Http\Controllers\Public\DeliveryController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\OffersController;
use App\Http\Controllers\Public\ProductsController;

// Main Routes (accessible by all users)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductsController::class, 'details'])->name('products.details');
Route::get('/latest-products', [ProductsController::class, 'latest'])->name('products.latest');

Route::get('/offers', [OffersController::class, 'index'])->name('offers');

Route::get('/about', [PublicAboutUsController::class, 'index'])->name('aboutUs');

Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');

// Ruta necesaria para el modal promocional
Route::post('/subcription', [ClientController::class, 'store'])->name('subcription');


// Guest-only routes (auth pages)
Route::middleware(['guest'])->group(function () {
    // Authentication routes will be here if needed
});


// Admin routes

Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {

    Route::get('', function () {
        return redirect()->route('admin.products.index');
    });

    // Policies Routes
    Route::get('policies', [PrivacyPolicyController::class, 'index'])->name('policies.index');
    Route::patch('policies', [PrivacyPolicyController::class, 'update'])->name('policies.update');
    // Route::get('policies/test', [PrivacyPolicyController::class, 'store']);

    // Services Routes
    Route::resource('services', ServicesController::class);

    // About Us Routes
    Route::get('aboutUs', [AboutUsController::class, 'index'])->name('aboutUs.index');
    Route::patch('aboutUs', [AboutUsController::class, 'update'])->name('aboutUs.update');
    // Route::get('aboutUs/test', [AboutUsController::class, 'store']);

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Site Info Routes
    Route::get('siteinfo', [SiteInfoController::class, 'index'])->name('siteinfo.index');
    Route::patch('siteinfo', [SiteInfoController::class, 'update'])->name('siteinfo.update');
    Route::get('siteinfo/test', [SiteInfoController::class, 'store']);

    // Site Comments Routes
    Route::resource('comments', SiteComentarioController::class);

    // Products Routes
    Route::resource('products', ProductController::class);

    // Categories Routes
    Route::resource('categories', CategoryController::class);

    // Subcategories Routes
    Route::resource('subcategories', SubcategoryController::class);

    // Clients
    Route::resource('clients', ClientController::class);
});

// Clients Routes
require __DIR__ . '/modules/client.php';

require __DIR__ . '/auth.php';
