<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Comment;
# use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class SiteComentarioController extends Controller
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
            'calification' => 'nullable|numeric|between:0,10',
            'date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $rutaFoto = null;
        if ($request->hasFile('photo')) {
            $rutaFoto = $request->file('photo')->store('comments','public');
        }

        Comment::create([
            'cliente' => $request->cliente,
            'comentario' => $request->comentario,
            'calificacion' => $request->calificacion,
            'fecha' => $request->fecha,
            'foto' => $rutaFoto,
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
            'calification' => 'nullable|numeric|between:0,10',
            'date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($comment->foto) {
                Storage::disk('public')->delete($comment->foto);
            }
            $rutaFoto = $request->file('foto')->store('comments','public');
            $comment->foto = $rutaFoto;
        }
        
        if ($request->has('delete_foto') && $comment->foto) {
            Storage::disk('public')->delete($comment->foto);
            $comment->foto = null;
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
        if ($comment->foto) {
            Storage::disk('public')->delete($comment->foto);
        }
        $comment->delete();
        return back()->with('success', 'Comentario eliminado correctamente');
    }
}