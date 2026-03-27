<?php

use App\Http\Controllers\Public\ProductController;

Route::get('/productos/ofertas', [ProductController::class,'offers'])->name('store.products.offers');
//antes era la ruta: public.offers

Route::get('/productos/{id}', [ProductController::class, 'details'])->name('store.products.details');