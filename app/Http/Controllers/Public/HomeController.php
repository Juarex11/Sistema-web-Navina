<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {

        $products = Product::where('status', 'active')->with('images')->take(8)->get();

        return view('public.home.index', compact('products'));

    }
}
