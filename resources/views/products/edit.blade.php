@extends('dashboard.layout')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-semibold text-center pb-6 font-mulish">
                Actualizar producto
            </h1>
            <br><br>
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <form method="POST" action="{{ route('products.update',$product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3 class="font-mulish text-xl mb-4 text-gray-800">
                    Información del producto
                </h3>

                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Nombre:
                    </label>
                    <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre del producto" value="{{ old('name',$product->name) }}" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Descripción:
                    </label>
                    <textarea class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="description" placeholder="Descripción del producto">{{ old('description',$product->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Beneficios:
                    </label>
                    <textarea class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="benefits" placeholder="Beneficios del producto">{{ old('benefits',$product->benefits) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Categoría:
                    </label>
                        <select class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id" required>
                            <option value="">--- Seleccionar ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id',$product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">Estado:</label>
                        <select class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                            <option value="1" {{ old('status',$product->status) == 1 ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ old('status',$product->status) == 0 ? 'selected' : '' }}>No disponible</option>
                        </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Precio: S/.
                    </label>
                    <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="price" step="0.01" min="0" value="{{ old('price',$product->price) }}" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Stock:
                    </label>
                    <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="stock" min="0" value="{{ old('stock',$product->stock) }}" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Stock mínimo:
                    </label>
                    <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="stock_min" min="0" value="{{ old('stock_min',$product->stock_min) }}" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700">
                        Imagenes:
                    </label>
                    <input class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-white file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-white" type="file" name="images[]" accept="image/*" multiple>
                </div>
                <div class="actions">
                    <button class="px-4 py-2 text-white rounded-lg shadow-md" style="background-color:#f180a9" type="submit">Actualizar producto</button>
                    <button class="px-4 py-2 text-white rounded-lg shadow-md" style="background-color:#f180a9" type="reset">Vaciar datos</button>
                    <a class="px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md" href="{{ route('products.index') }}">Volver</a>
                </div>
            </div>
        </div>
    </form>
            </div>
        </div>
    </div>
@endsection