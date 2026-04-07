<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
{
    $query = Blog::with('category');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%$search%")
              ->orWhereHas('category', function($q2) use ($search) {
                  $q2->where('name', 'like', "%$search%");
              });
        });
    }

    $blogs = $query->paginate(5)->withQueryString();
    $categories = Category::all();
    return view('blogs.index', compact('blogs', 'categories'));
}

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'directory'   => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        if ($request->hasFile('directory')) {
            $data['directory'] = $request->file('directory')->store('blogs', 'public');
        }

        Blog::create($data);
        return redirect()->route('blogs.index')->with('success', 'Blog creado exitosamente');
    }

    public function show(string $id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'directory'   => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        if ($request->hasFile('directory')) {
            $data['directory'] = $request->file('directory')->store('blogs', 'public');
        }

        $blog->update($data);
        return redirect()->route('blogs.index')->with('success', 'Blog actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog eliminado exitosamente');
    }
}