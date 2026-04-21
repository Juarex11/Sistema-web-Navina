<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQContoller extends Controller
{
    public function index()
    {
        $questions = FAQ::orderBy('orden')->get();

        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|string|max:1000',
            'respuesta' => 'required|string|max:2000',
            'orden' => 'nullable|integer|min:0',
            'activo' => 'boolean'
        ]);

        FAQ::create([
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta,
            'orden' => $request->orden ?? 0,
            'activo' => $request->boolean('activo', true)
        ]);

        return back()
            ->with('success', 'Pregunta frecuente creada exitosamente.');
    }

    public function edit(FAQ $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, FAQ $question)
    {
        $request->validate([
            'pregunta' => 'required|string|max:1000',
            'respuesta' => 'required|string|max:2000',
            'orden' => 'nullable|integer|min:0',
            'activo' => 'boolean'
        ]);

        $question->update([
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta,
            'orden' => $request->orden ?? 0,
            'activo' => $request->boolean('activo', true)
        ]);

        return back()->with('success', 'Pregunta frecuente actualizada exitosamente.');
    }

    public function destroy(FAQ $question)
    {
        $question->delete();

        return back()
            ->with('success', 'Pregunta frecuente eliminada exitosamente.');
    }
}
