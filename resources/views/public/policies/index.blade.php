@extends('app')

@section('content')

<main class="max-w-250 p-10 flex flex-col gap-10 mx-auto text-neutral-700">

  <header>

    <p class="flex gap-2 items-center justify-center text-lg font-medium text-pink-400">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6" />
        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
        <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
      </svg>
      Privacidad y Seguridad
    </p>

    <h1 class="text-4xl font-semibold py-3 text-center">
      Política de Privacidad de Navi Natubellez
    </h1>

    <p class="text-xl text-center text-gray-500">
      Comprometidos con la transparencia y protección de tus datos
    </p>

  </header>

  <section class="grid grid-cols-1 gap-7 lg:grid-cols-3">

    <article class="p-5 flex items-center gap-4 shadow-lg rounded-lg border border-neutral-200">
      <div class="p-3 rounded-xl bg-pink-300/30 text-pink-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-shield-check">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M11.46 20.846a12 12 0 0 1 -7.96 -14.846a12 12 0 0 0 8.5 -3a12 12 0 0 0 8.5 3a12 12 0 0 1 -.09 7.06" />
          <path d="M15 19l2 2l4 -4" />
        </svg>
      </div>

      <p class="text-xl font-medium">Seguridad de Datos</p>
    </article>

    <article class="p-5 flex items-center gap-4 shadow-lg rounded-lg border border-neutral-200">
      <div class="p-3 rounded-xl bg-pink-300/30 text-pink-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-world-map">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M20 8h-2a2 2 0 0 0 -2 2a2 2 0 1 1 -4 0v-1a2 2 0 0 0 -2 -2h-1a2 2 0 0 1 -2 -2v-.5" />
          <path d="M3 12h3a2 2 0 0 1 2 2v.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 1 1.5 1.5v3.25" />
          <path d="M15 20.5v-3.5a2 2 0 0 1 2 -2h3.5" />
          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
        </svg>
      </div>

      <p class="text-xl font-medium">Alcance Global</p>
    </article>

    <article class="p-5 flex items-center gap-4 shadow-lg rounded-lg border border-neutral-200">
      <div class="p-3 rounded-xl bg-pink-300/30 text-pink-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-seedling">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M12 10a6 6 0 0 0 -6 -6h-3v2a6 6 0 0 0 6 6h3" />
          <path d="M12 14a6 6 0 0 1 6 -6h3v1a6 6 0 0 1 -6 6h-3" />
          <path d="M12 20l0 -10" />
        </svg>
      </div>

      <p class="text-xl font-medium">Sostenibilidad</p>
    </article>

  </section>

  <section class="px-12 pb-12 shadow-xl rounded-2xl">

    @if($policy)

      <p class="whitespace-pre-line text-lg font-medium pb-10">
        {{ $policy->description ?? 'No hay descripción disponible.' }}
      </p>

      @if(!empty($policy->image))
        <img
          class="w-full object-cover rounded-xl"
          src="{{ asset('storage/' . $policy->image) }}"
          alt="{{ $policy->title ?? 'Imagen de política de privacidad' }}">
      @endif

    @else

      <div class="py-20 text-center">
        <h2 class="text-2xl font-semibold pb-3">
          Política no disponible
        </h2>

        <p class="text-gray-500">
          Actualmente no hay una política de privacidad registrada.
        </p>
      </div>

    @endif

    <div class="p-5 mt-10 text-center">

      <h1 class="text-2xl font-semibold pb-3">¿Tienes preguntas?</h1>

      <p class="text-lg font-medium">
        Contáctanos en
        <span class="text-pink-400">
          {{ $siteInfo->correo ?? 'correo@ejemplo.com' }}
        </span>
      </p>

    </div>

  </section>

  <p class="text-center">
    Última actualización:
    {{
      $policy && $policy->updated_at
        ? $policy->updated_at->format('d \d\e F \d\e Y')
        : 'No disponible'
    }}
  </p>

</main>

@endsection