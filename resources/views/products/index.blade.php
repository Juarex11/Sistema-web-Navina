   @extends('dashboard.layout')

    @section('content')
    <div class="p-6 flex-1 overflow-auto" style="margin-left: 5%; margin-right: 5%;">
    <h1 class="text-4xl font-semibold text-center pb-5 font-mulish">Lista de productos</h1>
    <a class="px-4 py-2 bg-gray-600 text-white rounded" href="{{ route('dashboard') }}">Volver</a>
    <a class="px-4 py-2 bg-blue-600 text-white rounded" href="{{ route('products.create') }}">+ Añadir nuevo producto</a>
    <br><br>
    <hr>
    <br>
    <div class="overflow-x-auto" style="max-width: 1200px;">
    <table border="2" class="min-w-full border border-gray-300 text-center">
        <thead class="bg-gray-100">
            <th class="border px-3 py-2">ID</th>
            <th class="border px-3 py-2">Nombre</th>
            <th class="border px-3 py-2">Descripción</th>
            <th class="border px-3 py-2">Beneficios</th>
            <th class="border px-3 py-2">Categoría</th>
            <th class="border px-3 py-2">Estado</th>
            <th class="border px-3 py-2">Precio</th>
            <th class="border px-3 py-2">Stock</th>
            <th class="border px-3 py-2">Stock mínimo</th>
            <th class="border px-3 py-2">Acciones</th>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td class="border px-3 py-2">{{ $product->id }}</td>
                <td class="border px-3 py-2">{{ $product->name }}</td>
                <td class="border px-3 py-2" title="{{ $product->description }}">{{ $product->description }}</td>
                <td class="border px-3 py-2" title="{{ $product->benefits }}">{{ $product->benefits }}</td>
                <td class="border px-3 py-2">{{ $product->category->name ?? 'Sin categoría' }}</td>
                <td class="border px-3 py-2">{{ $product->status ? 'Disponible' : 'No disponible' }}</td>
                <td class="border px-3 py-2">{{ $product->price }}</td>
                <td class="border px-3 py-2">{{ $product->stock }}</td>
                <td class="border px-3 py-2">{{ $product->stock_min }}</td>
                <td class="border px-3 py-2">
                    <a class="" href="{{ route('products.show',$product) }}">Ver</a>
                    <a class="" href="{{ route('products.edit',$product) }}">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="" type="submit" onclick="return confirm('¿Desea eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No hay productos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>
    @endsection