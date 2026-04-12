<div x-show="openEditModal" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-8 mx-4" @click.away="openEditModal = false">
        <div class="flex justify-between mb-3">
            <p class="text-3xl font-bold">
                Editar categoría
            </p>
            <button @click="openEditModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <form :action="`/admin/categories/${categoryData.id}`" method="POST">
            @csrf
            @method('PUT')
            <p class="text-gray-400 pb-2">
                Modifica los detalles de la categoría.
            </p>
            <div class="mb-4">
                <label class="font-bold block mb-1">Nombre:</label>
                <input x-model="categoryData.name"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                    type="text" name="name" placeholder="Nombre de la categoría" required>
            </div>
            <div class="mb-4">
                <label class="font-bold block mb-1">Estado:</label>
                <select x-model="categoryData.status"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                    name="status">
                    <option value="1">Disponible</option>
                    <option value="0">No disponible</option>
                </select>
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