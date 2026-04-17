<?php

use App\Http\Controllers\Admin\PrivacyPolicyController;
use Illuminate\Support\Facades\Route;

Route::resource('policies', PrivacyPolicyController::class)->only(['index', 'update']);;