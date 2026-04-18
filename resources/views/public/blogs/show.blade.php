@extends('app')

@section('title', $blog->title . ' - Navi Natubelleza')

@section('content')
<!-- Hero Section -->
<section class="bg-linear-to-r from-pink-100 to-purple-100 py-16">
  <div class="container mx-auto px-4">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">{{ $blog->title }}</h1>
      @if($blog->category)
      <span class="inline-block px-4 py-2 bg-pink-500 text-white rounded-full">
        {{ $blog->category->name }}
      </span>
      @endif
    </div>
  </div>
</section>

<!-- Blog Content Section -->
<section class="py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <!-- Blog Meta Info -->
      <div class="mb-8 text-center">
        <span class="text-gray-600">
          <i class="far fa-calendar"></i>
          {{ $blog->updated_at->format('d \d\e F \d\e Y') }}
        </span>
        <span class="text-gray-600 ml-4">
          <i class="far fa-clock"></i>
          Última actualización
        </span>
      </div>

      <!-- Featured Image -->
      @if($blog->directory)
      <div class="mb-12">
        <img src="{{ asset('storage/' . $blog->directory) }}"
          alt="{{ $blog->title }}"
          class="w-full rounded-lg shadow-lg">
      </div>
      @endif

      <!-- Blog Content -->
      <div class="prose prose-lg max-w-none">
        <div class="bg-white rounded-lg shadow-lg p-8">
          <div class="text-gray-700 leading-relaxed">
            {!! nl2br(e($blog->description)) !!}
          </div>
        </div>
      </div>

      <!-- Share Section -->
      <div class="mt-12 text-center">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Compartir artículo</h3>
        <div class="flex justify-center space-x-4">
          <a href="#" class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="w-12 h-12 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
            <i class="fab fa-whatsapp"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Related Articles Section -->
@if($relatedBlogs->isNotEmpty())
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Artículos Relacionados</h2>
      <p class="text-gray-600">Descubre más contenido sobre {{ $blog->category->name }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($relatedBlogs as $relatedBlog)
      <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
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
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection