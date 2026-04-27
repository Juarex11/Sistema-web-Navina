@extends('app')

@section('content')

<header class="min-w-full h-67 flex flex-col justify-center items-center text-white relative">
  <img class="absolute top-0 left-0 size-full object-cover -z-10"
    src="{{ asset('imgs/banners/banner-3.png') }}">

  <h1 class="text-6xl font-semibold pb-2">Preguntas Frecuentes</h1>
</header>

<main class="max-w-250 p-10 flex flex-col gap-10 mx-auto text-neutral-700">

  <section class="space-y-3" id="accordion">

    @if($questions->count() > 0)

    @foreach($questions as $question)

    <div class="bg-pink-400 text-white rounded-lg overflow-hidden ">
      <button class="w-full text-left p-4 flex justify-between items-center accordion-header cursor-pointer">
        {{ $question->pregunta }}
        <span class="icon">+</span>
      </button>
      <div class="accordion-content p-4 hidden bg-white text-black">
        {{ $question->respuesta }}
      </div>
    </div>

    @endforeach
    
    @else

    <p class="py-10">No hay preguntas por el momento</p>

    @endif

  </section>

  <script>
    const headers = document.querySelectorAll(".accordion-header");

    headers.forEach(header => {
      header.addEventListener("click", () => {
        const content = header.nextElementSibling;
        const icon = header.querySelector(".icon");

        // cerrar todos (tipo acordeón clásico)
        document.querySelectorAll(".accordion-content").forEach(c => {
          if (c !== content) {
            c.classList.add("hidden");
          }
        });

        document.querySelectorAll(".icon").forEach(i => {
          if (i !== icon) i.textContent = "+";
        });

        // toggle actual
        content.classList.toggle("hidden");
        icon.textContent = content.classList.contains("hidden") ? "+" : "−";
      });
    });
  </script>

</main>

@endsection