<div class="fixed inset-0 bg-black/50 flex justify-center items-center backdrop-blur-xs"
    x-transition x-cloak
    x-show="openCreateModal">

    <form class="p-6 bg-white max-w-[90vw] max-h-[90vh] rounded-xl flex"
        @click.away="openCreateModal = false"
        method="POST" action="{{ route('admin.products.store') }}"
        enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-5 flex-1 min-h-0">

            {{-- Columna izquierda --}}
            <div class="flex flex-col overflow-y-auto pr-4">

                <h5 class="modal-title text-2xl font-bold">
                    Añadir producto
                </h5>
                <p class="text-gray-400 pb-2">
                    Agrega los datos del producto.
                </p>

                <div class="mb-1">
                    <label class="block mb-1 font-medium text-gray-700">
                        Nombre:
                    </label>
                    <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                        type="text" name="name" placeholder="Nombre del producto" required>
                </div>
                <div class="mb-1">
                    <label class="block mb-1 font-medium text-gray-700">
                        Categoría:
                    </label>
                    <select class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                        name="category_id" required>
                        <option value="">- Seleccionar -</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach ($categories as $category)

                @if($category->subcategories->count() > 0)

                <div class="mb-1">
                    <label class="mb-1 font-medium text-gray-700">
                        Subcategoria:
                    </label>
                    <select class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                        name="subcategory_id" required>
                        <option value="">- Seleccionar -</option>
                        @foreach($category->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                @endif

                @endforeach

                <div class="mb-1">
                    <label class="block mb-1 font-medium text-gray-700">
                        Estado:
                    </label>
                    <select class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                        name="status">
                        <option value="1">Disponible</option>
                        <option value="0">No disponible</option>
                    </select>
                </div>
                <div class="grid grid-cols-3 gap-4 mb-1">
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Precio: S/.
                        </label>
                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                            type="number" name="price" step="0.01" min="0" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Stock:
                        </label>
                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                            type="number" name="stock" min="0" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">
                            Descuento:
                        </label>
                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                            type="number" name="discount" step="0.01" min="0" max="100" required>
                    </div>

                </div>
                <div class="mb-1">
                    <label class="block mb-1 font-medium text-gray-700">
                        Descripción:
                    </label>
                    <textarea class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                        name="description" placeholder="Descripción del producto"></textarea>
                </div>
                <div class="mb-1">
                    <label class="block mb-1 font-medium text-gray-700">
                        Beneficios:
                    </label>
                    <textarea class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-rose-300"
                        name="benefits" placeholder="Beneficios del producto"></textarea>
                </div>
            </div>

            {{-- Columna derecha --}}
            <div class="overflow-hidden">
                <div class="mb-1">
                    <label class="block mb-2 font-medium text-gray-700">
                        Imagenes:
                    </label>

                    <input class="min-w-full px-3 py-1 rounded-lg border border-gray-400 bg-gray-100 hover:bg-gray-300 transition-all file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-black"
                        @change="handlePreview"
                        type="file"
                        name="images[]"
                        accept="image/*"
                        multiple>

                    <div class="flex flex-wrap gap-2 mt-4">
                        <template x-for="(image, index) in imagesPreview" :key="index">
                            <div class="relative w-20 h-20 rounded-lg overflow-hidden border border-pink-300">
                                <img :src="image" class="w-full h-full object-cover">
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 py-2 px-4 transition-all rounded-md">
                        Añadir Producto
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>