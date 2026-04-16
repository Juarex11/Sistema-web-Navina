@extends('app')

@section('content')

@include('public.home.modals.register')

<section>

  <div id="banner" class="w-full h-[calc(100vh-64px)] overflow-hidden">
    <div class="size-full">
      <!-- Additional required wrapper -->
      <div class="h-full">
        <!-- Banner 1 -->
        <div class="p-7 relative h-full
        xl:p-10">

          <!-- Main Banner -->
          <img class="absolute top-0 left-0 size-full -z-10 object-cover"
            src="{{ asset('imgs/banners/banner-1.png') }}"
            alt="logo">

          <article class="max-w-4xl px-6 text-center mx-auto my-7 xl:my-15">

            <img class="size-24 bg-white rounded-full mx-auto" alt="logo"
              src="{{ asset('imgs/NaviLogo.webp') }}"></img>

            <p class="text-white text-6xl font-bold [text-shadow:2px_2px_4px_rgba(0,0,0,0.7)] py-7
            xl:text-7xl">
              30% de Descuento en Colección Premium
            </p>
            <div class="max-w-2xl mx-auto">
              <p class="text-white text-2xl [text-shadow:2px_2px_4px_rgba(0,0,0,0.6)]">
                Nuestras piezas más exclusivas ahora a un precio irresistible. Elegancia y sofisticación que transformarán tu imagen.
              </p>
            </div>
            <div class="flex justify-center gap-6 mt-8">
              <button class="px-10 py-4 rounded-lg text-lg font-semibold shadow-md text-white bg-pink-500 hover:shadow-lg hover:bg-pink-700 hover:-translate-y-1 transition-all">
                Ver promoción
              </button>
              <button class="px-10 py-4 rounded-lg text-lg font-semibold shadow-md text-pink-500 bg-gray-200 hover:shadow-lg hover:bg-white hover:-translate-y-1 transition-all">
                Conócenos
              </button>
            </div>
          </article>
        </div>
        
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <!-- If we need scrollbar -->
      <div class="swiper-scrollbar"></div>
    </div>
  </div>

  <div id="body" class="max-w-7xl mx-auto px-5 py-10">
    <div id="features" class="grid grid-cols-4 gap-14 text-center">
      <div class="flex flex-col items-center text-center p-4">
        <span class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="25" height="25" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-leaf">
            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
            <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
          </svg>
        </span>
        <p class="font-bold">Productos Naturales</p>
      </div>
      <div class="flex flex-col items-center text-center p-4">
        <span class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck">
            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
            <path d="M15 18H9"></path>
            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
            <circle cx="17" cy="18" r="2"></circle>
            <circle cx="7" cy="18" r="2"></circle>
          </svg>
        </span>
        <p class="font-bold">Envío gratis</p>
      </div>
      <div class="flex flex-col items-center text-center p-4">
        <span class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big">
            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
            <path d="m9 11 3 3L22 4"></path>
          </svg>
        </span>
        <p class="font-bold">Garantía de calidad</p>
      </div>
      <div class="flex flex-col items-center text-center p-4">
        <span class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-handshake">
            <path d="m11 17 2 2a1 1 0 1 0 3-3"></path>
            <path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"></path>
            <path d="m21 3 1 11h-2"></path>
            <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"></path>
            <path d="M3 4h8"></path>
          </svg>
        </span>
        <p class="font-bold">Atención personalizada</p>
      </div>
    </div>

    <div id="categories" class="py-10">
      <p class="text-pink-700 font-semibold text-4xl text-center pb-3">
        Categorías de Productos
      </p>
      <p class="text-gray-400 font-semibold text-2xl text-center pb-14">
        Descubre nuestra amplia gama de productos de belleza diseñados para realzar tu belleza natural
      </p>
      <div class="grid grid-cols-3 gap-8 px-30">
        <div class="rounded-xl shadow-md overflow-hidden border border-gray-300 flex flex-col items-center text-center p-4">
          <p class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
              <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
            </svg>
          </p>
          <h4 class="font-bold text-2xl py-3">
            Cuidado Facial
          </h4>
          <p class="text-gray-400 text-2xl font-semibold pb-12">
            Productos especializados para el cuidado y protección de tu rostro.
          </p>

          <ul class="space-y-2 text-gray-400 list-none font-bold pb-8">
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Limpiadores</span>
            </li>
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Cérums</span>
            </li>
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Mascarillas</span>
            </li>
          </ul>
          <button class="text-pink-400 hover:text-pink-600 transition-all font-bold text-md py-3">
            Ver productos
          </button>
        </div>

        <div class="rounded-xl shadow-md overflow-hidden border border-gray-300 flex flex-col items-center text-center p-4">
          <p class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition all rounded-full w-13 h-13 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
              <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
            </svg>
          </p>
          <h4 class="font-bold text-2xl py-3">
            Maquillaje
          </h4>
          <p class="text-gray-400 text-2xl font-semibold pb-12">
            Cosméticos de alta calidad para realzar tu belleza natural.
          </p>
          <ul class="space-y-2 text-gray-400 list-none font-bold pb-8">
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Bases y correctores</span>
            </li>
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Labiales y brillos</span>
            </li>
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Sombras y delineadores</span>
            </li>
          </ul>
          <button class="text-pink-400 hover:text-pink-600 transition-all font-bold text-md py-3">
            Ver productos
          </button>
        </div>

        <div class="rounded-xl shadow-md overflow-hidden border border-gray-300 flex flex-col items-center text-center p-4">
          <p class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition all rounded-full w-13 h-13 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
              <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
            </svg>
          </p>
          <h4 class="font-bold text-2xl py-3">
            Cuidado Capilar
          </h4>
          <p class="text-gray-400 text-2xl font-semibold pb-12">
            Solución completa para un cabello saludable y brillante.
          </p>
          <ul class="space-y-2 text-gray-400 list-none font-bold pb-8">
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Acondicionadores</span>
            </li>
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Mascarillas capilares</span>
            </li>
            <li class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6bbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
              </svg>
              <span>Aceites y sérums</span>
            </li>
          </ul>
          <button class="text-pink-400 hover:text-pink-600 transition-all font-bold text-md py-3">
            Ver productos
          </button>
        </div>
      </div>
    </div>

    <!-- Services Home Section -->
    <div id="servicesHome" class="py-10 mx-16">
      <p class="text-pink-700 font-semibold text-4xl text-center pb-3">
        Servicios especiales
      </p>
      <p class="text-gray-400 font-semibold text-2xl text-center pb-16">
        Ofrecemos una variedad de servicios para satisfacer tus necesidades.
      </p>
      <div class="grid grid-cols-2 gap-20 px-60">
        <div class="rounded-xl overflow-hidden border border-gray-300">
          <div class="flex flex-col items-center text-center">
            <img src="{{ asset('imgs/services/candles-catalogue.png') }}" class="transform scale-100 hover:scale-105 transition-all"></img>

            <p class="text-lg font-bold py-3">
              RecuerdoNavi
            </p>
            <p class="text-md font-bold text-gray-500 pb-5">
              texto de ejemplo, se tomara de otra página.
            </p>
            <div class="p-2">
              <!-- Aquí va a ir un foreach debido a que los valores que tiene los p de aquí deben tomar el texto de otra página-->
              <p class="border border-pink-700 text-pink-700 text-sm font-semibold rounded-full px-2 py-1">
                prueba
              </p>
            </div>
          </div>
        </div>
        <div class="rounded-xl overflow-hidden border border-gray-300">
          <div class="flex flex-col items-center text-center">
            <img src="{{ asset('imgs/services/soap-catalogue.png') }}" class="transform scale-100 hover:scale-105 transition-all"></img>

            <p class="text-lg font-bold py-3">
              RecuerdosNavi
            </p>
            <p class="text-md font-bold text-gray-500 pb-5">
              texto de ejemplo, se tomara de otra página.
            </p>
            <div class="p-2">
              <!-- Aquí va a ir un foreach debido a que los valores que tiene los p de aquí deben tomar el texto de otra página-->
              <p class="border border-pink-700 text-pink-700 text-sm font-semibold rounded-full px-2 py-1">
                prueba
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Productos Destacados -->
    <div id="featured-products" class="py-10 mx-16">
      <div class="flex justify-between items-center pb-6">
        <p class="text-pink-700 font-semibold text-4xl text-left pb-3">
          Productos Destacados
        </p>
        <a href="{{ route('products') }}" class="bg-pink-400 hover:bg-pink-300 transition-all text-lg text-white py-2 px-4 rounded-full">
          Ver todos
        </a>
      </div>
      <div class="grid grid-cols-4 gap-5">
        @forelse($products as $product)
          <div class="border border-gray-300 rounded-xl shadow-md hover:shadow-lg transition-all">
            @if($product->images && $product->images->first())
              <img src="{{ asset('storage/' . $product->images->first()->directory . '/' . $product->images->first()->name) }}" 
                   alt="{{ $product->name }}" 
                   class="w-full h-48 object-cover rounded-t-xl"
                   onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2Y3ZjdmNyIvPjx0ZXh0IHg9IjUwJSIgeT0iNTAlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iMC4zZW0iIGZpbGw9IiM5OTkiPkltYWdlbiBubyBkaXNwb25pYmxlPC90ZXh0Pjwvc3ZnPg=='">
            @else
              <div class="w-full h-48 bg-gray-200 rounded-t-xl flex items-center justify-center">
                <span class="text-gray-400">Sin imagen</span>
              </div>
            @endif
            <div class="p-4">
              <p class="bg-pink-100 text-pink-400 text-sm font-semibold rounded-full pb-2 text-center">
                {{ $product->category->name ?? 'Sin categoría' }}
              </p>
              <h3 class="text-lg font-semibold pb-2 text-black hover:text-pink-400 transition-all">
                {{ $product->name }}
              </h3>
              <p class="text-md text-gray-500 pb-3 line-clamp-2">
                {{ Str::limit($product->description, 80) }}
              </p>
              <div class="flex justify-between items-center pb-3">
                @if($product->discount > 0)
                  <div>
                    <span class="text-gray-400 line-through text-sm">${{ number_format($product->price, 2) }}</span>
                    <span class="text-pink-600 font-bold text-lg">${{ number_format($product->final_price, 2) }}</span>
                  </div>
                  <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                    -{{ $product->discount }}%
                  </span>
                @else
                  <span class="text-pink-600 font-bold text-lg">${{ number_format($product->price, 2) }}</span>
                @endif
              </div>
              <div class="flex gap-2">
                <a href="{{ route('products.details', $product->id) }}" 
                   class="flex-1 bg-pink-500 hover:bg-pink-600 transition-all text-white text-center py-2 px-4 rounded-lg font-semibold">
                  Ver detalles
                </a>
                <button class="bg-green-500 hover:bg-green-600 transition-all text-white py-2 px-4 rounded-lg font-semibold">
                  Comprar
                </button>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-4 text-center py-10">
            <p class="text-gray-500 text-lg">No hay productos disponibles en este momento.</p>
          </div>
        @endforelse
      </div>
    </div>

    <div id="blogs" class="py-10 mx-16">
      <div class="flex justify-between items-center pb-6">
        <p class="text-pink-400 font-semibold text-4xl text-left pb-3">
          Blogs
        </p>
        <a class="bg-pink-400 hover:bg-pink-300 transition-all text-lg text-white py-2 px-4 rounded-full">
          Explorar todas
        </a>
      </div>
      <div class="grid grid-cols-4 gap-5">
        <div class="border border-gray-300 rounded-xl shadow-md hover:shadow-lg transition-all">
          <img>
          <div class="p-4">
            <a>
              <p class="bg-pink-100 text-pink-400 text-sm font-semibold rounded-full pb-4 text-center">categoría</p>
              <p class="text-lg font-semibold pb-2 text-black hover:text-pink-400 transition-all">Nombre producto</p>
              <p class="text-md text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est fugiat natus error aut, eaque voluptatum labore quod dolorem sit deleniti. Sed hic omnis rerum dolorem facere iste, modi id ad.</p>
              <hr class="text-gray-300">
              <p class="text-pink-400 hover:translate-x-1 transition-all flex flex-wrap">
                Leer artículo
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4 md:w-5 md:h-5">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

@endsection