<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $info = SiteInfo::first();

        return view('public.home.index', compact('info'));

    }
}
