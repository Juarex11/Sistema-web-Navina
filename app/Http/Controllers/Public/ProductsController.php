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

        $products = $query->paginate(8)->withQueryString();

        $categories = Category::all();
        return view('public.products.index', compact('info', 'products', 'categories'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
