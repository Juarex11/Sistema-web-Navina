<section id="servicesHome">

  <header class="py-10">
    <p class="text-pink-700 font-semibold text-4xl text-center pb-3">
      Servicios especiales
    </p>
    <p class="text-gray-400 font-semibold text-2xl text-center">
      Ofrecemos una variedad de servicios para satisfacer tus necesidades.
    </p>
  </header>


  <div class="grid grid-cols-2 max-w-250 gap-12 mx-auto">

    @if($services->count() > 0)

    @foreach($services as $service)

    <article class="rounded-2xl overflow-hidden border border-neutral-200 shadow-md">

      <div class="flex flex-col items-center text-center">

        <img src="{{ asset('storage/' . $service->image) }}" class="transform scale-100 hover:scale-105 transition-all"></img>

        <section class="p-5">

          <p class="text-2xl font-semibold pb-4">
            {{ $service->title }}
          </p>

          <p class="text-md font-medium text-gray-500 line-clamp-4">
            {{ trim($service->description) }}
          </p>

          <div class="flex justify-center gap-4 pt-5">

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