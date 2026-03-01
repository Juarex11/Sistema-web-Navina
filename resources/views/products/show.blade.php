@extends('dashboard.layout')

@section('content')
<div class="flex-1 overflow-auto px-6 py-7">
    <div class="max-w-6xl mx-auto">

        <h1 class="text-4xl font-semibold text-center pb-6 font-mulish">
            Ver detalles del producto
        </h1>

        <div class="mb-6">
            <a
                class="px-4 py-2 rounded-lg text-white shadow-md inline-block"
                style="background-color:#f180a9"
                href="{{ route('products.index') }}">
                Volver
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">

            <h3 class="font-mulish text-xl mb-6 text-gray-800">
                Información del producto
            </h3>

            <div class="grid grid-cols-3 gap-4">

                {{-- IMÁGENES --}}
                <div class="col-auto">
                    @php
                        $mainImage = $product->images->first();
                    @endphp

                    @if ($mainImage)
                        <img
                            src="{{ asset('storage/'.$mainImage->directory) }}"
                            class="object-contain rounded-xl border border-gray-200 bg-gray-50"
                            style="max-height: 520px; max-width: 383.6;">
                    @else
                        <div class="text-gray-500 italic">
                            No hay imágenes disponibles.
                        </div>
                    @endif
                </div>

                {{-- INFO --}}
                <div>

                    <h2 class="text-3xl font-semibold font-mulish">
                        {{ old('name',$product->name) }}
                    </h2>

                    <div>
                        <h5 class="font-semibold">DESCRIPCIÓN:</h5>
                        <p class="text-gray-700 whitespace-pre-line">
                            {{ old('description',$product->description) }}
                        </p>
                    </div>

                    <div>
                        <h5 class="font-semibold">BENEFICIOS:</h5>
                        <p class="text-gray-700 whitespace-pre-line">
                            {{ old('benefits',$product->benefits) }}
                        </p>
                    </div>

                    <div>
                        <h5 class="font-semibold">ESTADO:</h5>
                        <p>
                            {{ $product->status ? 'Disponible' : 'No disponible' }}
                        </p>
                    </div>

                    <div>
                        <h5 class="font-semibold">PRECIO:</h5>
                        <p>S/. {{ old('price',$product->price) }}</p>
                    </div>

                    <div>
                        <h5 class="font-semibold">CATEGORÍA:</h5>
                        <p>{{ $product->category->name ?? 'Sin categoría' }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection