@extends('dashboard.layout')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-semibold text-center pb-6 font-mulish">
                Lista de categorías
            </h1>

            <div class="flex gap-3 mb-6">
                <a class="px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md" href="{{ route('dashboard') }}">Volver</a>
                <a class="px-4 py-2 text-white rounded-lg shadow-md" style="background-color:#f180a9" href="{{ route('categories.create') }}">+ Añadir nueva categoría</a>
            </div>
            <div class="overflow-x-auto">
                <div class="rounded-xl overflow-hidden border border-gray-300" style="max-width: 1200px;">
                    <table class="min-w-full text-center" style="width: 1200px;">
                        <thead style="background-color:#f180a9" class="text-white">
                            <tr>
                                <th class="px-3 py-3">ID</th>
                                <th class="px-3 py-3">Nombre</th>
                                <th class="px-3 py-3">Estado</th>
                                <th class="px-3 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="px-3 py-2">{{ $category->id }}</td>
                                <td class="px-3 py-2">{{ $category->name }}</td>
                                <td class="px-3 py-2">{{ $category->status ? 'Disponible' : 'No disponible' }}</td>
                                <td class="px-3 py-2">
                                    <a class="px-3 py-1 bg-pink-500 text-white rounded-md text-sm" href="{{ route('categories.edit',$category) }}">Editar</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-pink-500 text-white rounded-md text-sm" type="submit" onclick="return confirm('¿Desea eliminar esta categoría?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No hay categorías registrados</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
    </div>
    </div>
    </div>
    </div>
@endsection