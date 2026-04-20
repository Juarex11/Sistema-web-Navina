<div x-show="openEditModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    x-cloak>
    <div class="bg-white rounded-2xl p-8 w-full max-w-lg" @click.away="openEditModal = false">
        <div class="flex justify-between mb-3">
            <p class="modal-title text-3xl font-bold">
                Editar Promoción
            </p>
            <button @click="openEditModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <form :action="`/admin/promotions/${promotionData.id}`" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="text-gray-400 pb-2">
                Edita los detalles de la promoción
            </p>
            <div class="gap-4 mb-4">
                <div>
                    <p class="block mb-1 font-medium text-gray-700">Título:</p>
                    <input type="text" x-model="promotionData.title" name="title" required placeholder="Título de la promoción"
                        class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div>
                    <p class="block mb-1 font-medium text-gray-700">Descripción:</p>
                    <textarea x-model="promotionData.description" name="description" required placeholder="Descripción de la promoción"
                        class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"></textarea>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="block mb-1 font-medium text-gray-700">Estado:</p>
                    <select x-model="promotionData.status" name="status"
                        class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    </select>
                </div>
                <div>
                    <p class="block mb-1 font-medium text-gray-700">Imagen:</p>
                    <input type="file" name="image" @change="previewImage" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                </div>
            </div>
            <div class="flex justify-center p-6" x-show="imagePreview">
                <div class="relative w-full max-w-[200px]">
                    <p class="text-xs text-center text-gray-400 mb-1">Vista previa del banner:</p>
                    <img :src="imagePreview"
                        class="rounded-lg shadow-md border border-gray-200 object-cover w-full h-32">
                    <button type="button"
                        @click="imagePreview = null; $el.closest('form').querySelector('input[type=file]').value = ''"
                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center shadow-lg">
                        ✕
                    </button>
                </div>
            </div>
            <div class="flex justify-end gap-3 py-4">
                <button type="submit"
                    class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 py-2 px-4 transition-all rounded-md">
                    Editar promoción
                </button>
            </div>
        </form>
    </div>
</div>