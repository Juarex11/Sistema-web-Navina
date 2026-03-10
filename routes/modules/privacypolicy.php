<?php

use App\Http\Controllers\PrivacyPolicyController;

Route::resource('policies', PrivacyPolicyController::class)->only(['index', 'update']);;