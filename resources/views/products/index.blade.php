@extends('dashboard.layout')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-semibold text-center pb-6 font-mulish">
                Lista de productos
            </h1>

            <div class="flex gap-3 mb-6">
                <a class="px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md" href="{{ route('dashboard') }}">Volver</a>
                <a class="px-4 py-2 text-white rounded-lg shadow-md" style="background-color:#f180a9" href="{{ route('products.create') }}">+ Añadir nuevo producto</a>
            </div>
            <div class="overflow-x-auto">
                <div class="rounded-xl overflow-hidden border border-gray-300" style="max-width: 1200px;">
                    <table class="min-w-full text-center" style="width: 1200px;">
                        <thead style="background-color:#f180a9" class="text-white">
                            <tr>
                                <th class="px-3 py-3">ID</th>
                                <th class="px-3 py-3">Nombre</th>
                                <th class="px-3 py-3">Descripción</th>
                                <th class="px-3 py-3">Beneficios</th>
                                <th class="px-3 py-3">Categoría</th>
                                <th class="px-3 py-3">Estado</th>
                                <th class="px-3 py-3">Precio</th>
                                <th class="px-3 py-3">Stock</th>
                                <th class="px-3 py-3">Stock mínimo</th>
                                <th class="px-3 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-3 py-2">{{ $product->id }}</td>
                                <td class="px-3 py-2">{{ $product->name }}</td>
                                <td class="px-3 py-2" title="{{ $product->description }}">{{ $product->description }}</td>
                                <td class="px-3 py-2" title="{{ $product->benefits }}">{{ $product->benefits }}</td>
                                <td class="px-3 py-2">{{ $product->category->name ?? 'Sin categoría' }}</td>
                                <td class="px-3 py-2">{{ $product->status ? 'Disponible' : 'No disponible' }}</td>
                                <td class="px-3 py-2">{{ $product->price }}</td>
                                <td class="px-3 py-2">{{ $product->stock }}</td>
                                <td class="px-3 py-2">{{ $product->stock_min }}</td>
                                <td class="px-3 py-2">
                                    <div class="flex justify-center items-center gap-2 flex-wrap">
                                        <a class="px-3 py-1 bg-pink-500 text-white rounded-md text-sm" href="{{ route('products.show',$product) }}">Ver</a>
                                        <a class="px-3 py-1 bg-pink-500 text-white rounded-md text-sm" href="{{ route('products.edit',$product) }}">Editar</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1 bg-pink-500 text-white rounded-md text-sm" type="submit" onclick="return confirm('¿Desea eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="py-6 text-center text-gray-500">No hay productos registrados</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection