@extends('app')

@section('content')

<header class="min-w-full h-72 bg-rose-300 flex flex-col justify-center items-center text-white">
  <h1 class="text-6xl font-semibold pb-2">Descubre tu belleza natural</h1>
  <p class="font-semibold">
    Productos de alta calidad para realizar tu belleza. Encuentra todo lo que necesitas para tu rutina diaria.</p>
</header>

<section class="p-8 flex gap-7 max-w-347.5 mx-auto"
  id="productsView">

  @include('public.products.components.filter')

  <div class=" flex-1">

    <header>

      <h1 class="text-4xl text-rose-500 text-center font-semibold">
        @if(request('category') == null)
        Productos
        @else

        @foreach($categories as $category)

        @if(request('category') == $category->id )

        {{ $category->name }}

        @endif

        @endforeach

        @endif
      </h1>

      <form class="flex gap-4 justify-center py-7"
        action="{{ route('products') }}"
        method="GET">

        <input class="w-110 py-2 px-4 rounded-lg border-1.5 border-neutral-200 text-neutral-600 font-medium focus:outline-rose-300"
          type="text"
          name="searchProduct"
          required
          placeholder="Buscar productos...">

        <button class="py-2 px-4 rounded-lg bg-rose-400 text-white font-semibold">
          Buscar
        </button>

        @if(request('searchProduct'))

        <a class="py-2 px-4 rounded-lg bg-rose-500 text-white"
        href="{{ route('products', request()->except(['searchProduct', 'page'])) }}">
          Limpiar
        </a>

        @endif

      </form>
    </header>


    <div class="grid gap-7 grid-cols-3 xl:grid-cols-4">

      @if($products->count() > 0)

      @foreach($products as $product)

      <article class="rounded-xl overflow-hidden border-1.5 border-neutral-200
      hover:scale-103 duration-200">

        <header>

          @if($product->images)

          <img class="w-full h-75 object-cover"
            src="{{ asset('storage/' . $product->images->first()->directory ?? '') }}"
            alt="{{ $product->name }}">

          @else

          <div class="w-full h-45 bg-neutral-200"></div>

          @endif

        </header>

        <div class="p-4 flex flex-col justify-center">

          <p class="text-xl font-semibold text-neutral-500 text-center pb-2">{{ $product->name }}</p>
          <p class="text-lg text-rose-400 text-center font-bold">S/{{ $product->price }}</p>

        </div>

      </article>

      @endforeach

      @else

      <div class="flex justify-center col-span-3 text-xl font-semibold xl:col-span-4">
        No hay
      </div>

      @endif

    </div>

    <div class="flex items-center justify-center">
      @include('public.products.components.pagination')
    </div>
  </div>

</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);

    if (params.has('page') || params.has('category') || params.has('price_range') || params.has('searchProduct')) {
      document.getElementById('productsView')
        ?.scrollIntoView({
          behavior: 'smooth'
        });
    }

  })
</script>

@endsection