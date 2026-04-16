<div class="fixed inset-0 bg-black/50 flex justify-center items-center backdrop-blur-xs"
  x-show="openShowModal"
  x-transition x-cloak>

  <section class="min-w-[60vw] max-w-220 max-h-[90vh] bg-white flex rounded-xl overflow-hidden text-start modalContent
  xl:max-h-[70vh]"
    @click.away="openShowModal = false">

    <div class="w-full flex flex-1 min-h-0">

      <img class="max-w-200 object-cover"
        x-show="productData.images.length > 0"
        :src="productData.images?.length 
        ? `/storage/${productData.images[0].directory}` 
        : ''"
        alt="image">

      <div class="p-5 overflow-y-auto">

        <h1 class="text-2xl font-semibold " x-text="productData.name"></h1>

        <template x-for="category in categoriesData" :key="category.id">
          <p class="text-lg font-semibold text-neutral-700"
            x-text="category.id == productData.category_id && category.name">
          </p>
        </template>

        <p class="text-4xl text-green-400 font-bold font-mulish py-1"
        x-text="`S/ ${productData.price}`">
        </p>

        <p class="text-sm text-neutral-400"
        x-text="productData.description">
        </p>

        <h1 class="text-xl text-neutral-800 font-semibold py-1">Beneficios</h1>

        <p class="text-sm text-neutral-500"
        x-text="productData.benefits">
        </p>

      </div>

    </div>

  </section>
</div>