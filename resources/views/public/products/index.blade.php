@extends('app')

@section('content')

<header class="min-w-full h-72 bg-rose-300 flex flex-col justify-center items-center text-white">
  <h1 class="text-6xl font-semibold pb-2">Descubre tu belleza natural</h1>
  <p class="font-semibold">
    Productos de alta calidad para realizar tu belleza. Encuentra todo lo que necesitas para tu rutina diaria.</p>
</header>

<section class="p-8 flex gap-7 max-w-347.5 mx-auto">

  <aside class="flex gap-4 max-w-55 shrink-0">

    <article class="p-5 rounded-lg border-1.5 border-neutral-200">

      <h1 class="text-xl font-semibold text-rose-400 pb-4">Categorias</h1>

      <ul class="flex flex-col gap-4 xl:gap-5">

        <li class="text-neutral-500 hover:text-pink-400 font-medium">
          <a href="{{ route('products') }}">
            Todas
          </a>
        </li>

        @if($categories->count() > 0)

        @foreach($categories as $category)

        <li class="font-medium
          {{ request('category') == $category->id 
          ? 'text-pink-400' 
          : 'text-neutral-400 hover:text-pink-400' }}">
          <a href="{{ route('products', ['category' => $category->id]) }}">
            {{ $category->name }}
          </a>
        </li>

        @endforeach

        @else

        <span>No hay</span>

        @endif
      </ul>

    </article>

  </aside>

  <div class=" flex-1">

    <header>

      <h1 class="text-4xl text-rose-500 text-center font-semibold">Productos</h1>

      <div class="flex gap-4 justify-center py-7">

        <input class="w-96 py-2 px-4 rounded-lg border-1.5 border-neutral-200 text-neutral-600 font-medium focus:outline-rose-300"
          type="text"
          placeholder="Buscar productos...">

        <select class="p-2 rounded-lg border-1.5 border-neutral-200 focus:outline-rose-300"
          name="" id="">
          <option value="0">Seleccionar Precios</option>
          <option value="5">S/5.00</option>
          <option value="10">S/10.00</option>
          <option value="15">S/15.00</option>
          <option value="25">S/25.00</option>
          <option value="35">S/35.00</option>
        </select>

        <button class="py-2 px-4 rounded-lg bg-rose-400 text-white font-semibold">
          Buscar
        </button>

      </div>
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

@endsection