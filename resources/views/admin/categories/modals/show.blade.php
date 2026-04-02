<div class="modal fade hidden" id="showModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="flex justify-end">
                    <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                </div>
                <h5 class="modal-title text-3x1 font-bold mb-1">
                    Ver categoría
                </h5>
                <div class="mb-1">
                    <h5 class="text-pink-500 font-mulish font-bold">Nombre de la categoría</h5>
                    <p class="font-bold" id="showName"></p>
                </div>
                <div class="mb-1">
                    <h5 class="text-pink-500 font-mulish font-bold">Estado de la categoría</h5>
                    <p class="font-bold" id="showStatus"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div x-show="showOpen" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div @click.outside="closeShow()" class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
        <div class="flex justify-between mb-3">
            <p class="text-3xl font-bold">
                Ver categoría
            </p>
            <button @click="closeShow()" class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <div class="mb-1">
            <h5 class="text-pink-500 font-mulish font-bold">Nombre de la categoría</h5>
            <p class="font-bold" x-text="category.name"></p>
        </div>
        <div class="mb-1">
            <h5 class="text-pink-500 font-mulish font-bold">Estado de la categoría</h5>
            <p class="font-bold" x-text="category.status ? 'Disponible' : 'No disponible'"></p>
        </div>
    </div>
</div> -->