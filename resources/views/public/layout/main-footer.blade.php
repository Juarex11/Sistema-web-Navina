<section class="bg-neutral-100 py-16 px-4">

  <div class="flex flex-wrap justify-center items-center w-full gap-3 text-3xl md:text-5xl font-extrabold text-center mb-12">
    <p class="text-pink-400">Lo que dicen</p>
    <div class="bg-pink-400 px-4 py-2 rounded-xl shadow-lg">
      <p id="titulo-genero" class="text-white transition-all duration-500">nuestras clientas</p>
    </div>
  </div>

  <div class="max-w-7xl mx-auto overflow-hidden pb-8">

    <section class="flex gap-6 transition-transform duration-500 ease-in-out"
      id="carrusel" data-comments-count="{{ $comments->count() }}">

      @if($comments->count() > 0)

      @foreach($comments as $comment)

      <article class="w-[85%] sm:w-[48%] lg:w-[32%] shrink-0 bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col">

        <header class="p-6 flex items-center gap-4">
          <img class="w-14 h-14 rounded-full object-cover border-2 border-pink-100 shadow-sm" alt="Gabriela"
            src="{{ asset('storage/' . $comment->photo) }}">
          <div>
            <h3 class="font-bold text-gray-800 text-lg">{{ $comment->client }}</h3>
            <div class="flex text-pink-400 text-sm">
              @for ($i = 0; $i < $comment->calification; $i++)
                <i class="fas fa-star text-pink-400"></i>
                @endfor
            </div>
          </div>
        </header>

        <div class="relative h-35 flex items-center justify-center px-6"
          style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
          <p class="bg-white p-4 rounded-2xl shadow-md border border-neutral-300 text-gray-600 text-sm leading-relaxed z-10">
            "{{ $comment->commentary }}"
          </p>
        </div>

      </article>

      @endforeach

      @endif

    </section>
  </div>

  <!-- Dots indicadores -->
  <div class="flex justify-center mt-6 gap-2" id="dots">

    @for($i = 0; $i < $comments->count() - 2; $i++)
      <div class="size-3 bg-pink-400 rounded-full transition-all duration-300 dot"></div>
      @endfor

  </div>

</section>

<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  @keyframes fadeSwap {
    0% {
      opacity: 1;
      transform: translateY(0);
    }

    40% {
      opacity: 0;
      transform: translateY(-8px);
    }

    60% {
      opacity: 0;
      transform: translateY(8px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-swap {
    animation: fadeSwap 0.6s ease-in-out;
  }
</style>

<script>
  // 1. Animación del título: alterna entre "nuestras clientas" y "nuestros clientes"
  const titulos = ["nuestras clientas", "nuestros clientes"];
  let tituloIndex = 0;
  const tituloEl = document.getElementById('titulo-genero');

  setInterval(() => {
    tituloIndex = (tituloIndex + 1) % titulos.length;
    tituloEl.classList.add('animate-swap');
    setTimeout(() => {
      tituloEl.textContent = titulos[tituloIndex];
    }, 300);
    setTimeout(() => {
      tituloEl.classList.remove('animate-swap');
    }, 600);
  }, 3000);


  // 2. Carrusel automático: muestra 3 tarjetas, se mueve 1 a la vez
  const carrusel = document.getElementById('carrusel');
  const totalTarjetas = carrusel.dataset.commentsCount
  const visibles = 3;
  const totalPasos = totalTarjetas - visibles; // = 1 paso posible
  let paso = 0;
  const dots = document.querySelectorAll('.dot');

  function moverCarrusel() {
    paso = (paso + 1) % (totalPasos + 1);
    // Cada tarjeta ocupa 1/3 del contenedor + gap (24px / 3 aprox = 8px por tarjeta)
    const anchoTarjeta = carrusel.parentElement.offsetWidth / 3;
    carrusel.style.transform = `translateX(-${paso * (anchoTarjeta + 8)}px)`;

    dots.forEach((dot, i) => {
      dot.classList.toggle('bg-pink-400', i === paso);
      dot.classList.toggle('bg-pink-200', i !== paso);
    });
  }

  setInterval(moverCarrusel, 4000);
</script>

<section class="w-full">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.9078821789903!2d-69.187475!3d-12.5883225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x917b4eb3cedf23fd%3A0x705e0b213d6de908!2s15%20De%20Agosto%20212%2C%20Puerto%20Maldonado%2017001!5e0!3m2!1ses!2spe!4v1772835375523!5m2!1ses!2spe"
    class="w-full h-75 md:h-100 border-0"
    loading="lazy">
  </iframe>
</section>

<footer class="bg-white border-t border-gray-100 py-10" id="main-footer">
  <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 text-neutral-600">

    <div class="flex flex-col items-center text-center space-y-4">
      <img src="{{ asset('images/navina_logo.webp')}}" class="w-25 object-contain" alt="Navina">
      <p class="text-[12px] text-gray-500 leading-relaxed max-w-55">
        Tu destino de belleza integral, donde la calidad y los mejores productos se unen para realzar tu belleza natural.
      </p>
    </div>

    <div class="lg:pl-4">
      <h2 class="text-black font-semibold text-sm mb-4">Productos</h2>
      <ul class="space-y-2 text-[12px]">

        @if($categories->count() > 0)
        @foreach($categories->shuffle()->take(4) as $category)
        <li>
          <a class="hover:text-pink-400 transition"
            href="{{ route('products', array_merge(request()->except('page'), ['category' => $category->id])) }}">
            {{ $category->name }}
          </a>
        </li>
        @endforeach
        @endif
        <li>
          <a href="{{ route('public.questions.index') }}" class="hover:text-pink-400 transition">Preguntas Frecuentes</a>
        </li>
      </ul>
    </div>

    <div>
      <h2 class="text-black font-semibold text-sm mb-4">Categorías</h2>
      <ul class="space-y-2 text-[12px]">
        <li><a href="{{ route('products.latest') }}" class="hover:text-pink-400 transition">Novedades</a></li>
        <li><a href="{{ route('offers') }}" class="hover:text-pink-400 transition">Ofertas</a></li>
        <li><a href="{{ route('products') }}" class="hover:text-pink-400 transition">Productos Naturales</a></li>
        <li><a href="{{ route('policy.index') }}" class="hover:text-pink-400 transition">Políticas</a></li>
        <li><a href="{{ route('public.blogs.index') }}" class="hover:text-pink-400 transition">Blogs</a></li>
      </ul>
    </div>

    <div>
      <h2 class="text-black font-semibold text-sm mb-4">Contacto</h2>
      <div class="space-y-3 text-[12px]">
        <div class="flex items-start gap-2">
          <img src="{{ asset('images/location_pink.svg') }}" class="w-4 h-4 mt-0.5">
          <p>{{ $siteInfo->localizacion ?? '' }}</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('images/phone_pink.svg') }}" class="w-4 h-4">
          <p>{{ $siteInfo->telefono ?? '' }}</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('images/mail_pink.svg') }}" class="w-4 h-4">
          <p class="break-all">{{ $siteInfo->correo ?? '' }}</p>
        </div>
        <div class="flex items-center gap-2">
          <img src="{{ asset('images/time_pink.svg') }}" class="w-4 h-4">
          <p>{{ $siteInfo->horario ?? '' }}</p>
        </div>
      </div>
    </div>

    <div class="lg:text-right lg:flex lg:flex-col lg:items-end">
      <h2 class="text-black font-semibold text-sm mb-4 text-right">Nuestras redes sociales</h2>
      <div class="flex gap-2 mb-6">
        <a href="https://www.instagram.com/navi_natubelleza" class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-pink-400 hover:text-white transition">
          <i class="fa-brands fa-instagram text-base"></i>
        </a>
        <a href="https://www.tiktok.com/@natubellezanavi26" class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-pink-400 hover:text-white transition">
          <i class="fa-brands fa-tiktok text-base"></i>
        </a>
        <a href="https://wa.me/+51927987259?text=%C2%A1Hola!%20Me%20gustar%C3%ADa%20conocer%20m%C3%A1s%20sobre%20los%20productos%20de%20Navi%20Natubelleza." class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-pink-400 hover:text-white transition">
          <i class="fa-brands fa-whatsapp text-base"></i>
        </a>
        <a href="https://www.facebook.com/Navinatubelleza?mibextid=wwXIfr%3Ftext%3Dfunction%20encodeURIComponent()%20%7B%20[native%20code]%20%7D&rdid=g5ALrmjEPJpin7l0&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1J3jvCRaNW%2F%3Fmibextid%3DwwXIfr%253Ftext%253Dfunction%2BencodeURIComponent%2528%2529%2B%257B%2B%255Bnative%2Bcode%255D%2B%257D#" class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-pink-400 hover:text-white transition">
          <i class="fa-brands fa-facebook-f text-base"></i>
        </a>
      </div>


      <div class="mt-2">
        <a href="#">
          <img src="{{ asset('images/bookclaim.svg')}}" class="w-28 opacity-90 hover:opacity-100 transition">
        </a>
      </div>
    </div>

  </div>
</footer>