<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index() {

        $info = SiteInfo::first();
        $products = Product::where('status', 'active')->with('images')->take(8)->get();
        $promotions = Promotion::where('status', 1)->latest()->get();
        $blogs = Blog::with('category')->latest()->take(3)->get();
        
        return view('public.home.index', compact('info', 'products','promotions', 'blogs'));

    }
}
