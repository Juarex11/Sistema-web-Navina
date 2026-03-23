<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $categories = $query->paginate(5)->withQueryString();
        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean'
        ]);

        $data['slug'] = Str::slug($data['name']);

        Category::create($data);
        return back();
    }

    public function show() {}

    public function edit() {}

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|boolean'
        ]);
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        return back();
    }

    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return back();
    }
}
