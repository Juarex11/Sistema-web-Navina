<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public  function index() {

        $products = Product::with('images')
            ->where('discount', '>', 0)
            ->where('status', 1)
            ->latest()
            ->take(9)
            ->get();
        return view('public.offers.index', compact('products'));

    }
}
