<div id="banner" class="relative w-full h-[calc(100vh-64px)] max-h-210 overflow-hidden">

  <div class="swiper size-full">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Banner -->
      @forelse ($promotions as $promotion)

      <div class="swiper-slide banner-slide p-6 bg-cover bg-center bg-no-repeat flex flex-col items-center">

        <img class="absolute w-full top-0 left-0 -z-10 opacity-85"
          src="{{ asset('storage/' . $promotion->image) }}"
          alt="banner"
          aria-hidden="true">

        <div class="text-center  mx-auto lg:py-10 xl:max-w-250">
          <p class="pb-10">
            <img class="bg-white rounded-full mx-auto size-24"
              alt="logo"
              src="{{ asset('imgs/NaviLogo.webp') }}"></img>
          </p>
          <p class="text-white text-4xl md:text-7xl font-bold [text-shadow:2px_2px_4px_rgba(0,0,0,0.7)] pb-6 md:pb-10
          lg:text-5xl xl:text-7xl">
            {{ $promotion->title }}
          </p>
          <div class="max-w-2xl mx-auto">
            <p class="text-white text-lg md:text-2xl [text-shadow:2px_2px_4px_rgba(0,0,0,0.6)] line-clamp-3 md:line-clamp-none
            lg:text-xl xl:text-2xl">
              {{ $promotion->description }}
            </p>
          </div>
          <div class="flex flex-col md:flex-row justify-center gap-4 md:gap-6 mt-8">
            <a href="{{ route('products') }}"
              class="px-6 py-3 md:px-10 md:py-4 rounded-lg text-lg font-semibold shadow-md text-white bg-pink-500 hover:shadow-lg hover:bg-pink-700 hover:-translate-y-1 transition-all">
              Ver promoción
            </a>
            <a href="{{ route('aboutUs') }}"
              class="px-6 py-3 md:px-10 md:py-4 rounded-lg text-lg font-semibold shadow-md text-pink-500 bg-gray-200 hover:shadow-lg hover:bg-white hover:-translate-y-1 transition-all">
              Conócenos
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="swiper-slide banner-slide p-20 bg-pink-100 flex items-center justify-center">
        <p class="text-pink-400 text-2xl font-bold">Bienvenidos a Navi</p>
      </div>
      @endforelse
    </div>
    <div class="swiper-pagination"></div>
    @if($promotions->count() > 1)
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    @endif
  </div>
</div>