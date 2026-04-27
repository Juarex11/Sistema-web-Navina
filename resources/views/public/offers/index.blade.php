@extends('app')

@section('content')

<div class="max-w-300 p-10 flex flex-col gap-10 mx-auto">

  <h1 class="text-5xl text-pink-500 text-center">Promociones Especiales</h1>

  <div class="grid grid-cols-3 gap-7 text-center">
    @forelse ($products as $product)

    <article class="group bg-white shadow-md rounded-xl overflow-hidden transition-all duration-300 ease-out
    hover:shadow-pink-300 hover:-translate-y-2">

      <a href="{{ route('products.details',$product->id) }}">

        <div class="relative overflow-hidden">
          <img
            src="{{ asset('storage/'.$product->images->first()->directory) }}"
            class="w-full h-70 object-cover transition-transform duration-500 ease-out
            group-hover:scale-105">

          <span class="absolute top-3 right-3 bg-pink-400 text-white text-sm font-bold px-3 py-1 rounded-lg">
            -{{ $product->discount }}%
          </span>
        </div>

        <div class="text-center p-4">
          <h1 class="text-lg font-medium text-gray-800">
            {{ $product->name }}
          </h1>

          <div class="mt-2">
            <span class="text-pink-400 text-xl font-bold">
              S/{{ number_format($product->final_price, 2) }}
            </span>
            <span class="text-gray-500 line-through ml-2">
              S/{{ number_format($product->price, 2) }}
            </span>
          </div>

          <p class="text-green-500 text-sm font-semibold mt-2">
            Ahorras S/{{ number_format($product->price - $product->final_price, 2) }}
          </p>
        </div>
      </a>

    </article>

    @empty
    <p>Sin ofertas disponibles</p>
    @endforelse
  </div>
</div>

@endsection