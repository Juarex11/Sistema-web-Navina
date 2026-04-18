<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        $blogs = Blog::with('category')->latest()->get();
        $categories = Category::all();
        
        return view('public.blog.index', compact('blogs', 'categories'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        $relatedBlogs = Blog::where('id', '!=', $id)
            ->where('category_id', $blog->category_id)
            ->latest()
            ->take(3)
            ->get();
            
        return view('public.blog.show', compact('blog', 'relatedBlogs'));
    }
}
