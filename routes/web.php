<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\SiteInfo;
use App\Models\SiteComentario;
use App\Http\Controllers\SiteComentarioController;
use App\Http\Controllers\SiteInfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::put('/siteinfo', [SiteInfoController::class, 'update'])->name('siteinfo.update');
Route::delete('/comments/{comment}', [SiteComentarioController::class, 'destroy'])->name('comments.destroy');


Route::get('/dashboard', function () {

    $info = SiteInfo::first();

    if(!$info){
        $info = SiteInfo::create([
            'localizacion'=>'',
            'telefono'=>'',
            'correo'=>'',
            'horario'=>''
        ]);
    }

    $comments = SiteComentario::latest()->get();

    return view('dashboard', compact('info','comments'));



})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/siteinfo', [SiteInfoController::class, 'index'])->name('admin.siteinfo');
    Route::put('/siteinfo', [SiteInfoController::class, 'update'])->name('siteinfo.update');

    Route::get('/comments', [SiteComentarioController::class, 'index'])->name('admin.comments');
    Route::post('/comments', [SiteComentarioController::class, 'store'])->name('comments.store');
    Route::put('/comments/{id}', [SiteComentarioController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{id}', [SiteComentarioController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__.'/auth.php';
