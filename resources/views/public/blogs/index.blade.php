@extends('app')

@section('title', 'Blogs - Navi Natubelleza')

@section('content')

<header class="min-w-full h-72 flex flex-col justify-center items-center text-white relative">
  <img class="absolute top-0 left-0 size-full object-cover -z-10"
    src="{{ asset('imgs/banners/banner-3.png') }}">

  <h1 class="text-6xl font-semibold pb-2">Blogs</h1>
  <p class="font-semibold">
    Descubre consejos, tips y noticias sobre belleza natural y cuidado personal
  </p>
</header>

<main class="max-w-300 p-10 flex flex-col gap-10 mx-auto">

  <section class="flex flex-wrap justify-start gap-4">
    <button class="px-6 py-2 bg-pink-500 text-white rounded-full hover:bg-pink-600 transition-colors">
      Todos ({{ $blogs->count() }})
    </button>

    @foreach($categories as $category)

    @php
    $count = $blogs->where('category_id', $category->id)->count();
    @endphp

    @if($count > 0)
    <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-full hover:bg-gray-300 transition-colors">
      {{ $category->name }} ({{ $count }})
    </button>
    @endif

    @endforeach

  </section>

  <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    @foreach($blogs as $blog)
    <article class="bg-white border border-neutral-200 rounded-lg shadow-xl overflow-hidden hover:shadow-xl 
    transition-shadow">

      <div class="relative h-64 bg-gray-200">
        @if($blog->directory)
        <img src="{{ asset('storage/' . $blog->directory) }}"
          alt="{{ $blog->title }}"
          class="w-full h-full object-cover">
        @else
        <div class="w-full h-full flex items-center justify-center bg-linear-to-br from-pink-100 to-purple-100">
          <i class="fas fa-blog text-4xl text-pink-400"></i>
        </div>
        @endif

        @if($blog->category)
        <div class="absolute top-4 left-4">
          <span class="px-3 py-1 bg-pink-500 text-white text-sm rounded-full">
            {{ $blog->category->name }}
          </span>
        </div>
        @endif
      </div>

      <div class="p-6">
        <div class="mb-3">
          <span class="text-sm text-gray-500">
            <i class="far fa-calendar"></i>
            {{ $blog->updated_at->format('d \d\e F \d\e Y') }}
          </span>
          <span class="text-sm text-gray-500 ml-4">
            <i class="far fa-clock"></i>
            Última actualización
          </span>
        </div>

        <h3 class="text-xl font-bold text-gray-800 mb-3">
          {{ $blog->title }}
        </h3>

        <p class="text-gray-600 mb-4 line-clamp-3">
          {{ Str::limit($blog->description, 150) }}
        </p>

        <a href="{{ route('public.blogs.show', $blog->id) }}"
          class="inline-flex items-center text-pink-500 hover:text-pink-600 font-semibold">
          Leer artículo completo
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </article>
    @endforeach
  </section>

  @if($blogs->isEmpty())
  <div class="text-center py-12">
    <i class="fas fa-blog text-6xl text-gray-300 mb-4"></i>
    <h3 class="text-xl font-semibold text-gray-600 mb-2">No hay artículos disponibles</h3>
    <p class="text-gray-500">Pronto publicaremos nuevos contenidos sobre belleza natural.</p>
  </div>
  @endif
</main>
@endsection