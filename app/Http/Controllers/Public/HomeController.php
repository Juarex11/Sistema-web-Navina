<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\SiteInfo;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {

        $services = Service::all();
        $blogs = Blog::latest()->take(3)->get();
        $products = Product::where('status', 'active')->with('images')->take(8)->get();
        $promotions = Promotion::where('status', 1)->latest()->get();

        return view('public.home.index', compact('products', 'promotions', 'services', 'blogs'));
    }
}
