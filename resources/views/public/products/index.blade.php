@extends('app')

@section('content')

<header class="min-w-full h-72 bg-rose-300 flex flex-col justify-center items-center text-white">
  <h1 class="text-6xl font-semibold pb-2">Descubre tu belleza natural</h1>
  <p class="font-semibold">
    Productos de alta calidad para realizar tu belleza. Encuentra todo lo que necesitas para tu rutina diaria.</p>
</header>

<section class="p-8 flex flex-col gap-5 max-w-347.5 mx-auto">

  <div class="flex gap-4">

    <article class="p-4 rounded-lg border-1.5 border-neutral-200 flex-1">

      <h1 class="text-xl font-semibold text-rose-400 pb-2">Categorias</h1>

      <div class="flex gap-4 flex-wrap">
        @if($categories->count() > 0)

        @foreach($categories as $category)

        <span class="py-2 px-3 rounded-lg shadow-sm">{{ $category->name }}</span>

        @endforeach

        @else

        <span>No hay</span>


        @endif
      </div>

    </article>

    <article class="w-96 p-4 rounded-lg border-1.5 border-neutral-200 shrink-0">

      <h1 class="text-xl font-semibold text-rose-400 pb-2">Subcategorias</h1>

    </article>

  </div>

  <div class="flex gap-4">

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

  <div class="py-7 grid grid-cols-4 gap-7">

    @if($products->count() > 0)

    @foreach($products as $product)

    <article class="rounded-xl overflow-hidden border-1.5 border-neutral-200
    hover:scale-105 duration-200">

      <header>

        @if($product->image)

        <span>Si image</span>

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

    <span>No hay</span>

    @endif

  </div>

</section>

@endsection