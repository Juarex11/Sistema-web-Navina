<div x-show="openEditModal" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl p-8 mx-4" @click.away="openEditModal = false">
        <div class="flex justify-between mb-3">
            <p class="modal-title text-3xl font-bold">
                Editar Producto
            </p>
            <button @click="openEditModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <form method="POST" :action="`/admin/products/${productData.id}`" enctype="multipart/form-data"
            onsubmit="alert('FORM EDIT ENVIADO')">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                {{-- Columna izquierda --}}
                <div class=" overflow-hidden">
                    <p class="text-gray-400 pb-2">
                        Modifica los detalles del producto.
                    </p>

                    <div class="mb-1">
                        <label class="block mb-1 font-medium text-gray-700">
                            Nombre:
                        </label>
                        <input
                            class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            type="text" name="name" x-model="productData.name" placeholder="Nombre del producto"
                            required>
                    </div>
                    <div class="mb-1">
                        <label class="block mb-1 font-medium text-gray-700">
                            Categoría:
                        </label>
                        <select
                            class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            name="category_id" x-model="productData.category_id" required>
                            <option value="">--- Seleccionar ---</option>
                            <template x-for="cat in allCategories" :key="cat.id">
                                <option :value="cat.id" x-text="cat.name"></option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="block mb-1 font-medium text-gray-700">
                            Sub categoría:
                        </label>
                        <select
                            class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            name="subcategory_id" x-model="productData.subcategory_id">
                            <template x-for="sub in filteredSubcategories" :key="sub.id">
                                <option :value="sub.id" x-text="sub.name"></option>
                            </template>

                            <template x-if="filteredSubcategories.length === 0">
                                <option value="">-- Sin subcategoría --</option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="block mb-1 font-medium text-gray-700">
                            Estado:
                        </label>
                        <select
                            class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
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
                            <input
                                class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                                type="number" name="price" x-model="productData.price" step="0.01" min="0" required>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium text-gray-700">
                                Stock:
                            </label>
                            <input
                                class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                                type="number" name="stock" x-model="productData.stock" min="0" required>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium text-gray-700">
                                Descuento %:
                            </label>
                            <input
                                class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                                type="number" name="discount" x-model="productData.discount" step="1" min="0" max="100"
                                required>
                        </div>

                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-1">
                        <div class="mb-1">
                            <label class="block mb-1 font-medium text-gray-700">
                                Descripción:
                            </label>
                            <textarea
                                class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                                name="description" x-model="productData.description"
                                placeholder="Descripción del producto"></textarea>
                        </div>
                        <div class="mb-1">
                            <label class="block mb-1 font-medium text-gray-700">
                                Beneficios:
                            </label>
                            <textarea
                                class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                                name="benefits" x-model="productData.benefits"
                                placeholder="Beneficios del producto"></textarea>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label class="block mb-1 font-medium text-gray-700">
                            Casos de uso:
                        </label>
                        <textarea
                            class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                            name="use_mode" x-model="productData.use_mode"
                            placeholder="Casos de uso del producto"></textarea>
                    </div>
                </div>
                {{-- Columna derecha --}}
                <div>
                    <div class="mb-1">
                        <input
                            class="min-w-full px-3 py-6 rounded-lg border border-gray-400 bg-gray-100 hover:bg-gray-300 transition-all file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-black"
                            type="file" name="images[]" accept="image/*" multiple>
                        <div class="flex flex-wrap gap-2 mt-2"></div>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <template x-for="(img, index) in productData.images" :key="index">
                            <div class="relative w-20 h-20 border rounded-lg overflow-hidden">
                                <img :src="'/storage/' + img.directory" class="object-cover w-full h-full">
                            </div>
                        </template>
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md"
                            type="submit">
                            Actualizar Producto
                        </button>
                    </div>
                </div>
            </div>

          </template>
        </div>

        <div class="p-3 flex items-center gap-4 rounded-lg border-1.5 border-rose-200 bg-rose-100">

          <template x-if="productData.images && productData.images.length > 0">
            <div class="flex items-center gap-4">

              <img class="size-20 rounded-lg object-cover"
                :src="`/storage/${productData.images[0].directory}`"
                :alt="productData.name">

              <span class="text-rose-400 font-medium">Imagen Actual</span>

            </div>
          </template>

          <template x-if="!productData.images || productData.images.length === 0">
            <span class="text-rose-400 font-medium">No Image</span>
          </template>

        </div>

        <div class="flex justify-end">
          <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 py-2 px-4 
          transition-all rounded-md cursor-pointer">
            Editar Producto
          </button>
        </div>

      </section>

    </div>
  </form>
</div>