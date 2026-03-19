<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(request $request)
    {
        // Obtener los productos con relaciones
        $query = Product::with('category','images');

        // Filtrar si hay búsqueda
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhereHas('category', function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%");
                });
            });
        }

        $products = $query->paginate(5)->withQueryString();
        $categories = Category::all();
        return view("admin.products.index", compact("products","categories"));
    }

    public function create()
    {}

    public function store(Request $request)
    {
        //Guardar un nuevo producto
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'benefits'    => 'nullable|string',
            'status'      => 'required|boolean',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'discount'   => 'required|numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048'
        ]);
        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products','public'); // storage/app/public/products
                Image::create([
                    'product_id'=> $product->id,
                    'name'      => $file->getClientOriginalName(),
                    'directory' => $path,
                    'order'     => 0
                ]);
            }
        }   

    return redirect()->route('products.index')->with('success','Producto creado con éxito');
    }

    public function show()
    {}

    public function edit(Product $product)
    {}

    public function update(Request $request, Product $product)
    {
        //Actualizar producto existente
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'sub_category' => 'nullable|string|max:100',
            'benefits'    => 'nullable|string',
            'status'      => 'required|boolean',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'discount'   => 'required|numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=500,min_height=500,max_width=2200,max_height=2200'
        ]);
        $product->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products','public'); // storage/app/public/products
                Image::create([
                    'product_id'=> $product->id,
                    'name'      => $file->getClientOriginalName(),
                    'directory' => $path,
                    'order'     => 0
                ]);
            }
        }   

        return redirect()->route('products.index')->with('success','Producto actualizado con éxito');
    }

    public function destroy(Product $product)
    {
        //Eliminar un registro
        foreach ($product->images as $image) {
            if (Storage::disk('public')->exists($image->directory)) {
            Storage::disk('public')->delete($image->directory);
            }
        }

        $product->delete();
        return redirect()->route('products.index')->with('success','Producto eliminado con éxito');
    }
}
