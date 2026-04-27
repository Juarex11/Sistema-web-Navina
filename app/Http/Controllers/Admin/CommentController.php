<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::query()
        ->when($request->search, function ($query) use ($request) 
        {$query->where('client','like', '%'.$request->search.'%' );})->latest()->get();

        $info = SiteInfo::first();

        return view('admin.comments.index', compact('comments', 'info'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client' => 'required|string|max:255',
            'commentary' => 'required|string',
            'calification' => 'required|numeric|between:0,10',
            'date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $rutaFoto = null;
        if ($request->hasFile('photo')) {
            $rutaFoto = $request->file('photo')->store('comments','public');
        }

        Comment::create([
            'client' => $request->client,
            'commentary' => $request->commentary,
            'calification' => $request->calification,
            'date' => $request->date,
            'photo' => $rutaFoto,
        ]);

        return back()->with('success', 'Comentario creado con éxito');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'client' => 'required|string|max:255',
            'commentary' => 'required|string',
            'calification' => 'required|numeric|between:0,10',
            'date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($comment->photo) {
                Storage::disk('public')->delete($comment->photo);
            }
            $rutaFoto = $request->file('photo')->store('comments','public');
            $comment->photo = $rutaFoto;
        }
        
        if ($request->has('delete_foto') && $comment->photo) {
            Storage::disk('public')->delete($comment->photo);
            $comment->photo = null;
        }

        $comment->client = $request->client;
        $comment->commentary = $request->commentary;
        $comment->calification = $request->calification;
        $comment->date = $request->date;
        $comment->save();

        return back()->with('success', 'Comentario actualizado correctamente');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->photo) {
            Storage::disk('public')->delete($comment->photo);
        }
        $comment->delete();
        return back()->with('success', 'Comentario eliminado correctamente');
    }
}