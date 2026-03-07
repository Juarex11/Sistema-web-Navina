<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteInfo;
class SiteInfoController extends Controller
{
    public function index()
    {
        $info = SiteInfo::first();
        return view('admin.admin-siteInfo.index', compact('info'));
    }


    public function store() {

        SiteInfo::create([
            'localizacion' => 'example',
            'telefono' => 'example',
            'correo' => 'example',
            'horario' => 'example'
        ]);

        return 'Site info test';

    }
    
    public function edit()
    {
        $Info = SiteInfo::first(); // Obtener la información del sitio

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
