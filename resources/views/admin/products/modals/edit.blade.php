<div class="fixed inset-0 bg-black/50 hidden justify-center items-center backdrop-blur-xs"
    id="updateProduct-{{ $product->id }}"
    tabindex="-1">

    <form class="p-6 bg-white max-w-[90vw] max-h-[90vh] rounded-xl flex"
        action="{{ route('admin.products.update', $product->id) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-2 gap-5 text-start flex-1 min-h-0">

            <div class="flex flex-col gap-3 overflow-y-auto pr-4">
                <header>
                    <h5 class="text-2xl font-bold">
                        Editar producto
                    </h5>
                    <p class="text-gray-400">
                        Modifica los detalles del producto.
                    </p>
                </header>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Nombre:
                    </label>
                    <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                        type="text"
                        name="name"
                        placeholder="Nombre del producto"
                        value="{{ old('name', $product->name ?? '') }}"
                        required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Categoría:
                    </label>
                    <select class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                        name="category_id"
                        required>
                        <option value="">- Seleccionar -</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Sub categoría:
                    </label>
                    <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                        type="text"
                        name="sub_category"
                        placeholder="Nombre de la subcategoría">
                </div> -->
                <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Estado:
                    </label>
                    <select class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                        name="status"
                        {{ old('status', $product->status) == $product->status ? 'selected' : '' }}>
                        <option value="1">Disponible</option>
                        <option value="0">No disponible</option>
                    </select>
                </div>

                <div class="grid grid-cols-3 gap-4 mb-1">
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Precio: S/.
                        </label>
                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            type="number"
                            name="price"
                            step="0.01"
                            min="0"
                            value="{{ old('price', $product->price ?? '') }}"
                            required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Stock:
                        </label>
                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            type="number"
                            name="stock"
                            min="0"
                            value="{{ old('stock', $product->stock ?? '') }}"
                            required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Descuento:
                        </label>
                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            type="number"
                            name="discount"
                            step="0.01"
                            min="0"
                            max="100"
                            value="{{ old('discount', $product->discount ?? '') }}"
                            required>
                    </div>

                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Descripción:
                    </label>
                    <textarea class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                        name="description"
                        placeholder="Descripción del producto">{{ old('description', $product->description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Beneficios:
                    </label>
                    <textarea class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                        name="benefits"
                        placeholder="Beneficios del producto">{{ old('benefits', $product->benefits ?? '') }}</textarea>
                </div>
            </div>

            {{-- Columna derecha --}}
            <div class="overflow-hidden flex flex-col gap-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">
                        Imagenes:
                    </label>
                    <div class="p-5 rounded-lg border-1.5 border-sky-300 bg-sky-50 text-center shadow-md cursor-pointer"
                        id="dropZone">

                        <input type="file"
                            name="images[]"
                            id="imageInput"
                            class="hidden"
                            accept="image/*">

                        <div class="flex flex-col gap-2">
                            <i class="bx bx-arrow-to-top text-neutral-300 text-3xl"></i>
                            Arrastra tu imagen aquí o haz clic para seleccionar
                        </div>
                    </div>
                </div>

                <div class="p-3 flex items-center gap-4 rounded-lg border-1.5 border-rose-200 bg-rose-100">
                    @if($product->images)

                    <img class="size-20 rounded-lg"
                        src="{{ asset('storage/' . $product->images->first()->directory ?? '') }}" alt="">
                    <span class="text-rose-400 font-medium">Imagen Actual</span>

                    @else
                    <span class="text-rose-400 font-medium">No Image</span>
                    @endif

                </div>

                <div class="p-3 rounded-lg border-1.5 border-yellow-200 bg-yellow-100 hidden overflow-y-auto"
                    id="previewContainer">
                    <img id="previewImage" class="w-32 rounded">
                </div>

                <div class="flex justify-end">
                    <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 py-2 px-4 transition-all rounded-md">
                        Editar Producto
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>