<nav class="w-full bg-white text-sm shadow-sm shadow-neutral-200 sticky top-0 left-0 z-10"
  x-data="{open:false}">
  <div class="flex justify-center items-center gap-6 px-4 py-2">

    <!-- logo -->
    <div>
      <a href="/">
        <img src="{{ asset('images/navina_logo.webp')}}" class="min-w-14 h-12">
      </a>
    </div>

    <div class="flex items-center gap-4 xl:px-4">
      <!-- menú -->
      <ul
        :class="open ? 'flex' : 'hidden'"
        class="md:flex fixed md:static top-16 left-0 w-full md:w-auto flex-col md:flex-row bg-white md:bg-transparent
        gap-4 md:gap-6 p-6 md:p-0 text-gray-600 whitespace-nowrap font-semibold">

        <!-- buscador móvil -->
        <li class="md:hidden order-first w-full">
          <div class="relative w-full">
            <input
              type="text"
              placeholder="Buscar productos"
              class="w-full px-4 py-2 pr-12 border border-gray-300 rounded-full focus:border-pink-400 focus:ring-pink-400
              focus:outline-none">

            <button class="absolute right-0 top-0 bottom-0 px-4 bg-pink-400 rounded-r-full flex items-center">
              <img src="{{ asset('images/search_white.svg') }}" class="w-5 h-5">
            </button>
          </div>
        </li>

        <li>
            <a  href="/"
                class="{{ Request::is('/') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
                Inicio
            </a>
        </li>

        <li>
            <a  href="{{ route('products.latest') }}"
                class="{{ Request::is('latest-products') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
                Lo Nuevo
            </a>
        </li>

        <li>
            <a href="{{ route('offers') }}" 
                class="{{ Request::is('offers') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
                Ofertas
            </a>
        </li>

        <li>
            <a href="{{ route('products') }}" 
            class="{{ Request::is('products') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
            Productos
            </a>
        </li>

        <li class="relative group">
            <a href="{{ route('products') }}">
                <button class="flex items-center gap-2 cursor-pointer hover:text-pink-500">
                    Categorías
                    

                    <!-- Flecha -->
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 15l7-7 7 7" />
                    </svg>
                </button>
            </a>

            <ul class="absolute left-0 mt-2 min-w-84 bg-white border border-gray-200 rounded-lg shadow-lg
                       opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200
                       grid grid-cols-2 text-center
                       [&_li]:p-1
                       [&_a]:hover:bg-pink-400 [&_a]:hover:text-white [&_a]:rounded-2xl [&_a]:block [&_a]:px-4 [&_a]:py-2
                       [&_a]:transition-colors [&_a]:duration-200">
                <li class="text-neutral-500 hover:text-pink-400 font-medium">
                  <a href="{{ route('products', collect(request()->query())->except('category')->toArray() ) }}">
                    Todas
                  </a>
                </li>

                @if($categories->count() > 0)

                @foreach($categories as $category)

                <li class="font-medium
                    {{ request('category') == $category->id 
                    ? 'text-pink-400' 
                    : 'text-neutral-400 hover:text-pink-400' }}">
                  <a href="{{ route('products', array_merge(request()->except('page'), ['category' => $category->id])) }}">
                    {{ $category->name }}
                  </a>
                </li>

                @endforeach

                @else

                <span>No hay</span>

                @endif
            </ul>
        </li>

        <li><a href="#">Blogs</a></li>

        <li>
            <a  href="{{ route('aboutUs') }}"" 
                class="{{ Request::is('about') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
                Sobre Nosotros
            </a>
        </li>

        <li>
            <a  href="{{ route('contact') }}"
                class="{{ Request::is('contact') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
                Contacto
            </a>
        </li>

        <li>
            <a  href="{{ route('delivery') }}"
                class="{{ Request::is('delivery') ? 'text-pink-500' : 'text-gray-600' }} hover:text-pink-500">
                Envíos
            </a>
        </li>

      </ul>

      <!-- buscador desktop -->
      <div class="relative w-64 hidden md:block">
        <input
          type="text"
          placeholder="Buscar productos"
          class="w-full px-4 py-2 pr-12 border border-gray-300 rounded-full focus:border-pink-400 focus:ring-pink-400 focus:outline-none text-sm">

        <button
          class="absolute right-0 top-0 bottom-0 px-4 bg-pink-400 rounded-r-full flex items-center">

          <img src="{{ asset('images/search_white.svg') }}" class="w-5 h-5">
        </button>
      </div>

      <!-- carrito -->
      <div class="relative">
        <button id="shoppingCartButton" class="cursor-pointer">
          <img src="{{ asset('images/shopping_cart.svg')}}" class="w-8 h-8">

          <p class="rounded-full bg-yellow-300 
                            w-5 h-5 text-gray-700
                            absolute -top-1/4 -right-1
                            text-xs flex items-center justify-center">
            0
          </p>
        </button>
      </div>

      <!-- reservar -->
      <div>
        <button class="bg-pink-400 px-4 py-2 rounded-lg text-white flex items-center
                        hover:bg-pink-500 transition-colors duration-200
                          hover:scale-105 transform">
          Reservar
        </button>
      </div>

      <!-- hamburguesa -->
      <button @click="open=!open" class="md:hidden">
        <img src="{{ asset('images/menu.svg') }}" class="w-7 h-7">
      </button>
    </div>
  </div>

</nav>

<script>
  function updateCartCount() {

    const cart = JSON.parse(localStorage.getItem("cart")) || []

    let cartCount = 0
    cart.forEach(el => cartCount += el.count)

    const cartIcon = document.getElementById("CartCount")
    if (cartIcon) {
      cartIcon.innerText = cartCount
    }

  }

  window.addEventListener("DOMContentLoaded", updateCartCount)

  // escuchar cuando agregas productos
  window.addEventListener("cartUpdated", updateCartCount)
</script>
