<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $info = SiteInfo::first();

        $query = Product::query();

        // filtro por categoría
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->price_range) {
            [$min, $max] = explode('-', $request->price_range);
            $query->whereBetween('price', [$min, $max]);
        }

        if ($request->searchProduct) {
            $query->where('name', 'like', '%' . $request->searchProduct . '%');
        }

        $products = $query->paginate(8)->withQueryString();

        $categories = Category::all();
        return view('public.products.index', compact('info', 'products', 'categories'));
    }


    public function offers()
    {
        $info = SiteInfo::first();
        $products = Product::with('images')
            ->where('discount', '>', 0)
            ->where('status', 1)
            ->latest()
            ->take(9)
            ->get();

        return view('public.products.components.offers', compact('products', 'info'));
    }


    public function details($id)
    {

        $info = SiteInfo::first();

        $product = Product::with('images')
            ->where('status', 1)
            ->findOrFail($id);

        return view('public.products.components.details', compact('product', 'info'));
    }
}
