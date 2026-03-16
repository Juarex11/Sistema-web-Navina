<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;

class HomeController extends Controller
{
    public function index() {

        $info = SiteInfo::first();

        return view('public.home.index', compact('info'));

    }
}
