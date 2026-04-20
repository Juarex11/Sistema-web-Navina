<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PromotionController;

Route::resource('promotions',PromotionController::class);