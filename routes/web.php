<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('store.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.layout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //CRUDs
    require __DIR__.'/modules/privacypolicy.php';
    require __DIR__.'/modules/product.php';
    require __DIR__.'/modules/category.php';
    });

require __DIR__.'/auth.php';


