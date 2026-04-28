<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<section id="categories">

  <header class="pb-14">
    <p class="text-pink-700 font-semibold text-4xl text-center pb-3">
      Categorías de Productos
    </p>

    <p class="text-gray-400 font-semibold text-2xl text-center">
      Descubre nuestra amplia gama de productos de belleza diseñados para realzar tu belleza natural
    </p>
  </header>

  <div class="max-w-7xl mx-auto">

<div
  id="categoriesCarousel"
  class="
    flex gap-4 overflow-x-auto no-scrollbar
    snap-x snap-mandatory scroll-smooth
    px-4 pb-4

    md:grid md:grid-cols-3
    md:overflow-visible md:px-0
  ">

      {{-- CARD 1 --}}
      <article class="
        w-[280px]
        shrink-0
        snap-center

        md:w-auto

        p-5 rounded-xl shadow-md overflow-hidden
        border border-gray-300
        flex flex-col items-center text-center
      ">

        <p class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
          </svg>
        </p>

        <h4 class="font-bold text-2xl pt-4 pb-3 text-neutral-800">
          Cuidado Facial
        </h4>

        <p class="text-neutral-400 text-xl font-semibold pb-7">
          Productos especializados para el cuidado de tu rostro.
        </p>

        <ul class="space-y-2 text-gray-400 list-none font-bold pb-8">
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Limpiadores</span>
          </li>

          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Cérums</span>
          </li>

          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Mascarillas</span>
          </li>
        </ul>

        <button class="text-pink-400 hover:text-pink-600 transition-all font-bold text-md py-3">
          Ver productos
        </button>

      </article>

      {{-- CARD 2 --}}
      <article class="
        w-[280px]
        shrink-0
        snap-center

        md:w-auto

        p-5 rounded-xl shadow-md overflow-hidden
        border border-gray-300
        flex flex-col items-center text-center
      ">

        <p class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
          </svg>
        </p>

        <h4 class="font-bold text-2xl pt-4 pb-3 text-neutral-800">
          Maquillaje
        </h4>

        <p class="text-neutral-400 text-xl font-semibold pb-7">
          Cosméticos de alta calidad para realzar tu belleza natural.
        </p>

        <ul class="space-y-2 text-gray-400 list-none font-bold pb-8">
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Bases y correctores</span>
          </li>

          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Labiales y brillos</span>
          </li>

          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Sombras y delineadores</span>
          </li>
        </ul>

        <button class="text-pink-400 hover:text-pink-600 transition-all font-bold text-md py-3">
          Ver productos
        </button>

      </article>

      {{-- CARD 3 --}}
      <article class="
        w-[280px]
        shrink-0
        snap-center

        md:w-auto

        p-5 rounded-xl shadow-md overflow-hidden
        border border-gray-300
        flex flex-col items-center text-center
      ">

        <p class="bg-pink-200 text-pink-400 hover:-translate-y-1 transition-all rounded-full w-13 h-13 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
          </svg>
        </p>

        <h4 class="font-bold text-2xl pt-4 pb-3 text-neutral-800">
          Cuidado Capilar
        </h4>

        <p class="text-neutral-400 text-xl font-semibold pb-7">
          Solución completa para un cabello saludable y brillante.
        </p>

        <ul class="space-y-2 text-gray-400 list-none font-bold pb-8">
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Acondicionadores</span>
          </li>

          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Mascarillas capilares</span>
          </li>

          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ff6bbc" stroke-width="2">
              <path d="M20 6 9 17l-5-5"></path>
            </svg>
            <span>Aceites y sérums</span>
          </li>
        </ul>

        <button class="text-pink-400 hover:text-pink-600 transition-all font-bold text-md py-3">
          Ver productos
        </button>

      </article>

    </div>

  </div>

</section>