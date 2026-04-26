<section id="servicesHome">

  <header class="py-10">
    <p class="text-pink-700 font-semibold text-4xl text-center pb-3">
      Servicios especiales
    </p>
    <p class="text-gray-400 font-semibold text-2xl text-center">
      Ofrecemos una variedad de servicios para satisfacer tus necesidades.
    </p>
  </header>


  <div class="grid grid-cols-3 max-w-250 gap-8 mx-auto">

    @if($services->count() > 0)

    @foreach($services as $service)

      <article class="w-[280px] h-[420px] rounded-2xl overflow-hidden border border-neutral-200 shadow-md">

        <div class="flex flex-col text-center">

          <!-- CONTENEDOR CONTROLADO -->
          <div class="w-full h-[160px] overflow-hidden">
            <img 
              src="{{ asset('storage/' . $service->image) }}"
              class="w-full h-full object-cover object-center transition-all duration-300 hover:scale-105"
            >
          </div>

          <section class="p-5 flex flex-col flex-1">

            <p class="text-2xl font-semibold pb-1">
              {{ $service->title }}
            </p>

            <p class="h-[100px] text-md font-medium text-gray-500 line-clamp-4">
              {{ trim($service->description) }}
            </p>

            <div class="flex justify-center gap-4 pt-5 mt-auto">
              @foreach($service->features as $feature)
              <p class="border border-pink-700 text-pink-700 text-sm font-semibold rounded-full px-2 py-1">
                {{ $feature }}
              </p>
              @endforeach
            </div>

          </section>

        </div>

      </article>

    @endforeach

    @endif

  </div>
</section>