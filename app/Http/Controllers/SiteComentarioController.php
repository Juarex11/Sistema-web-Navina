<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteComentario;
class SiteComentarioController extends Controller
{
    public function index()
    {
        $comments = SiteComentario::latest()->get();
        return back();
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        SiteComentario::create($request->all());
        return back()->with('success','Guardado correctamente');
    }

    public function edit(SiteComentario $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, SiteComentario $comment)
    {
        $comment->update($request->all());
        return back();
    }

    public function destroy(SiteComentario $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comentario eliminado correctamente');
    }
}