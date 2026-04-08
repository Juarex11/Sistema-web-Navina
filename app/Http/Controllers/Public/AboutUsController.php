<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $info = SiteInfo::first();
        return view('public.about.index', compact('info'));
    }
}
