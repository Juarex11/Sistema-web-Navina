@extends('store.structure.layout')
@section('content')

    <div id="body">
        <p class="text-5xl text-pink-400 text-center p-6">Promociones Especiales</p>
        <div class="grid grid-cols-3 gap-10 max-w-7xl mx-auto px-6 text-center">
            @forelse ($products as $product)
                <x-offer-frame :product="$product" />
            @empty
                <p>Sin ofertas disponibles</p>
            @endforelse
        </div>
    </div>

@endsection