@extends('app')

@section('title', $blog->title . ' - Navi Natubelleza')

@section('content')

<section class="max-w-300 p-10 flex flex-col gap-10 mx-auto">

  <div class="flex gap-10">

    @if($blog->directory)
    <div class="">
      <img src="{{ asset('storage/' . $blog->directory) }}"
        alt="{{ $blog->title }}"
        class="w-100 rounded-xl shadow-lg shrink-0">
    </div>
    @endif

    <article class="flex-1 py-5">

      <h1 class="text-5xl font-bold text-neutral-800">{{ $blog->title }}</h1>

      @if($blog->category)
      <p class="max-w-max text-pink-400 font-semibold text-lg my-4">
        {{ $blog->category->name }}
      </p>
      @endif

      <p class="text-gray-700 leading-relaxed">
        {!! nl2br(e($blog->description)) !!}
      </p>

    </article>

  </div>

  <div class="text-center">
    <span class="text-gray-600">
      <i class="far fa-calendar"></i>
      {{ $blog->updated_at->format('d \d\e F \d\e Y') }}
    </span>
    <span class="text-gray-600 ml-4">
      <i class="far fa-clock"></i>
      Última actualización
    </span>
  </div>

</section>

<!-- Related Articles Section -->
@if($relatedBlogs->isNotEmpty())
<section class=" bg-gray-50">

  <div class="max-w-300 p-10 flex flex-col gap-10 mx-auto">

    <header class="text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Artículos Relacionados</h2>
      <p class="text-gray-600">Descubre más contenido sobre {{ $blog->category->name }}</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($relatedBlogs as $relatedBlog)
      <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <!-- Blog Image -->
        <div class="relative h-48 bg-gray-200">
          @if($relatedBlog->directory)
          <img src="{{ asset('storage/' . $relatedBlog->directory) }}"
            alt="{{ $relatedBlog->title }}"
            class="w-full h-full object-cover">
          @else
          <div class="w-full h-full flex items-center justify-center bg-linear-to-br from-pink-100 to-purple-100">
            <i class="fas fa-blog text-3xl text-pink-400"></i>
          </div>
          @endif
        </div>

        <!-- Blog Content -->
        <div class="p-6">
          <h3 class="text-lg font-bold text-gray-800 mb-3">
            {{ $relatedBlog->title }}
          </h3>

          <p class="text-gray-600 mb-4 line-clamp-2">
            {{ Str::limit($relatedBlog->description, 100) }}
          </p>

          <a href="{{ route('public.blogs.show', $relatedBlog->id) }}"
            class="inline-flex items-center text-pink-500 hover:text-pink-600 font-semibold">
            Leer más
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection