<div class="fixed inset-0 bg-black/50 hidden justify-center items-center backdrop-blur-xs"
    id="showProduct-{{ $product->id }}"
    tabindex="-1">

    <section class="min-w-[60vw] max-w-220 max-h-[90vh] bg-white flex rounded-xl overflow-hidden text-start modalContent
    xl:max-h-[70vh]">

        <div class="w-full flex flex-1 min-h-0">

            @if($product->images && $product->images->first() && file_exists(public_path('storage/' . $product->images->first()->directory . '/' . $product->images->first()->name)))
                <img class="max-w-200"
                    src="{{ asset('storage/' . $product->images->first()->directory . '/' . $product->images->first()->name) }}"
                    alt="{{ $product->name }}">
            @else
                <div class="max-w-200 h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">Sin imagen</span>
                </div>
            @endif

            {{-- INFO --}}
            <div class="p-5 overflow-y-auto">

                <h1 class="text-2xl font-semibold ">{{ old('name', $product->name ?? '') }}</h1>

                <p class="text-lg font-semibold text-neutral-700">
                    @foreach($categories as $category)

                    @if($category->id == $product->category_id)

                    {{ $category->name }}

                    @endif

                    @endforeach
                </p>

                <p class="text-4xl text-green-400 font-bold font-mulish py-1">
                    S/{{ old('price', $product->price ?? '') }}
                </p>

                <p class="text-sm text-neutral-400">
                    {{ old('description', $product->description ?? '') }}
                </p>

                <h1 class="text-xl text-neutral-800 font-semibold py-1">Beneficios</h1>

                <p class="text-sm text-neutral-500">
                    {{ old('benfits', $product->benefits ?? '') }}
                </p>

            </div>
        </div>
    </section>
</div>
<!-- 
<div x-show="showOpen" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div @click.outside="closeShow()" class="bg-white rounded-xl shadow-xl w-full max-w-3xl p-6">
        <div class="flex justify-end">
            <button @click="closeShow()"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <div class="grid grid-cols-2 gap-0.5">
            {{-- IMÁGENES --}}
            <div class="relative" style="margin-left:5%;margin-right:5%">

                <img :src="showProduct.images?.length
                ? '/storage/' + showProduct.images[currentImageIndex].directory
                : '/images/no-image.png'" class="object-contain rounded-xl border border-gray-200 bg-gray-50 w-full"
                    style="max-height:520px;">

                <button @click="prevImage()" x-show="showProduct.images?.length > 1"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full px-3 py-2 shadow">
                    ←
                </button>

                <button @click="nextImage()" x-show="showProduct.images?.length > 1"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full px-3 py-2 shadow">
                    →
                </button>

            </div>
            {{-- INFO --}}
            <div>
                <h1 x-text="showProduct.name" class="mb-1 text-3xl font-extrabold text-gray-600 font-mulish"></h1>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">DESCRIPCIÓN:</h5>
                    <p x-text="showProduct.description"></p>
                </div>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">BENEFICIOS:</h5>
                    <p style="white-space: pre-line;" x-text="showProduct.benefits"></p>
                </div>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">ESTADO:</h5>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <p class="font-bold" x-text="showProduct.status == 1 ? 'disponible' : 'No disponible'"></p>
                    </div>
                </div>
                <div class="mb-1">
                    <h5 class="font-bold text-pink-500 font-mulish">CATEGORÍA:</h5>
                    <p class="font-bold"
                        x-text="categories.find(c => c.id === showProduct.category_id)?.name || 'Sin categoría'">></p>
                </div>
                <div class="mb-1 pb-2">
                    <h5 class="font-bold text-pink-500 font-mulish">SUB CATEGORÍA:</h5>
                    <p class="font-bold"
                        x-text="subcategories.find(s => s.id === showProduct.subcategory_id)?.name || 'Sin subcategoría'">
                    </p>
                </div>
                <div class="mb-1 grid grid-cols-2">
                    <div class="flex">
                        <p class="font-extrabold text-pink-500 font-mulish">S/.</p>
                        <p x-text="showProduct.final_price" class="font-extrabold text-pink-500 font-mulish px-2"></p>
                        <s class="text-sm font-extrabold text-gray-300 font-mulish line-through ml-2">S/.</s>
                        <s x-text="showProduct.price"
                            class="text-sm font-extrabold text-gray-300 font-mulish line-through ml-2"></s>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->