<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('admin.aboutus.index', compact('aboutUs'));
    }

    public function update(Request $request) {

        $aboutUs = AboutUs::first();
        
        $validate = $request->validate([
            'vision' => 'nullable|string',
            'mision' => 'nullable|string'
        ]);

        $aboutUs->update($validate);

        return redirect()->route('admin.aboutUs');

    }

    public function store()
    {

        AboutUs::create([

            'vision' => '
                Aspiramos a ser la marca líder en el mercado peruano de productos de belleza y cuidado personal, reconocida por nuestra excelencia, innovación y compromiso con la satisfacción del cliente. Nos proyectamos como una empresa que inspira y transforma vidas a través de la belleza, estableciendo estándares de calidad y servicio que nos posicionen como referentes en la industria.
            ',
            'mision' => '
                En Navi Natubelleza, nos comprometemos a ofrecer productos de belleza y cuidado personal de alta calidad que respetan y realzan la belleza natural de cada persona. Nuestra misión es brindar soluciones innovadoras, accesibles y conscientes que promuevan el bienestar, fortalezcan la autoestima y acompañen a nuestros clientes en su camino hacia el empoderamiento y el amor propio.
            '
        ]);

        return 'Mision and Vision Create Test';
    }

    
}
