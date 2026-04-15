<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use App\Models\Product;
use App\Models\Promotion;

class HomeController extends Controller
{
    public function index()
    {

        $info = SiteInfo::first();
        $products = Product::where('status', 'active')->with('images')->take(8)->get();
        $promotions = Promotion::where('status', 1)->latest()->get();

        return view('public.home.index', compact('info', 'products', 'promotions'));
    }
}
