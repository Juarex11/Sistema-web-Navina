@extends('dashboard.layout')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-semibold text-center pb-6 font-mulish">
                Actualizar categoría
            </h1>
            <br><br>
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <form method="POST" action="{{ route('categories.update',$category) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3 class="font-mulish text-xl mb-4 text-gray-800">
                    Detalles de la categoría
                </h3>

                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Nombre:</label>
                    <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la categoría" value="{{ old('name',$category->name) }}" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Estado:</label>
                        <select class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                            <option value="1">Disponible</option>
                            <option value="0">No disponible</option>
                        </select>
                </div>
                <div class="actions">
                    <button class="px-4 py-2 text-white rounded-lg shadow-md" style="background-color:#f180a9" type="submit">Actualizar categoría</button>
                    <button class="px-4 py-2 text-white rounded-lg shadow-md" style="background-color:#f180a9" type="reset">Vaciar datos</button>
                    <a class="px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md" href="{{ route('categories.index') }}">Volver</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection