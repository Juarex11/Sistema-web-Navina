<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrivacyPolicyController extends Controller
{

    public function index()
    {
        $policy = PrivacyPolicy::first();
        return view('admin.policies.index', compact('policy'));
    }



    public function update(Request $request)
    {
        $policy = PrivacyPolicy::first();

        // Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        // Si se sube nueva imagen
        if ($request->hasFile('image')) {

            // Eliminar imagen anterior si existe
            if ($policy->image && Storage::disk('public')->exists($policy->image)) {
                Storage::disk('public')->delete($policy->image);
            }

            // Guardar nueva imagen
            $path = $request->file('image')->store('policies', 'public');
            $policy->image = $path;
        }

        // Actualizar datos
        $policy->title = $request->title;
        $policy->description = $request->description;

        $policy->save();

        return back()->with('success', 'Artículo actualizado correctamente');
    }


    // Test 
    public function store(Request $request)
    {
        PrivacyPolicy::create([
            'title' => 'Política de Privacidad de Navi Natubellez',

            'description' => '1. Introducción
                        En Navi Natubelleza, valoramos y respetamos la privacidad de nuestros clientes y visitantes. Esta Política de Privacidad describe cómo recopilamos, utilizamos y protegemos la información personal que nos proporcionas a través de nuestro sitio web https://navinatubelleza.com.​
                
                        2. Información que Recopilamos
                        Podemos recopilar los siguientes datos personales cuando interactúas con nuestro sitio:​
                        - Nombre completo
                        - Dirección de correo electrónico
                        - Número de teléfono
                
                        3. Uso de la Información
                        Utilizamos la información recopilada para:​
                        - Procesar y gestionar tus pedidos
                        - Proporcionar atención al cliente
                        - Enviar comunicaciones relacionadas con tus compras
                        - Personalizar tu experiencia en nuestro sitio
                        - Enviar promociones y ofertas especiales (si has dado tu consentimiento)
                        - Cumplir con obligaciones legales y fiscales​
                
                        4. Compartir Información con Terceros
                        No vendemos ni alquilamos tu información personal a terceros. Podemos compartir tus datos con proveedores de servicios que nos ayudan a operar nuestro negocio, como empresas de envío y procesadores de pagos, siempre bajo estrictas medidas de confidencialidad.​
                
                        5. Seguridad de la Información
                        Implementamos medidas de seguridad técnicas y organizativas para proteger tus datos personales contra accesos no autorizados, pérdida o destrucción. Sin embargo, ningún sistema es completamente seguro, por lo que no podemos garantizar la seguridad absoluta de tu información.​
                
                        6. Derechos del Usuario
                        Tienes derecho a acceder, rectificar, actualizar o eliminar tus datos personales. Para ejercer estos derechos, puedes contactarnos a través de navinatubelleza@gmail.com .​
                
                        7. Cookies y Tecnologías Similares
                        Utilizamos cookies para mejorar tu experiencia en nuestro sitio web, analizar el tráfico y personalizar el contenido. Puedes configurar tu navegador para rechazar las cookies, aunque esto puede afectar la funcionalidad del sitio.​
                
                        8. Cambios en la Política de Privacidad
                        Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Cualquier cambio será publicado en esta página con una nueva fecha de actualización.​
                
                        9. Contacto
                        Si tienes preguntas o inquietudes sobre esta Política de Privacidad, puedes contactarnos en:​
                        - Correo electrónico: navinatubelleza@gmail.com
                        - Dirección:  Puerto Maldonado/Tambopata',

            'image' => 'policies/test.png',
        ]);

        return 'Policy test created';
    }
}
