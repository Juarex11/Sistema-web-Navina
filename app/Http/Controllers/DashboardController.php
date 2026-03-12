<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin\SiteInfo;
use App\Models\Admin\SiteComentario;

class DashboardController extends Controller
{
    public function index()
    {
        $info = SiteInfo::first();

        if (!$info)
        {
            $info = SiteInfo::create([
                'localizacion' => '',
                'telefono' => '',
                'correo' => '',
                'horario' => ''
            ]);
        }

        $comments = SiteComentario::latest()->get();

        return view('dashboard',compact('info','comments'));
    }
}
