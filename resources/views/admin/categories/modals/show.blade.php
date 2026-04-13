<div x-show="openShowModal" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6" @click.away="openShowModal = false">
        <div class="flex justify-between mb-3">
            <p class="text-3xl font-bold">
                Mostrar categoría
            </p>
            <button @click="openShowModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <p class="text-gray-400 pb-2">
            Verifica los detalles de la categoría.
        </p>
        <div class="mb-1">
            <h5 class="text-pink-500 font-mulish font-bold text-2xl">Nombre de la categoría</h5>
            <p class="font-bold" x-text="categoryData.name"></p>
        </div>
        <div class="mb-1">
            <h5 class="text-pink-500 font-mulish font-bold text-2xl">Estado de la categoría</h5>
            <p class="font-bold" x-text="categoryData.status ? 'Disponible' : 'No disponible'"></p>
        </div>
    </div>
</div>