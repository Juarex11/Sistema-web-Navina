<section id="servicesHome">

    <header class="py-10">
        <p class="text-pink-700 font-semibold text-4xl text-center pb-3">
            Servicios especiales
        </p>

        <p class="text-gray-400 font-semibold text-2xl text-center px-4">
            Ofrecemos una variedad de servicios para satisfacer tus necesidades.
        </p>
    </header>

    {{-- SERVICIOS --}}
    <div
    x-data="{
        page: 0,
        perPage: window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1,
        total: {{ $services->count() }},

        get pages() {
            return Math.ceil(this.total / this.perPage)
        }
    }"

    x-init="
        window.addEventListener('resize', () => {
            perPage =
                window.innerWidth >= 1024 ? 3 :
                window.innerWidth >= 640 ? 2 : 1
        })
    "

    class="max-w-7xl mx-auto px-4 mb-16">

        <div class="overflow-hidden">

            <div
            class="flex transition-transform duration-500"
            :style="'transform: translateX(-' + (page * 100) + '%)'">

                @foreach($services as $service)

                    <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] flex justify-center px-2">

                        <article class="w-[280px] h-[420px] rounded-2xl overflow-hidden border border-neutral-200 shadow-md bg-white">

                            <div class="flex flex-col h-full text-center">

                                {{-- IMAGEN --}}
                                <div class="w-full h-[160px] overflow-hidden">
                                    <img
                                        src="{{ asset('storage/' . $service->image) }}"
                                        class="w-full h-full object-cover object-center transition-all duration-300 hover:scale-105">
                                </div>

                                {{-- CONTENIDO --}}
                                <section class="p-5 flex flex-col flex-1">

                                    <p class="text-2xl font-semibold pb-1">
                                        {{ $service->title }}
                                    </p>

                                    <p class="h-[100px] text-md font-medium text-gray-500 line-clamp-4">
                                        {{ trim($service->description) }}
                                    </p>

                                    <div class="flex flex-wrap justify-center gap-2 pt-5 mt-auto">

                                        @foreach($service->features as $feature)

                                            <p class="border border-pink-700 text-pink-700 text-sm font-semibold rounded-full px-2 py-1">
                                                {{ $feature }}
                                            </p>

                                        @endforeach

                                    </div>

                                </section>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- PAGINACIÓN --}}
        <div class="flex justify-center gap-3 mt-6">

            <template x-for="i in pages">

                <button
                    @click="page = i - 1"
                    class="w-3 h-3 rounded-full transition"
                    :class="page === (i - 1)
                        ? 'bg-pink-400 scale-110'
                        : 'bg-gray-300'">
                </button>

            </template>

        </div>

    </div>

</section>