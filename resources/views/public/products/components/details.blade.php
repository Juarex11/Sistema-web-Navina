@extends('app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
  <div class="grid grid-cols-1 md:grid-cols-2 items-center">
    <div class="p-6 flex justify-center">
      @if($product->images && $product->images->first())
        
        <img src="{{ asset('storage/' . $product->images->first()->directory) }}"
          class="w-full max-w-md h-auto object-contain transition-all">
      @else
        <div class="w-full max-w-md h-64 bg-gray-200 flex items-center justify-center">
          <span class="text-gray-400">Sin imagen disponible</span>
        </div>
      @endif
    </div>
    <div class="p-4">
      <p class="text-4xl font-bold text-gray-600 py-7">{{ $product->name }}</p>
      <p class="text-md text-black pb-4">{{ $product->description }}</p>
      <p class="text-xl font-bold text-pink-500">BENEFICIOS</p>
      <p class="text-md text-black pb-4" style="white-space: pre-line;">{{ $product->benefits }}</p>

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
      <div class="mt-4 flex gap-3">
        <button class="flex-1 bg-green-500 hover:bg-green-600 transition-all text-white py-3 px-6 rounded-lg font-semibold text-lg">
          Comprar
        </button>
        <button class="bg-pink-500 hover:bg-pink-600 transition-all text-white py-3 px-6 rounded-lg font-semibold text-lg">
          Agregar al carrito
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
  </div>

  <div class="max-w-3xl">
    <img class="pb-10" src="{{ asset('imgs/imgCaseUse.webp') }}">
    <p class="text-xl font-bold text-pink-500">Modo de uso</p>
    <p class="pb-10 whitespace-pre-line">
      {{ $product->use_mode }}
    </p>
    <img src="{{ asset('imgs/details-icons.webp') }}">
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    <div class="p-4">
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
    </div>
    <div class="p-4">
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
    </div>
    <div class="p-4">
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
    </div>
  </div>
</div>

@endsection