<div class="modal fade hidden" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="flex justify-end">
                    <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                </div>
                <h5 class="modal-title text-3x1 font-bold">
                    Editar categoría
                </h5>
                <p class="text-gray-400 pb-2">
                    Modifica los detalles de la categoría.
                </p>
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="font-bold block mb-1">Nombre:</label>
                        <input id="editName" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la categoría" required>
                    </div>
                    <div class="mb-4">
                        <label class="font-bold block mb-1">Estado:</label>
                        <select id="editStatus" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                            <option value="1">Disponible</option>
                            <option value="0">No disponible</option>
                        </select>
                    </div>
                    <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 flex justify-end gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                        Editar categoría
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>