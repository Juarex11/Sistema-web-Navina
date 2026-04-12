@extends('app')

@section('content')

<div class="px-32 py-10 ">
    <p class="text-5xl font-extrabold text-center pb-6 
            bg-gradient-to-r from-pink-500 to-purple-500 
            bg-clip-text text-transparent">
            Contáctanos
            </p>
    <div class="w-28 h-1 bg-linear-to-r from-pink-500 to-purple-500 mx-auto rounded mb-6 "></div>

    <p class="text-gray-400 text-2xl text-center mx-64">Estamos aquí para ayudarte con cualquier consulta o servicio que necesites</p>

    <div class="grid grid-cols-2 gap-10 max-w-7xl mx-auto text-center py-10">
        <div class="px-16">
            
            <div class="w-[full] h-72 bg-white rounded-2xl p-3 shadow-lg">
                <div class="w-14 h-14 mx-auto rounded-full bg-white flex items-center justify-center">
                    <svg  class="w-9 h-9" fill="#fb64b6" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.42 9.49c-.19-.09-1.1-.54-1.27-.61s-.29-.09-.42.1-.48.6-.59.73-.21.14-.4 0a5.13 5.13 0 0 1-1.49-.92 5.25 5.25 0 0 1-1-1.29c-.11-.18 0-.28.08-.38s.18-.21.28-.32a1.39 1.39 0 0 0 .18-.31.38.38 0 0 0 0-.33c0-.09-.42-1-.58-1.37s-.3-.32-.41-.32h-.4a.72.72 0 0 0-.5.23 2.1 2.1 0 0 0-.65 1.55A3.59 3.59 0 0 0 5 8.2 8.32 8.32 0 0 0 8.19 11c.44.19.78.3 1.05.39a2.53 2.53 0 0 0 1.17.07 1.93 1.93 0 0 0 1.26-.88 1.67 1.67 0 0 0 .11-.88c-.05-.07-.17-.12-.36-.21z"></path><path d="M13.29 2.68A7.36 7.36 0 0 0 8 .5a7.44 7.44 0 0 0-6.41 11.15l-1 3.85 3.94-1a7.4 7.4 0 0 0 3.55.9H8a7.44 7.44 0 0 0 5.29-12.72zM8 14.12a6.12 6.12 0 0 1-3.15-.87l-.22-.13-2.34.61.62-2.28-.14-.23a6.18 6.18 0 0 1 9.6-7.65 6.12 6.12 0 0 1 1.81 4.37A6.19 6.19 0 0 1 8 14.12z"></path></g></svg>
                </div>
                <p class="font-extrabold text-xl mt-2 text-gray-900">WhatsApp</p>
                <p class="my-2 mx-6 text-gray-600">Contáctanos directamente a nuestro número de WhatsApp para una respuesta rápida</p>
                <p class="my-6 text-gray-600">+51 {{ $info->telefono }}</p>
        
                <a href="https://api.whatsapp.com/send/?phone=%2B51927987259&text&type=phone_number&app_absent=0" target="_blank" class="bg-pink-100 hover:bg-pink-200 border border-pink-200 text-pink-400 font-bold py-3 px-36 rounded-full ">
                    Enviar mensaje
                </a>
            </div>

            <div class="w-[full] h-72 bg-white rounded-2xl p-3 shadow-lg mt-10">
                <div class="w-14 h-14 mx-auto rounded-full bg-white flex items-center justify-center">
                    <svg class="w-9 h-9" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 30 30" version="1.1" id="svg822" inkscape:version="0.92.4 (f8dce91, 2019-08-02)" sodipodi:docname="email.svg" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs id="defs816"></defs> <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="17.833333" inkscape:cx="15" inkscape:cy="10.99181" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="true" units="px" inkscape:window-width="1366" inkscape:window-height="713" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" showguides="false"> <inkscape:grid type="xygrid" id="grid816"></inkscape:grid> </sodipodi:namedview> <metadata id="metadata819"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title> </dc:title> </cc:work> </rdf:rdf> </metadata> <g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-289.0625)"> <path style="opacity:1;fill:#fb64b6;fill-opacity:1;stroke:none;stroke-width:0.49999997;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 5 5 C 4.2955948 5 3.6803238 5.3628126 3.3242188 5.9101562 L 14.292969 16.878906 C 14.696939 17.282876 15.303061 17.282876 15.707031 16.878906 L 26.675781 5.9101562 C 26.319676 5.3628126 25.704405 5 25 5 L 5 5 z M 3 8.4140625 L 3 23 C 3 24.108 3.892 25 5 25 L 25 25 C 26.108 25 27 24.108 27 23 L 27 8.4140625 L 17.121094 18.292969 C 15.958108 19.455959 14.041892 19.455959 12.878906 18.292969 L 3 8.4140625 z " transform="translate(0,289.0625)" id="rect4592"></path> </g> </g></svg>
                </div>
                <p class="font-extrabold text-xl mt-2 text-gray-900">Correo Electrónico</p>
                <p class="my-2 mx-6 text-gray-600">Escríbenos a nuestro correo electrónico para consultas y cotizaciones</p>
                <p class="my-6 text-gray-600">{{ $info->correo }}</p>
        
                <a href="https://mail.google.com/mail/u/0/?fs=1&to={{ $info->correo }}&tf=cm" target="_blank" class="bg-pink-100 hover:bg-pink-200 border border-pink-200 text-pink-400 font-bold py-3 px-36 rounded-full ">
                    Enviar email
                </a>
            </div>
        </div>
        <div class="w-[full] h-[full] bg-white rounded-2xl p-3 shadow-lg">
            <div class="p-8 ">
                <p class="font-extrabold text-3xl mb-4 mt-2 text-gray-800 text-start">Envíanos un mensaje</p>
                <div class="w-28 h-1 bg-linear-to-r from-pink-500 to-purple-500  rounded mb-8 "></div>

                <form
                class="
                grid grid-cols-2 gap-4

                [&_input]:bg-gray-50
                [&_input]:rounded-2xl
                [&_input]:border
                [&_input]:border-gray-300
                [&_input]:p-4
                [&_input]:placeholder:text-gray-400
                [&_input]:focus:bg-white
                [&_input]:focus:border-none
                [&_input]:focus:ring-1
                [&_input]:focus:ring-pink-300
                [&_input]:focus:ring-opacity-50
                [&_input]:focus:outline-none
                [&_input]:transition
                [&_input]:duration-300
                [&_input]:ease-in-out
                ">

                    <input type="text" placeholder="Nombre">
                    <input type="text" placeholder="Apellido">

                    <input type="email" placeholder="Correo" class="col-span-2">

                    <input type="number" placeholder="Teléfono">
                    <input type="text" placeholder="Distrito">

                    <textarea
                        name="message"
                        class="col-span-2 min-h-36 bg-gray-50 rounded-2xl border border-gray-300 p-3 placeholder:text-gray-400
                            focus:bg-white focus:border-none focus:ring-1 focus:ring-pink-300 focus:outline-none focus:ring-opacity-50
                            transition duration-300 ease-in-out"
                        placeholder="Mensaje (mínimo 10 caracteres)"></textarea>

                    <button class=" bg-pink-100             
                                    bg-linear-to-r
                                    from-pink-500
                                    to-purple-500 
                                    text-white
                                    font-bold py-5 px-36 
                                    rounded-2xl col-span-2">
                        Enviar mensaje
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection