<?php

use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SiteComentarioController;
use App\Http\Controllers\Admin\SiteInfoController;

use App\Models\Admin\SiteInfo; //dar contexto a Envios

Route::get('/', function () {
    return view('home');
});

Route::get('/Envios', function () {
    $info = SiteInfo::first(); //dar contexto a Envios
    return view('store/envios', [ 'info' => $info]);
});

Route::get('/Ofertas', function () {
    return view('store/ofertas');
});

Route::get('/Sobre-nosotros', function () {
    return view('store/sobre-nosotros');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');





Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/siteinfo', [SiteInfoController::class, 'index'])->name('admin.siteinfo');
    Route::put('/siteinfo', [SiteInfoController::class, 'update'])->name('siteinfo.update');

    Route::get('/comments', [SiteComentarioController::class, 'index'])->name('admin.comments');
    Route::post('/comments', [SiteComentarioController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [SiteComentarioController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [SiteComentarioController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__.'/auth.php';