<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteInfo;
class SiteInfoController extends Controller
{
    public function edit()
    {
        $Info = SiteInfo::first(); // Obtener la información del sitio (asumiendo que solo hay una)

        if (!$Info) {
            // Si no existe, crear una nueva instancia
            $Info = SiteInfo::create([
                'localizacion' => '-',
                'telefono' => '-',
                'correo' => '-',
                'horario' => '-',
            ]);
        }

        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'horario' => 'required|string|max:255',
        ]);

        $Info = SiteInfo::first();

        $Info->update($request->only([
            'localizacion',
            'telefono',
            'correo',
            'horario'
        ]));

        return back()->with('success', 'Información del sitio actualizada correctamente');
    }
}
