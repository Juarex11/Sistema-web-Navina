<div x-show="openShowModal" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl p-8 mx-4" @click.away="openShowModal = false">
        <div class="flex justify-between mb-3">
            <button @click="openShowModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <div class="grid grid-cols-2 gap-0.5">
            {{-- IMÁGENES --}}
            <div class="relative bg-gray-50 rounded-2xl flex items-center justify-center border border-gray-100 overflow-hidden h-full min-h-[400px]">
                <img :src="productData.images && productData.images.length > 0 
                     ? '/storage/' + productData.images[currentImageIndex].directory 
                     : '/images/no-image.png'" 
                     class="object-contain w-full h-full max-h-[500px]">

                <template x-if="productData.images?.length > 1">
                    <div class="absolute inset-0 flex items-center justify-between px-4">
                        <button @click="prevImage()" class="bg-white/90 hover:bg-pink-500 hover:text-white p-2 rounded-full shadow transition-all">
                            ←
                        </button>
                        <button @click="nextImage()" class="bg-white/90 hover:bg-pink-500 hover:text-white p-2 rounded-full shadow transition-all">
                            →
                        </button>
                    </div>
                </template>

                <div class="absolute bottom-4 right-4 bg-black/60 text-white px-3 py-1 rounded-full text-xs font-bold" x-show="productData.images?.length > 0">
                    <span x-text="currentImageIndex + 1"></span> / <span x-text="productData.images.length"></span>
                </div>
            </div>
            {{-- INFO --}}
            <div>
                <h1 x-text="productData.name" class="mb-1 text-3xl font-extrabold text-gray-600 font-mulish"></h1>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">DESCRIPCIÓN:</h5>
                    <p x-text="productData.description"></p>
                </div>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">BENEFICIOS:</h5>
                    <p style="white-space: pre-line;" x-text="productData.benefits"></p>
                </div>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">ESTADO:</h5>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <p class="font-bold" x-text="productData.status == 1 ? 'disponible' : 'No disponible'"></p>
                    </div>
                </div>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">CATEGORÍA:</h5>
                    <p class="font-bold"
                        x-text="allCategories.find(c => c.id == productData.category_id)?.name || 'Sin categoría'"></p>
                </div>
                <div class="mb-1 pb-2">
                    <h5 class="font-bold text-pink-500 font-mulish">SUB CATEGORÍA:</h5>
                    <p class="font-bold"
                        x-text="allSubcategories.find(s => s.id == productData.subcategory_id)?.name || 'Sin subcategoría'">
                    </p>
                </div>
                <div class="mb-1 grid grid-cols-2">
                    <div class="flex">
                        <p class="font-extrabold text-pink-500 font-mulish">S/.</p>
                        <p x-text="productData.final_price" class="font-extrabold text-pink-500 font-mulish px-2"></p>
                        <s class="text-sm font-extrabold text-gray-300 font-mulish line-through ml-2">S/.</s>
                        <s x-text="productData.price"
                            class="text-sm font-extrabold text-gray-300 font-mulish line-through ml-2"></s>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </section>
</div>