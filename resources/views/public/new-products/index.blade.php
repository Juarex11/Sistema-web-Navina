@extends('app')

@section('content')

<header class="min-w-full h-72 flex flex-col justify-center items-center text-white relative">
  <img class="absolute top-0 left-0 size-full object-cover -z-10"
    src="{{ asset('imgs/banners/banner-3.jpg') }}">
  <h1 class="text-6xl font-semibold pb-2">Lo Nuevo</h1>
  <p class="font-semibold">
    Lo último en belleza natural, recién salido de la naturaleza para ti...
  </p>
</header>

<section class="p-8 max-w-347.5 mx-auto" id="latestProductsView">

  <div class="flex-1">

    <header>
      <h1 class="text-4xl text-pink-500 text-center font-semibold">
        Últimos 8 Productos Añadidos
      </h1>

      <p class="text-center text-neutral-500 mt-4 font-semibold">
        ¡Hoy llegó lo nuevo! Belleza natural que transforma tu piel desde el primer toque.
      </p>
    </header>

    <div class="grid gap-7 grid-cols-3 xl:grid-cols-4 mt-8">

      @if($latestProducts->count() > 0)

      @foreach($latestProducts as $product)

      <a class="rounded-xl overflow-hidden border-1.5 border-neutral-200
          hover:scale-103 duration-200"
        href="{{ route('products.details', $product->id) }}">

        <header>

          @if($product->images && $product->images->count() > 0)

          <img class="w-full h-75 object-cover"
            src="{{ asset('storage/'.$product->images->first()->directory) }}"
            alt="{{ $product->name }}"
            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-75 bg-neutral-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Error al cargar imagen<br/>URL: ' + this.src + '</span></div>'">

          @else

          <div class="w-full h-45 bg-neutral-200"></div>

          @endif

        </header>

        <div class="p-4 flex flex-col justify-center">

          <p class="text-xl font-semibold text-neutral-500 text-center pb-2">{{ $product->name }}</p>

          @if($product->category)
          <p class="text-sm text-neutral-400 text-center pb-2">{{ $product->category->name }}</p>
          @endif

          <div class="flex items-center justify-center gap-2">
            @if($product->discount > 0)
            <p class="text-lg text-pink-400 font-bold">S/{{ $product->final_price }}</p>
            <p class="text-sm text-neutral-400 line-through">S/{{ $product->price }}</p>
            <span class="text-xs bg-rose-100 text-rose-600 px-2 py-1 rounded-full">-{{ $product->discount }}%</span>
            @else
            <p class="text-lg text-pink-400 text-center font-bold">S/{{ $product->price }}</p>
            @endif
          </div>

        </div>

      </a>

      @endforeach

      @else

      <div class="flex justify-center col-span-3 text-xl font-semibold xl:col-span-4">
        No hay productos disponibles en este momento.
      </div>

      @endif

    </div>

    <div class="flex justify-center mt-8">
      <a href="{{ route('products') }}"
        class="inline-flex items-center px-6 py-3 bg-pink-400 text-white font-semibold rounded-lg hover:bg-pink-500 transition-colors">
        Ver todos los productos
      </a>
    </div>

  </div>

</section>

@endsection