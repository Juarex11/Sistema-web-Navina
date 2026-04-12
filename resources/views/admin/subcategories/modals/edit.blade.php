<div x-show="openEditModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" x-cloak>
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-8 mx-4" @click.away="openEditModal = false">
        <div class="flex justify-between mb-3">
            <p class="modal-title text-3xl font-bold">
                Editar Usuario
            </p>
            <button @click="openEditModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <form :action="`/admin/subcategories/${subcategoryData.id}`" method="POST">
            @csrf
            @method('PUT')
            <p class="text-gray-400 pb-2">
                Modifica los detalles de la subcategoría.
            </p>
            <div class="mb-4">
                <label class="font-bold block mb-1">Categoría principal:</label>
                <select x-model="subcategoryData.category_id" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="font-bold block mb-1">Nombre:</label>
                <input x-model="subcategoryData.name" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la subcategoría" required>
            </div>
            <div class="flex justify-end gap-3">
                <button type="submit"
                    class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>