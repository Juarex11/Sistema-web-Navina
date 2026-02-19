<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteComentario;
use Illuminate\Support\Facades\Storage;
class SiteComentarioController extends Controller
{
    public function index()
    {
        $comments = SiteComentario::latest()->get();
        $info = SiteInfo::first(); // si lo usas arriba

        return view('dashboard', compact('comments', 'info'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //SiteComentario::create($request->all());
        //return back()->with('success','Guardado correctamente');
        $request->validate([
            'cliente' => 'required|string|max:255',
            'comentario' => 'required|string',
            'calificacion' => 'nullable|numeric',
            'fecha' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $rutaFoto = null;

        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('comments','public');
        }

        SiteComentario::create([
            'cliente' => $request->cliente,
            'comentario' => $request->comentario,
            'calificacion' => $request->calificacion,
            'fecha' => $request->fecha,
            'foto' => $rutaFoto,
        ]);

        return back()->with('success', 'Guardado correctamente');
    }

    public function edit(SiteComentario $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, SiteComentario $comment)
    {
        //$comment->update($request->all());
        //return back();
        $request->validate([
            'cliente' => 'required|string|max:255',
            'comentario' => 'required|string',
            'calificacion' => 'nullable|numeric',
            'fecha' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($comment->foto) {
                Storage::disk('public')->delete($comment->foto);
            }
            $rutaFoto = $request->file('foto')->store('comments','public');
            $comment->foto = $rutaFoto;
        }

        $comment->cliente = $request->cliente;
        $comment->comentario = $request->comentario;
        //$comment->calificacion = $request->calificacion;
        //$comment->fecha = $request->fecha;
        $comment->save();

        return back()->with('success', 'Comentario actualizado correctamente');
    }

    public function destroy(SiteComentario $comment)
    {
        //$comment->delete();
        //return back()->with('success', 'Comentario eliminado correctamente');

        //"php artisan storage:link" para crear el enlace simbólico a la carpeta de almacenamiento
        if ($comment->foto) {
            Storage::disk('public')->delete($comment->foto);
        }

        $comment->delete();

        return back()->with('success', 'Comentario eliminado correctamente');
    }
}