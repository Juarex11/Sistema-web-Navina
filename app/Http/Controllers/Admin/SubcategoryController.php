<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Subcategory::with('category');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('name','like',"%{$search}%");
        }

        $subcategories = $query->paginate(5)->withQueryString();
        $categories = Category::all();
        return view("admin.subcategories.index", compact("subcategories","categories"));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);

        Subcategory::create($data);
        return redirect()->route('subcategories.index')->with('success','Subcategoría creada con éxito');
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id'
        ]);

        $subcategory->update($data);
        return redirect()->route('subcategories.index')->with('success','Subcategoría actualizada con éxito');
    }

    public function destroy(Subcategory $subcategory)
    {
    $subcategory->delete();

    return redirect()->route('subcategories.index')->with('success','Subcategoría eliminada con éxito');
    }
}
