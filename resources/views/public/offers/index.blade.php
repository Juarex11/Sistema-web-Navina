@extends('app')

@section('content')

<div class="p-10 ">
  <p class="text-5xl text-pink-400 text-center pb-9">Promociones Especiales</p>
  <div class="grid grid-cols-3 gap-10 max-w-7xl mx-auto text-center">
    @forelse ($products as $product)
    <x-offer-frame :product="$product" />
    @empty
    <p>Sin ofertas disponibles</p>
    @endforelse
  </div>
</div>

@endsection