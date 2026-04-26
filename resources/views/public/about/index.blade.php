@extends('app')

@section('content')

<main class="max-w-300 p-10 flex flex-col gap-10 mx-auto">

  <header class="text-center">
    <p class="text-gray-600 font-semibold">NUESTROS BENEFICIOS</p>
    <h1 class="text-pink-400 font-bold md:text-5xl text-3xl py-6">¿POR QUÉ ELEGIRNOS?</h1>
    <p class="text-gray-800 font-semibold md:text-lg text-sm">Nos comprometemos a brindar a nuestros clientes un servicio excepcional ofreciendo nuestros mejores productos</p>
  </header>

  <section class="flex flex-col gap-6 md:flex-row bg-white text-start items-center ">

    <div class="w-auto md:w-330 flex justify-center md:justify-start">
      <img class="max-w-55 md:max-w-full"
        src="{{ asset('images/Navina_logo.jpg')}}"
        alt="navina-logo">
    </div>

    <article class="max-w-xl">

      <h1 class="font-extrabold text-3xl md:text-4xl">
        ¿QUÉ ES NAVI <br> NATUBELLEZA?
      </h1>

      <p class="pt-4 pb-5 text-base md:text-lg">
        Navi Natubelleza se dedica a la venta de artículos de belleza femenina,
        ofreciendo productos de alta calidad para el cuidado personal, maquillaje
        y accesorios. Nuestro objetivo es ayudar a resaltar la belleza natural
        de cada mujer con productos innovadores y un servicio excepcional.
      </p>

      <div class="flex flex-col sm:flex-row gap-4">
        <a class="bg-pink-400 px-6 h-14 flex items-center font-semibold justify-center text-white rounded-3xl
        transition hover:bg-pink-500 hover:scale-105 hover:shadow-pink-700 shadow"
          href="https://api.whatsapp.com/send/?phone=%2B51927987259&text=%C2%A1Hola%21+Me+gustar%C3%ADa+conocer+m%C3%A1s+sobre+los+productos+de+Navi+Natubelleza.&type=phone_number&app_absent=0"
          target="_blank">
          <svg class="w-7 h-7 mr-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.81536 14.7266C13.0621 18.9492 17.0468 19.117 18.6763 18.9651C19.1917 18.9171 19.6399 18.6546 20.0011 18.2954L21.4217 16.883C22.3806 15.9295 22.1102 14.2949 20.8833 13.628L18.9728 12.5894C18.1672 12.1515 17.1858 12.2801 16.5562 12.9062Z" fill="#ffffff"></path>
            </g>
          </svg>
          927 987 259
        </a>

        <button class="bg-pink-400 px-6 h-14 flex items-center font-semibold justify-center text-white rounded-3xl
        transition hover:bg-pink-500 hover:scale-105 hover:shadow-pink-700 shadow"
          @click="navigator.clipboard.writeText('navinatubelleza@gmail.com');
          copied = true;
          setTimeout(() => copied = false, 2000);"
          x-data="{ copied: false }">
          <svg class="w-6 h-6 mr-4" fill="#ffffff" height="200px" width="200px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" stroke="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <g>
                <g>
                  <path d="M16,16.8l13.8-9.2C29.2,5.5,27.3,4,25,4H7C4.7,4,2.8,5.5,2.2,7.6L16,16.8z"></path>
                </g>
                <g>
                  <path d="M16.6,18.8C16.4,18.9,16.2,19,16,19s-0.4-0.1-0.6-0.2L2,9.9V23c0,2.8,2.2,5,5,5h18c2.8,0,5-2.2,5-5V9.9L16.6,18.8z"></path>
                </g>
              </g>
            </g>
          </svg>

          <span x-show="!copied">navinatubelleza@gmail.com</span>
          <span x-show="copied">Copiado ✓</span>
        </button>
      </div>

    </article>
  </section>

  <br>

  <section class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto mb-16">
    {{-- TARJETA 1 --}}
    <article>

      <header class="pb-12 text-center">
        <h1 class="font-extrabold text-6xl text-gray-900 pb-2">100</h1>
        <p class="font-extrabold text-lg text-gray-700">USUARIOS</p>
      </header>

      <div class="relative w-96 h-75">
        <div class="border border-gray-200 rounded-3xl shadow-lg w-full h-full py-8 px-12 text-justify">
          <p>
            {{ $about->mision ?? 'Oops! No hay información disponible.' }}
          </p>
        </div>

        <div class="bg-pink-400 border border-gray-200 rounded-3xl shadow-lg 
        absolute flex inset-0 justify-center items-center text-center
        transition-opacity hover:opacity-0">
          <h1 class="font-extrabold text-6xl text-white">MISIÓN</h1>
        </div>
      </div>

    </article>

    {{-- TARGETA 2 --}}
    <article class="">

      <header class="pb-12 text-center">
        <h1 class="font-extrabold text-6xl text-gray-900 pb-2">50</h1>
        <p class="font-extrabold text-lg text-gray-700">PRODUCTOS</p>
      </header>

      <div class="relative w-96 h-75">
        <div class="border border-gray-200 rounded-3xl shadow-lg w-full h-full py-8 px-12 text-justify">
          <h1>
            {{ $about->vision ?? 'Oops! No hay información disponible.' }}
          </h1>
        </div>

        <div class="bg-pink-400 border border-gray-200 rounded-3xl shadow-lg 
        absolute flex inset-0 justify-center items-center text-center
        transition-opacity hover:opacity-0">
          <h1 class="font-extrabold text-6xl text-white">VISIÓN</h1>
        </div>
      </div>
    </article>
  </section>

</main>

<div class="w-full bg-pink-400 md:p-16 p-8">
  <h1 class="text-white font-extrabold md:text-5xl text-3xl text-center">Tu piel merece lo natural y lo irresistible</h1>
</div>

<div class="flex justify-center pt-8 pb-12">
  <a class="bg-green-500 px-16 py-6 items-center font-bold justify-center text-white rounded-3xl
  transition hover:bg-green-400 hover:scale-105 shadow"
    href="https://api.whatsapp.com/send/?phone=%2B51927987259&text=%C2%A1Hola%21+Me+gustar%C3%ADa+conocer+m%C3%A1s+sobre+los+productos+de+Navi+Natubelleza.&type=phone_number&app_absent=0"
    target="_blank">
    CONTACTANOS
  </a>
</div>


<div class="max-w-6xl mx-auto mb-16"
  x-data="{
        page: 0,
        perPage: window.innerWidth < 640 ? 1 : 3,
        totalItems: 9,
        interval: null,

        get totalPages() {
            return Math.ceil(this.totalItems / this.perPage)
        },

        start() {
            this.interval = setInterval(() => {
                this.page = (this.page + 1) % this.totalPages
            }, 15000)
        },

        goTo(p) {
            this.page = p
            clearInterval(this.interval)
            this.start()
        },

        updatePerPage() {
            this.perPage = window.innerWidth < 640 ? 1 : 3
            this.page = 0
        }
    }"
  x-init="start(); window.addEventListener('resize', () => updatePerPage())">

  <div class="overflow-hidden">
    <div class="flex transition-transform duration-500"
      :style="'transform: translateX(-' + (page * 100) + '%)'">

      <!-- 9 IMÁGENES ESTÁTICAS -->
      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img1.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>
      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img2.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>
      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img3.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img4.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img5.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img6.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img7.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img8.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

      <div class="w-full sm:w-1/3 shrink-0 flex justify-center">
        <img src="{{ asset('imgs/about/img9.webp') }}" class="w-full max-w-75 h-75 object-cover rounded-xl">
      </div>

    </div>
  </div>

  <!-- PAGINACIÓN -->
  <div class="flex justify-center gap-3 mt-6">
    <template x-for="i in totalPages" :key="i">
      <button
        @click="goTo(i - 1)"
        class="w-3 h-3 rounded-full transition"
        :class="page === (i - 1)
          ? 'bg-pink-400 scale-110'
          : 'bg-gray-400'">
      </button>
    </template>
  </div>

</div>

@endsection