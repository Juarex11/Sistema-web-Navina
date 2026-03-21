<div class="fixed inset-0 bg-black/50 hidden justify-center items-center backdrop-blur-xs"
    id="showProduct-{{ $product->id }}"
    tabindex="-1">

    <section class="min-w-[60vw] max-w-220 max-h-[90vh] bg-white flex rounded-xl overflow-hidden text-start modalContent
    xl:max-h-[70vh]">

        <div class="w-full flex flex-1 min-h-0">

            <img class="max-w-200"
                src="{{ asset('storage/' . $product->images->first()->directory ?? '') }}">

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