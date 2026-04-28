@extends('app')

@section('content')

<header class="min-w-full h-72 flex flex-col justify-center items-center text-white relative">
  <img class="absolute top-0 left-0 size-full object-cover -z-10"
    src="{{ asset('imgs/banners/banner-3.png') }}">

  <h1 class="text-6xl font-semibold pb-2">Descubre tu belleza natural</h1>
  <p class="font-semibold">
    Productos de alta calidad para realizar tu belleza. Encuentra todo lo que necesitas para tu rutina diaria.
  </p>
</header>

<section class="p-8 max-w-347.5 mx-auto"
  id="productsView">

  <div class="flex-1">

    <header>

      <h1 class="text-4xl text-pink-400 text-center font-semibold">
        @if(request('category') == null)
        Belleza Natural
        @else

        @foreach($categories as $category)

        @if(request('category') == $category->id )

        {{ $category->name }}

        @endif

        @endforeach

        @endif
      </h1>

      <form class="flex flex-col sm:flex-row gap-4 justify-center py-7"
        action="{{ route('products') }}"
        method="GET">

        <input class="w-full sm:w-110 py-2 px-4 rounded-lg border-1.5 border-neutral-200 text-neutral-600 font-medium focus:outline-rose-300"
          type="text"
          name="searchProduct"
          required
          placeholder="Buscar productos...">

        <button class="py-2 px-4 rounded-lg bg-pink-400 text-white font-semibold cursor-pointer">
          Buscar
        </button>

        @if(request('searchProduct'))

        <a class="p-2.5 rounded-full bg-neutral-300 text-neutral-400 font-semibold self-center"
          href="{{ route('products', request()->except(['searchProduct', 'page'])) }}">

          <svg xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="icon icon-tabler icons-tabler-filled icon-tabler-x">

            <path stroke="none" d="M0 0h24v24H0z" fill="none" />

            <path d="M6.707 5.293l5.293 5.292l5.293 -5.292a1 1 0 0 1 1.414 1.414l-5.292 5.293l5.292 5.293a1 1 0 0 1 -1.414 1.414l-5.293 -5.292l-5.293 5.292a1 1 0 1 1 -1.414 -1.414l5.292 -5.293l-5.292 -5.293a1 1 0 0 1 1.414 -1.414" />

          </svg>

        </a>

        @endif

      </form>

    </header>

    <section class="flex flex-col lg:flex-row gap-7">

      {{-- FILTROS MOBILE --}}
      <div class="lg:hidden">

        <button
          id="toggleFilters"
          class="w-full flex items-center justify-between bg-pink-400 text-white font-semibold px-5 py-3 rounded-lg">

          <span>Filtros</span>

          <svg id="filterIcon"
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="22"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2">

            <path d="M6 9l6 6l6 -6" />

          </svg>

        </button>

        <div id="mobileFilters"
          class="hidden pt-5">

          @include('public.products.components.filter')

        </div>

      </div>

      {{-- FILTROS DESKTOP --}}
      <div class="hidden lg:block">

        @include('public.products.components.filter')

      </div>

      <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 flex-1">

        @if($products->count() > 0)

        @foreach($products as $product)

        <a class="rounded-xl overflow-hidden shadow-md max-h-max shadow-neutral-300
        hover:scale-103 hover:shadow-pink-300 duration-200"
          href="{{ route('products.details', $product->id) }}">

          <header>

            @if($product->images && $product->images->first())

            <img class="w-full h-75 object-cover"
              src="{{ asset('storage/'.$product->images->first()->directory) }}"
              alt="{{ $product->name }}">

            @else

            <div class="w-full h-45 bg-neutral-200"></div>

            @endif

          </header>

          <div class="p-4 flex flex-col justify-center">

            <p class="text-xl font-semibold text-neutral-500 text-center pb-2">
              {{ $product->name }}
            </p>

            <p class="text-lg text-pink-400 text-center font-bold">
              S/{{ $product->price }}
            </p>

          </div>

        </a>

        @endforeach

        @else

        <div class="flex justify-center col-span-3 text-xl font-semibold xl:col-span-4">
          No hay
        </div>

        @endif

      </div>

    </section>

    <div class="flex items-center justify-center">
      @include('public.products.components.pagination')
    </div>

  </div>

</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {

    const params = new URLSearchParams(window.location.search);

    if (
      params.has('page') ||
      params.has('category') ||
      params.has('price_range') ||
      params.has('searchProduct')
    ) {

      document.getElementById('productsView')
        ?.scrollIntoView({
          behavior: 'smooth'
        });

    }

    const toggleBtn = document.getElementById('toggleFilters');
    const mobileFilters = document.getElementById('mobileFilters');
    const filterIcon = document.getElementById('filterIcon');

    toggleBtn?.addEventListener('click', () => {

      mobileFilters.classList.toggle('hidden');

      filterIcon.classList.toggle('rotate-180');

    });

  });
</script>

@endsection