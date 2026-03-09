<div class="bg-gray-100">

    <div class="flex justify-center items-center w-full gap-2 text-4xl font-bold">
        <p class=" text-pink-400 py-2 ">Lo que dicen </p>
        <div class="bg-pink-400 px-2 py-4 rounded-lg">
            <p class=" text-white "> nuestros clientes</p>
        </div>
    </div>
    {{-- Comentarios --}}
    <div class="bg-white w-[360px] h-[200px] rounded-xl p-3 relative overflow-hidden">

        <!-- Encabezado -->
        <div class="flex items-center gap-3 relative z-10">
            <img src="{{ asset('images/Navina_logo.webp') }}" class="h-[60px] w-[60px] rounded-full">

            <div class="flex flex-col">
                <p class="font-semibold">NAVINA USER</p>
                <p class="text-pink-400">★★★★★</p>
            </div>
        </div>

        <!-- Fondo de comentarios -->
        <!-- <div class="absolute bottom-0 left-0 w-full h-[110px] bg-cover bg-center"
            style="background-image: url('{{ asset('images/bg_comment.jpg') }}');">
        </div> -->

        <!-- Caja del comentario -->
        <div class="absolute bottom-16 left-4 right-4 bg-white rounded-lg px-4 py-2 shadow-md z-10">
            <p>Hello World</p>
        </div>

    </div>

    {{-- MAPA --}}
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.9078821789903!2d-69.187475!3d-12.5883225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x917b4eb3cedf23fd%3A0x705e0b213d6de908!2s15%20De%20Agosto%20212%2C%20Puerto%20Maldonado%2017001!5e0!3m2!1ses!2spe!4v1772835375523!5m2!1ses!2spe"
            width="600"
            height="400"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="w-full"></iframe>
    </div>

    {{-- COLUMNAS --}}
    <div class="grid grid-cols-1 md:grid-cols-5 
              bg-white p-4 gap-6 text-gray-500
                md:py-[40px]">
        {{-- Columna 1 --}}
        <div>
            <img src="{{ asset('images/navina_logo.webp')}}" class="w-[120px] mx-auto">
            <p class="text-justify text-xs">Tu destino de belleza integral, donde la calidad y los mejores productos se unen para realzar tu belleza natural.</p>
        </div>

        {{-- Columna 2 --}}
        <div class="space-y-2">
            <h1 class="text-black text-lg ">Productos</h1>
            <ul class="space-y-2">
                <li><a href="#">Cuidado Capilar</a></li>
                <li><a href="#">Maquillaje</a></li>
                <li><a href="#">Cuidado corporal</a></li>
                <li><a href="#">Accesorios</a></li>
                <li><a href="#">Preguntas frecuentes</a></li>
            </ul>
        </div>

        {{-- Columna 3 --}}
        <div class="space-y-2">
            <h1 class="text-black text-lg">Categorías</h1>
            <ul class="space-y-2">
                <li><a href="#">Cuidado Capilar</a></li>
                <li><a href="#">Maquillaje</a></li>
                <li><a href="#">Cuidado corporal</a></li>
                <li><a href="#">Accesorios</a></li>
                <li><a href="#">Preguntas frecuentes</a></li>
            </ul>
        </div>

        {{-- Columna 4 --}}
        <div class="space-y-2 relative">
            <h1 class="text-black text-lg">Contactos</h1>
            <div class="pl-8 space-y-2">

                <img src="{{ 'images/location_pink.svg' }}"
                    class="absolute left-0.5 w-5 h-5">
                <p>{{ $info->localizacion }}
                <p>


                    <img src="{{ 'images/phone_pink.svg' }}"
                        class="absolute left-0.5 w-5 h-5">
                <p>{{ $info->telefono }}
                <p>


                    <img src="{{ 'images/mail_pink.svg' }}"
                        class="absolute left-0.5 w-5 h-5">
                <p>{{ $info->correo }}
                <p>


                    <img src="{{ 'images/time_pink.svg' }}"
                        class="absolute left-0.5 w-5 h-5">
                <p>{{ $info->horario }}
                <p>
            </div>
        </div>

        {{-- Columna 5 --}}
        <div>
            <h1 class="text-black text-lg">Nuestras redes sociales</h1>
            {{-- BOTONES GENERICOS --}}
            <div class="container mx-auto flex justify-between">
                <a href="#" class=" w-12 h-12 
                                    rounded-full bg-pink-400 
                                    text-white flex 
                                    items-center justify-center
                                    transition duration-150
                                    transform hover:scale-110
                                    hover:brightness-60">
                    +
                </a>
                <a href="#" class=" w-12 h-12 
                                    rounded-full bg-pink-400 
                                    text-white flex 
                                    items-center justify-center
                                    transition duration-150
                                    transform hover:scale-110
                                    hover:brightness-60">
                    +
                </a>
                <a href="#" class=" w-12 h-12 
                                    rounded-full bg-pink-400 
                                    text-white flex 
                                    items-center justify-center
                                    transition duration-150
                                    transform hover:scale-110
                                    hover:brightness-60">
                    +
                </a>
                <a href="#" class=" w-12 h-12 
                                    rounded-full bg-pink-400 
                                    text-white flex 
                                    items-center justify-center
                                    transition duration-150
                                    transform hover:scale-110
                                    hover:brightness-60">
                    +
                </a>
            </div>
            <a href="#">
                <img src="{{ asset('images/bookclaim.svg')}}"
                    class="w-[140px] mx-auto 
                            transition duration-300 
                            transform 
                            hover:scale-110 
                            hover:brightness-110">
            </a>
        </div>

    </div>
</div>