<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->get();
        $categories = Category::all();

        return view('public.blogs.index', compact('blogs', 'categories'));
    }

    public function show($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        $relatedBlogs = Blog::where('id', '!=', $id)
            ->where('category_id', $blog->category_id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.blogs.show', compact('blog', 'relatedBlogs'));
    }
}
