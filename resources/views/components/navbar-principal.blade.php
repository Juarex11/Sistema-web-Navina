<nav x-data="{open:false}" class="h-16 w-full bg-white text-sm">
    <div class="container mx-auto flex justify-center items-center h-full gap-6">

        <div>
            <a href="/">
                <img src="{{ asset('images/navina_logo.webp')}}" class="w-14 h-12">
            </a>
        </div>
        
        <ul class="hidden md:flex gap-8 text-gray-600 whitespace-nowrap font-semibold">
            <li>
                <a href="/" 
                   class="{{ Request::is('/') ? 'text-pink-500' : 'text-gray-600' }}">
                    Inicio
                </a>
            </li>

            <li><a href="#">Lo Nuevo</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Categorias</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Sobre Nosotros</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Envíos</a></li>
        </ul>

        <div class="relative w-64 hidden md:block">
            <input
                type="text"
                name="search"
                placeholder="Buscar productos"
                class="w-full px-4 py-2 pr-12
                    border border-gray-300
                    rounded-full
                    focus:border-pink-400
                    focus:ring-pink-400 focus:outline-none
                    text-sm">
            <button
                type="submit"
                class="absolute right-0 top-0 bottom-0
                    px-4
                    bg-pink-400
                    rounded-r-full
                    flex items-center justify-center">

                <img src="{{ asset('images/search_white.svg') }}" class="w-5 h-5">
            </button>
        </div>

        <div class="relative">
            <a href="#">
                <img src="{{ asset('images/shopping_cart.svg')}}" class="w-8 h-8">

                <p class="rounded-full bg-yellow-400 
                          w-5 h-5 text-gray-700
                          absolute -top-1/4 -right-1
                          text-xs flex items-center justify-center">
                0</p>
            </a>
        </div>

        <div>
            <button class="bg-pink-400 px-4 py-2 rounded-lg text-white flex items-center">
                Reservar
            </button>
        </div>

        <button @click="open=!open" class="md:hidden">
            <img src="{{ asset('images/menu.svg') }}" class="w-7 h-7">
        </button>

    </div>
</nav>