<?php

use App\Http\Controllers\Admin\PrivacyPolicyController;

Route::resource('policies', PrivacyPolicyController::class)->only(['index', 'update']);;