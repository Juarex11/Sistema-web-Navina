<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index() {

        $policy = PrivacyPolicy::first();
        return view('public.policies.index', compact('policy'));

    }
}
