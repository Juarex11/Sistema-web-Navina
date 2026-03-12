<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; //Aca llama a Controller.php

use Illuminate\Http\Request;

use App\Models\Admin\SiteInfo;


class SiteInfoController extends Controller //Aca se utiliza
{
    public function index()
    {
        $info = SiteInfo::first();
        return view('admin.siteinfo.index', compact('info'));
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
