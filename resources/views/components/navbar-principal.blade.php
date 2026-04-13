<nav x-data="{open:false}" class="fixed top-0 left-0 w-full h-16 bg-white text-sm z-99999">

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
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="{{ route('store.products.offers') }}">Ofertas</a>
                </li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Productos</a>
                </li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Categorias</a>
                </li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Blogs</a>
                </li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Sobre Nosotros</a>
                </li>
                <li class="text-gray-600 hover:text-pink-500">
                    <a href="#">Contacto</a>
                </li>
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

                    <p class="text-white">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="h-5 w-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </p>
                </button>
            </div>

            <!-- carrito -->
            <div class="relative">
                <a href="#">
                    <p class="text-gray-700">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path>
                        </svg>
                    </p>
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
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>