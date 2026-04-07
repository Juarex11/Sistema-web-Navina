<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correo;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Correo::query();

        if($request->filled('search')){
            $search = $request->search;
            $query->where(function($q) use ($search){
                    $q->where('nombre', 'like', "%$search%")
                    ->orWhere('apellido', 'like', "%$search%")
                    ->orWhere('telefono', 'like', "%$search%")
                    ->orWhere('distrito', 'like', "%$search%")
                    ->orWhere('correo', 'like', "%$search%");
            });
        }

        $correos = $query->paginate(5)->withQueryString();
        return view('correos.index', compact('correos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('correos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'distrito' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'mensaje' => 'nullable|string',
        ]);
        Correo::create($request->all());
        return redirect()->route('correos.index')->with('success', 'Correo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $correo = Correo::findOrFail($id);
        return view('correos.show', compact('correo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $correo = Correo::findOrFail($id);
        return view('correos.edit', compact('correo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $correo = Correo::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'distrito' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'mensaje' => 'nullable|string',
        ]);
        $correo->update($request->all());
        return redirect()->route('correos.index')->with('success', 'Correo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $correo = Correo::findOrFail($id);
        $correo->delete();
        return redirect()->route('correos.index')->with('success', 'Correo eliminado exitosamente.');
    }
}
