<?php
namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    }

    public function offers()
    {
        $products = Product::with('images')
            ->where('discount','>',0)
            ->where('status',1)
            ->latest()
            ->take(9)
            ->get();

        return view('store.products.offers', compact('products'));
    }

    public function details($id)
    {
    $product = Product::with('images')
        ->where('status',1)
        ->findOrFail($id);

    return view('store.products.details', compact('product'));
    }
}
