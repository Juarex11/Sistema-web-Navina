<?php

namespace App\Http\Controllers;

use App\Models\PreguntaFrecuente;
use Illuminate\Http\Request;

class PreguntaFrecuenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pregunta_frecuentes = PreguntaFrecuente::orderBy('orden')->get();
        return view('preguntas-frecuentes.index', compact('pregunta_frecuentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('preguntas-frecuentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|string|max:1000',
            'respuesta' => 'required|string|max:2000',
            'orden' => 'nullable|integer|min:0',
            'activo' => 'boolean'
        ]);

        $pregunta = PreguntaFrecuente::create([
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta,
            'orden' => $request->orden ?? 0,
            'activo' => $request->boolean('activo', true)
        ]);

        return redirect()
            ->route('preguntas-frecuentes.index')
            ->with('success', 'Pregunta frecuente creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreguntaFrecuente $preguntaFrecuente)
    {
        return view('preguntas-frecuentes.edit', compact('preguntaFrecuente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PreguntaFrecuente $preguntaFrecuente)
    {
        $request->validate([
            'pregunta' => 'required|string|max:1000',
            'respuesta' => 'required|string|max:2000',
            'orden' => 'nullable|integer|min:0',
            'activo' => 'boolean'
        ]);

        $preguntaFrecuente->update([
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta,
            'orden' => $request->orden ?? 0,
            'activo' => $request->boolean('activo', true)
        ]);

        return redirect()
            ->route('preguntas-frecuentes.index')
            ->with('success', 'Pregunta frecuente actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreguntaFrecuente $preguntaFrecuente)
    {
        $preguntaFrecuente->delete();

        return redirect()
            ->route('preguntas-frecuentes.index')
            ->with('success', 'Pregunta frecuente eliminada exitosamente.');
    }
}
