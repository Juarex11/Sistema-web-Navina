@extends('app')

@section('content')

<div class="max-w-300 p-10 flex flex-col gap-10 mx-auto">

  <section class="grid grid-cols-1 items-center lg:flex lg:gap-10">

    <article class="flex">

      @if($product->images && $product->images->first())

      <img src="{{ asset('storage/' . $product->images->first()->directory) }}"
        class="w-md h-auto object-cover rounded-lg shrink-0 ">
      @else
      <div class="w-full max-w-md h-64 bg-gray-200 flex items-center justify-center">
        <span class="text-gray-400">Sin imagen disponible</span>
      </div>
      @endif

    </article>

    <div class="flex-1">
      <p class="text-4xl font-bold text-gray-600">{{ $product->name }}</p>

      <p class="text-md text-black py-4">{{ $product->description }}</p>

      <p class="text-xl font-bold text-pink-500">BENEFICIOS</p>

      <p class="text-md text-black pt-3 pb-4" style="white-space: pre-line;">{{ $product->benefits }}</p>

      <p class="text-md font-bold text-black flex items-center gap-2 pb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
        {{ $product->status == 1 ? "Disponible" : "No disponible" }}
      </p>
      <div class="flex gap-2">
        <p class="text-xl font-bold text-pink-500">
          S/ {{ number_format($product->final_price, 2) }}
        </p>
        <s class="text-sm font-semibold text-gray-600">
          S/ {{ number_format($product->price, 2) }}
        </s>
      </div>

      @if($product->status == 1)
      <!-- Agregar al carrito -->
      <div class="mt-7 grid grid-cols-2 gap-4 text-white">
        <button class=" transition-all py-3 px-6 flex gap-2 items-center justify-center rounded-lg font-semibold 
        bg-pink-500 hover:bg-pink-600 cursor-pointer
        hover:scale-105 hover:shadow-pink-200"
          onclick='addToCart({
          id: "{{ $product->id }}",
          name: "{{ $product->name }}",
          price: Number("{{ $product->price }}"),
          discount: Number("{{ $product->discount }}"),
          image: "{{ $product->images->first()->directory }}",
          count: 1
        })'>

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart size-5">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M15 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M17 17h-11v-14h-2" />
            <path d="M6 5l14 1l-1 7h-13" />
          </svg>

          Agregar al carrito
        </button>

        <button class="flex gap-2 items-center justify-center transition-all py-3 px-6 rounded-lg font-semibold 
        bg-green-500 hover:bg-green-600 cursor-pointer">

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp size-5">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
          </svg>

          Comprar
        </button>
      </div>
      @else
      <div class="mt-4">
        <button disabled class="w-full bg-gray-400 text-gray-200 py-3 px-6 rounded-lg font-semibold text-lg cursor-not-allowed">
          No disponible
        </button>
      </div>
      @endif
    </div>

  </section>

  <section class="max-w-3xl">
    <img class="pb-10" src="{{ asset('imgs/imgCaseUse.webp') }}">

    @if($product->use_mode)
    <p class="text-xl font-bold text-pink-500 pb-3">Modo de uso</p>
    <p class="pb-10 whitespace-pre-line">
      {{ $product->use_mode }}
    </p>
    @endif

    <img src="{{ asset('imgs/details-icons.webp') }}">

  </section>

  <section class="grid grid-cols-1 md:grid-cols-3 gap-9">

    <article>
      <p class="text-lg text-pink-500 font-bold flex items-center gap-2">
        ENVÍO
        <svg viewBox="64 64 896 896" focusable="false" data-icon="car" width="1em" height="1em"
          fill="currentColor" aria-hidden="true">
          <path
            d="M380 704h264c4.4 0 8-3.6 8-8v-84c0-4.4-3.6-8-8-8h-40c-4.4 0-8 3.6-8 8v36H428v-36c0-4.4-3.6-8-8-8h-40c-4.4 0-8 3.6-8 8v84c0 4.4 3.6 8 8 8zm340-123a40 40 0 1080 0 40 40 0 10-80 0zm239-167.6L935.3 372a8 8 0 00-10.9-2.9l-50.7 29.6-78.3-216.2a63.9 63.9 0 00-60.9-44.4H301.2c-34.7 0-65.5 22.4-76.2 55.5l-74.6 205.2-50.8-29.6a8 8 0 00-10.9 2.9L65 413.4c-2.2 3.8-.9 8.6 2.9 10.8l60.4 35.2-14.5 40c-1.2 3.2-1.8 6.6-1.8 10v348.2c0 15.7 11.8 28.4 26.3 28.4h67.6c12.3 0 23-9.3 25.6-22.3l7.7-37.7h545.6l7.7 37.7c2.7 13 13.3 22.3 25.6 22.3h67.6c14.5 0 26.3-12.7 26.3-28.4V509.4c0-3.4-.6-6.8-1.8-10l-14.5-40 60.3-35.2a8 8 0 003-10.8zM840 517v237H184V517l15.6-43h624.8l15.6 43zM292.7 218.1l.5-1.3.4-1.3c1.1-3.3 4.1-5.5 7.6-5.5h427.6l75.4 208H220l72.7-199.9zM224 581a40 40 0 1080 0 40 40 0 10-80 0z">
          </path>
        </svg>
      </p>
      <p>Si quieres conocer más sobre nuestros métodos de envío haz click aquí.</p>
    </article>

    <article>
      <p class="text-lg text-pink-500 font-bold flex items-center gap-2">
        ASESORÍA EN LÍNEA
        <svg viewBox="64 64 896 896" focusable="false" data-icon="customer-service" width="1em" height="1em"
          fill="currentColor" aria-hidden="true">
          <path
            d="M512 128c-212.1 0-384 171.9-384 384v360c0 13.3 10.7 24 24 24h184c35.3 0 64-28.7 64-64V624c0-35.3-28.7-64-64-64H200v-48c0-172.3 139.7-312 312-312s312 139.7 312 312v48H688c-35.3 0-64 28.7-64 64v208c0 35.3 28.7 64 64 64h184c13.3 0 24-10.7 24-24V512c0-212.1-171.9-384-384-384zM328 632v192H200V632h128zm496 192H696V632h128v192z">
          </path>
        </svg>
      </p>
      <p>Si tienes alguna duda con tu compra online escríbenos al Whatsapp: 927987259.</p>
    </article>

    <article>
      <p class="text-lg text-pink-500 font-bold flex items-center gap-2">
        DEVOLUCIONES
        <svg viewBox="64 64 896 896" focusable="false" data-icon="rollback" width="1em" height="1em"
          fill="currentColor" aria-hidden="true">
          <path
            d="M793 242H366v-74c0-6.7-7.7-10.4-12.9-6.3l-142 112a8 8 0 000 12.6l142 112c5.2 4.1 12.9.4 12.9-6.3v-74h415v470H175c-4.4 0-8 3.6-8 8v60c0 4.4 3.6 8 8 8h618c35.3 0 64-28.7 64-64V306c0-35.3-28.7-64-64-64z">
          </path>
        </svg>
      </p>
      <p>Para para conocer la política de cambios y devoluciones haz click aquí.</p>
    </article>
    
  </section>
</div>




<!-- Contenedor de Toasts -->
<div id="toast-container"
  class="fixed top-5 right-5 z-50 flex flex-col gap-3 items-end">
</div>

<script>

  const createToast = () => {

    const toast = document.createElement('div')

    toast.className = `
      relative w-90 bg-white border border-green-200
      shadow-xl rounded-xl overflow-hidden
      translate-x-[120%] opacity-0
      transition-all duration-300
    `

    toast.innerHTML = `
      <div class="p-4 flex items-start gap-3">

        <div class="shrink-0 text-green-500">
          <svg xmlns="http://www.w3.org/2000/svg"
            class="size-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">

            <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="flex-1">
          <p class=" text-gray-600">
            {{ $product->name }} añadido al carrito.
          </p>

        </div>

        <button class="close-toast
          text-gray-400 hover:text-gray-700
          transition cursor-pointer">

          <svg xmlns="http://www.w3.org/2000/svg"
            class="size-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">

            <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>

        </button>

      </div>

      <div class="toast-bar h-1 bg-green-500 origin-left"></div>
    `

    return toast
  }

  const updateToastStack = () => {

    const toasts = document.querySelectorAll('.cart-toast')

    toasts.forEach((toast, index) => {

      toast.style.opacity = '1'
      toast.style.transform = 'scale(1)'

      // tercer toast
      if (index === 2) {

        toast.style.maskImage =
          'linear-gradient(to bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,.5) 55%, rgba(0,0,0,.2) 100%)'

        toast.style.webkitMaskImage =
          'linear-gradient(to bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,.5) 55%, rgba(0,0,0,.2) 100%)'

      } else {

        toast.style.maskImage = ''
        toast.style.webkitMaskImage = ''

      }

      // mas de 3
      if (index >= 3) {
        toast.style.opacity = '0'
        toast.style.pointerEvents = 'none'
      }

    })

  }

  const showCartToast = () => {

    const container = document.getElementById('toast-container')

    const toast = createToast()

    toast.classList.add('cart-toast')

    container.prepend(toast)

    requestAnimationFrame(() => {
      toast.classList.remove('translate-x-[120%]', 'opacity-0')
    })

    updateToastStack()

    const bar = toast.querySelector('.toast-bar')

    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        bar.style.transition = 'transform 2s linear'
        bar.style.transform = 'scaleX(0)'
      })
    })

    const removeToast = () => {

      toast.classList.add('translate-x-[120%]', 'opacity-0')

      setTimeout(() => {
        toast.remove()
        updateToastStack()
      }, 300)

    }

    toast.querySelector('.close-toast')
      .addEventListener('click', removeToast)

    setTimeout(removeToast, 2000)

  }

  const addToCart = (product) => {

    let cart = JSON.parse(localStorage.getItem('cart')) || []

    const existing = cart.find(item => item.id == product.id)

    if (existing) {

      existing.count += 1

    } else {

      cart.push({
        id: product.id,
        name: product.name,
        price: Number(product.price),
        discount: Number(product.discount),
        image: product.image,
        count: product.count || 1
      })

    }

    localStorage.setItem('cart', JSON.stringify(cart))

    window.dispatchEvent(new Event('cartUpdated'))

    showCartToast()

  }

</script>

@endsection
