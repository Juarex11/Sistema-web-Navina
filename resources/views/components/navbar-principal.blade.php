<nav x-data="{open:false}" class="fixed top-0 left-0 w-full h-16 bg-white text-sm z-[99999]">

    <div class="container mx-auto flex justify-between items-center h-full gap-6 px-4">

        <!-- logo -->
        <div>
            <a href="/">
                <img src="{{ asset('images/navina_logo.webp')}}" class="w-auto h-10">
            </a>
        </div>

        <div class="flex items-center gap-4 px-4">
            <!-- menú -->
            <ul
                :class="open ? 'flex' : 'hidden'"
                class="md:flex
                    fixed md:static
                    top-16 left-0
                    w-full md:w-auto
                    flex-col md:flex-row
                    bg-white md:bg-transparent
                    gap-6 md:gap-8
                    p-6 md:p-0
                     whitespace-nowrap font-semibold">

                <!-- buscador móvil -->
                <li class="md:hidden order-first w-full">
                    <div class="relative w-full">
                        <input
                            type="text"
                            placeholder="Buscar productos"
                            class="w-full px-4 py-2 pr-12
                                border border-gray-300
                                rounded-full
                                focus:border-pink-400
                                focus:ring-pink-400
                                focus:outline-none">

                        <button
                            class="absolute right-0 top-0 bottom-0
                                px-4 bg-pink-400
                                rounded-r-full flex items-center">

                            <img src="{{ asset('images/search_white.svg') }}" class="w-5 h-5">
                        </button>
                    </div>
                </li>

                <li>
                    <a href="/"
                       class="text-gray-600 hover:text-pink-500 
                                {{ Request::is('/') ? 'text-pink-500' : 'text-gray-600' }}">
                        Inicio
                    </a>
                </li>
                
                <li>
                    <a href="#"                       
                       class="text-gray-600 hover:text-pink-500">
                        Lo Nuevo</a>
                </li>
                <li>
                    <a href="/Ofertas"                       
                       class="text-gray-600 hover:text-pink-500 {{ Request::is('Ofertas') ? 'text-pink-500' : 'text-gray-600' }}">
                        Ofertas</a>
                </li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Productos</a></li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Categorias</a></li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Blogs</a></li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Sobre Nosotros</a></li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Contacto</a></li>
                <li>
                    <a href="/Envios" 
                       class="text-gray-600 hover:text-pink-500 
                                {{ Request::is('Envios') ? 'text-pink-500' : 'text-gray-600' }}">
                        Envíos
                    </a>
                </li>
            </ul>

            <!-- buscador desktop -->
            <div class="relative w-64 hidden md:block">
                <input
                    type="text"
                    placeholder="Buscar productos"
                    class="w-full px-4 py-2 pr-12
                        border border-gray-300
                        rounded-full
                        focus:border-pink-400
                        focus:ring-pink-400
                        focus:outline-none
                        text-sm">

                <button
                    class="absolute right-0 top-0 bottom-0
                        px-4 bg-pink-400
                        rounded-r-full flex items-center">

                    <img src="{{ asset('images/search_white.svg') }}" class="w-5 h-5">
                </button>
            </div>

            <!-- carrito -->
            <div class="relative">
                <a href="#">
                    <img src="{{ asset('images/shopping_cart.svg')}}" class="w-8 h-8">

                    <p class="rounded-full bg-yellow-400 
                            w-5 h-5 text-gray-700
                            absolute -top-1/4 -right-1
                            text-xs flex items-center justify-center
                            ">
                        0
                    </p>
                </a>
            </div>

            <!-- reservar -->
            <div>
                <button class="bg-pink-400 px-4 py-2 rounded-lg text-white flex items-center 
                    transform hover:scale-110
                    transition-all duration-100 ease-in-out
                    group">
                    Reservar
                </button>
            </div>

            <!-- hamburguesa -->
            <button id="Hamburger" @click="open=!open" class="md:hidden">
                <img src="{{ asset('images/menu.svg') }}" class="w-7 h-7">
            </button>
        </div>
    </div>

</nav>