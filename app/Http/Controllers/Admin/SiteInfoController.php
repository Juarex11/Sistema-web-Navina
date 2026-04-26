<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;

class SiteInfoController extends Controller
{
    public function index()
    {
        $info = SiteInfo::first();
        return view('admin.siteInfo.index', compact('info'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'localizacion' => 'required|string|max:255',
            'telefono'     => 'required|string|max:255',
            'correo'       => 'required|email|max:255',
            'horario'      => 'required|string|max:255',
        ]);

        // Upsert: si existe actualiza, si no crea
        SiteInfo::updateOrCreate(
            ['id' => 1], // asumimos un único registro
            $data
        );

        return back()->with('success', 'Información del sitio guardada correctamente');
    }
}