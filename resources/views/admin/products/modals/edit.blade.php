<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="flex justify-end">
                    <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" id="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-6">
                        {{-- Columna izquierda --}}
                        <div class=" overflow-hidden">
                            <h5 class="modal-title text-3x1 font-bold">
                                Editar producto
                            </h5>
                            <p class="text-gray-400 pb-2">
                                Modifica los detalles del producto.
                            </p>

                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Nombre:
                                </label>
                                <input id="editName" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre del producto" required>
                            </div>
                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Categoría:
                                </label>
                                <select id="editCategory" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id" required>
                                    <option value="">--- Seleccionar ---</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Sub categoría:
                                </label>
                                <input id="editSubCategory" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="sub_category" placeholder="Nombre de la subcategoría">
                            </div>
                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Estado:
                                </label>
                                <select id="editStatus" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                                    <option value="1">Disponible</option>
                                    <option value="0">No disponible</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-1">
                                <div>
                                    <label class="block mb-1 font-medium text-gray-700">
                                        Precio: S/.
                                    </label>
                                    <input id="editPrice" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="price" step="0.01" min="0" required>
                                </div>
                                <div>
                                    <label class="block mb-1 font-medium text-gray-700">
                                        Stock:
                                    </label>
                                    <input id="editStock" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="stock" min="0" required>
                                </div>
                                <div>
                                    <label class="block mb-1 font-medium text-gray-700">
                                        Descuento:
                                    </label>
                                    <input id="editDiscount" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="discount" step="0.01" min="0" max="100" required>
                                </div>

                            </div>
                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Descripción:
                                </label>
                                <textarea id="editDescription" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="description" placeholder="Descripción del producto"></textarea>
                            </div>
                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Beneficios:
                                </label>
                                <textarea id="editBenefits" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="benefits" placeholder="Beneficios del producto"></textarea>
                            </div>
                        </div>
                        {{-- Columna derecha --}}
                        <div class="overflow-hidden">
                            <div class="mb-1">
                                <label class="block mb-1 font-medium text-gray-700">
                                    Imagenes:
                                </label>
                                <input id="imagesInputEdit" class="min-w-full px-3 py-1 rounded-lg border border-gray-400 bg-gray-100 hover:bg-gray-300 transition-all file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-black" type="file" name="images[]" accept="image/*" multiple>
                                <div id="previewImagesEdit" class="flex flex-wrap gap-2 mt-2"></div>
                            </div>
                            <div class="flex justify-end">
                                <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                                    Editar Producto
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>