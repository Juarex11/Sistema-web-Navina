<div class="fixed inset-0 bg-black/50 flex justify-center items-center backdrop-blur-xs"
  x-transition x-cloak
  x-show="openEditModal">

  <form class="p-6 bg-white max-w-[90vw] max-h-[90vh] rounded-xl flex"
    @click.away="openEditModal = false"
    :action="updateURL()"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="grid grid-cols-2 gap-5 text-start flex-1 min-h-0">

      <section class="flex flex-col gap-4 overflow-y-auto pr-4">

        <header>
          <h5 class="text-2xl font-bold">
            Editar producto
          </h5>
          <p class="text-gray-400">
            Modifica los detalles del producto.
          </p>
        </header>

        <div>
          <label class="block mb-1 font-medium text-gray-700">
            Nombre:
          </label>
          <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-pink-300"
            type="text"
            name="name"
            placeholder="Nombre del producto"
            :value="productData.name"
            required>
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">
            Categoría:
          </label>

          <select class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-pink-300"
            x-model="productData.category_id"
            @change="productData.subcategory_id = ''"
            name="category_id"
            required>

            <template x-for="category in categoriesData" :key="category.id">
              <option
                :value="category.id"
                x-text="category.name">
              </option>
            </template>

          </select>
        </div>

        <div x-show="filteredSubcategories().length > 0">

          <label class="font-medium text-gray-700">
            Subcategoria:
          </label>

          <select class="w-full px-3 py-1 mt-1 rounded-lg border border-gray-300 focus:outline-pink-300"
            x-model="productData.subcategory_id"
            name="subcategory_id"
            required>

            <template x-for="subcategory in filteredSubcategories()" :key="subcategory.id">
              <option
                :value="subcategory.id"
                x-text="subcategory.name">
              </option>
            </template>

          </select>

        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">
            Estado:
          </label>
          <select
            class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-pink-300"
            x-model="productData.status"
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
            <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-pink-300"
              type="number"
              name="price"
              step="0.01"
              min="0"
              :value="productData.price"
              required>
          </div>
          <div>
            <label class="block mb-1 font-medium text-gray-700">
              Stock:
            </label>
            <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-pink-300"
              type="number"
              name="stock"
              min="0"
              :value="productData.stock"
              required>
          </div>
          <div>
            <label class="block mb-1 font-medium text-gray-700">
              Descuento:
            </label>
            <input class="w-full px-3 py-1 rounded-lg border border-gray-300 focus:outline-pink-300"
              type="number"
              name="discount"
              step="0.01"
              min="0"
              max="100"
              :value="productData.discount"
              required>
          </div>
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">
            Descripción:
          </label>
          <textarea class="w-full min-h-20 px-3 py-2 rounded-lg border border-gray-300 focus:outline-pink-300"
            name="description"
            placeholder="Descripción del producto"
            :value="productData.description"></textarea>
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">
            Beneficios:
          </label>
          <textarea class="w-full min-h-20 px-3 py-2 rounded-lg border border-gray-300 focus:outline-pink-300"
            name="benefits"
            placeholder="Beneficios del producto"
            :value="productData.benefits"></textarea>
        </div>

      </section>

      <section class="overflow-hidden flex flex-col gap-4">

        <label class="block font-medium text-gray-700">
          Imagenes:
        </label>

        <input class="p-5 rounded-lg border-1.5 border-sky-300 bg-sky-50 text-center shadow-md cursor-pointer"
          @change="handlePreview"
          type="file"
          name="images[]"
          accept="image/*"
          multiple>

        <div class="p-3 flex items-center gap-4 rounded-lg border-1.5 border-amber-200 bg-amber-100"
          x-show="imagesPreview.length > 0">
          <template x-for="(image, index) in imagesPreview" :key="index">

            <div class="flex items-center gap-4">
              <img :src="image" class="size-20 rounded-lg object-cover">
              <span class="text-amber-400 font-medium">Nueva Imagen</span>
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