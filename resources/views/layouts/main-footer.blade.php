<div class="bg-gray-100">

  <div class="p-16 flex justify-center items-center w-full gap-2 text-4xl font-bold">
    <p class=" text-pink-400 py-2 ">Lo que dicen </p>
    <div class="bg-pink-400 px-2 py-3 rounded-lg">
      <p class=" text-white "> nuestros clientes</p>
    </div>
  </div>
  {{-- Comentarios --}}
  <!-- <div class="bg-white w-[360px] h-[200px] rounded-xl p-3 relative overflow-hidden">

    <div class="flex items-center gap-3 relative z-10">
      <img src="{{ asset('images/Navina_logo.webp') }}" class="h-[60px] w-[60px] rounded-full">

      <div class="flex flex-col">
        <p class="font-semibold">NAVINA USER</p>
        <p class="text-pink-400">★★★★★</p>
      </div>
    </div>


    <div class="absolute bottom-0 left-0 w-full h-[110px] bg-cover bg-center"
      style="background-image: url('{{ asset('images/bg_comment.jpg') }}');">
    </div>


    <div class="absolute bottom-16 left-4 right-4 bg-white rounded-lg px-4 py-2 shadow-md z-10">
      <p>Hello World</p>
    </div>

  </div> -->

  {{-- MAPA --}}
  <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.9078821789903!2d-69.187475!3d-12.5883225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x917b4eb3cedf23fd%3A0x705e0b213d6de908!2s15%20De%20Agosto%20212%2C%20Puerto%20Maldonado%2017001!5e0!3m2!1ses!2spe!4v1772835375523!5m2!1ses!2spe"
      width="600"
      height="400"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
      class="w-full"></iframe>
  </div>

  {{-- COLUMNAS --}}
  <div class="grid grid-cols-1 md:grid-cols-4 
  bg-white p-4 gap-10 text-gray-500
  md:py-10 lg:gap-8 lg:px-7">
    {{-- Columna 1 --}}
    <div>
      <img src="{{ asset('images/navina_logo.webp')}}" class="w-[120px] mx-auto">
      <p class="text-justify text-xs">Tu destino de belleza integral, donde la calidad y los mejores productos se unen para realzar tu belleza natural.</p>
    </div>

    {{-- Columna 2 --}}
    <div class="space-y-2">
      <h1 class="text-black text-lg ">Productos</h1>
      <ul class="space-y-2">
        <li><a href="#">Cuidado Capilar</a></li>
        <li><a href="#">Maquillaje</a></li>
        <li><a href="#">Cuidado corporal</a></li>
        <li><a href="#">Accesorios</a></li>
        <li><a href="#">Preguntas frecuentes</a></li>
      </ul>
    </div>

    {{-- Columna 3 --}}
    <div class="space-y-2">
      <h1 class="text-black text-lg">Categorías</h1>
      <ul class="space-y-2">
        <li><a href="#">Cuidado Capilar</a></li>
        <li><a href="#">Maquillaje</a></li>
        <li><a href="#">Cuidado corporal</a></li>
        <li><a href="#">Accesorios</a></li>
        <li><a href="#">Preguntas frecuentes</a></li>
      </ul>
    </div>

    {{-- Columna 4 --}}
    <div class="space-y-2 relative">
      <h1 class="text-black text-lg">Contactos</h1>
      <div class="pl-8 space-y-2">

        <img src="{{ 'images/location_pink.svg' }}"
          class="absolute left-0.5 w-5 h-5">
        <p>{{ $info->localizacion }}
        <p>


          <img src="{{ 'images/phone_pink.svg' }}"
            class="absolute left-0.5 w-5 h-5">
        <p>{{ $info->telefono }}
        <p>


          <img src="{{ 'images/mail_pink.svg' }}"
            class="absolute left-0.5 w-5 h-5">
        <p>{{ $info->correo }}
        <p>


          <img src="{{ 'images/time_pink.svg' }}"
            class="absolute left-0.5 w-5 h-5">
        <p>{{ $info->horario }}
        <p>
      </div>
    </div>

    {{-- Columna 5 --}}
    <div>
      <h1 class="text-black text-lg pb-3">Nuestras redes sociales</h1>
      {{-- BOTONES GENERICOS --}}
      <div class="flex justify-between">
        <a class="p-3 rounded-full bg-neutral-200"
          href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram size-6">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4l0 -8" />
            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M16.5 7.5v.01" />
          </svg>
        </a>

        <a class="p-3 rounded-full bg-neutral-200"
          href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-tiktok">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M16.083 2h-4.083a1 1 0 0 0 -1 1v11.5a1.5 1.5 0 1 1 -2.519 -1.1l.12 -.1a1 1 0 0 0 .399 -.8v-4.326a1 1 0 0 0 -1.23 -.974a7.5 7.5 0 0 0 1.73 14.8l.243 -.005a7.5 7.5 0 0 0 7.257 -7.495v-2.7l.311 .153c1.122 .53 2.333 .868 3.59 .993a1 1 0 0 0 1.099 -.996v-4.033a1 1 0 0 0 -.834 -.986a5.005 5.005 0 0 1 -4.097 -4.096a1 1 0 0 0 -.986 -.835z" />
          </svg>
        </a>

        <a class="p-3 rounded-full bg-neutral-200"
          href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp size-6">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
          </svg>
        </a>

        <a class="p-3 rounded-full bg-neutral-200"
          href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-facebook size-6">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z" />
          </svg>
        </a>

      </div>
      <a href="#">
        <img src="{{ asset('images/bookclaim.svg')}}"
          class="w-[140px] mx-auto transition duration-300 transform 
          hover:scale-110 hover:brightness-110">
      </a>
    </div>

  </div>
</div>