<div x-show="openEditModal" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6" @click.away="openEditModal = false">
        <div class="flex justify-between mb-3">
            <p class="text-3xl font-bold">
                Editar categoría
            </p>
            <button class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all"
                @click="openEditModal = false">
                ✕
            </button>
        </div>
        <p class="text-gray-400 pb-2">
            Modifica los detalles de la categoría. 
        </p>
        <form :action="`/admin/categories/${categoryData.id}`" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="font-bold block mb-1">Nombre:</label>
                <input x-model="categoryData.name" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la categoría" required>
            </div>
            <div class="mb-4">
                <label class="font-bold block mb-1">Estado:</label>
                <select x-model="categoryData.status" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                    <option value="1">Disponible</option>
                    <option value="0">No disponible</option>
                </select>
            </div>
            <div class="mb-4 flex justify-end">
                <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 py-2 px-4 transition-all rounded-md" type="submit">
                    Editar categoría
                </button>
            </div>
        </form>
    </div>