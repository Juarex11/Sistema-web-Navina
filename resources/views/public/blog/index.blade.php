@extends('app')

@section('title', 'Blogs - Navi Natubelleza')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-pink-100 to-purple-100 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Blogs</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Descubre consejos, tips y noticias sobre belleza natural y cuidado personal
            </p>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <!-- Category Filter -->
        <div class="mb-12">
            <div class="flex flex-wrap justify-center gap-4">
                <button class="px-6 py-2 bg-pink-500 text-white rounded-full hover:bg-pink-600 transition-colors">
                    Todas ({{ $blogs->count() }})
                </button>
                @foreach($categories as $category)
                    <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-full hover:bg-gray-300 transition-colors">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <!-- Blog Image -->
                    <div class="relative h-64 bg-gray-200">
                        @if($blog->directory)
                            <img src="{{ asset('storage/' . $blog->directory) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-pink-100 to-purple-100">
                                <i class="fas fa-blog text-4xl text-pink-400"></i>
                            </div>
                        @endif
                        
                        <!-- Category Badge -->
                        @if($blog->category)
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-pink-500 text-white text-sm rounded-full">
                                    {{ $blog->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Blog Content -->
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
                        
                        <a href="{{ route('public.blog.show', $blog->id) }}" 
                           class="inline-flex items-center text-pink-500 hover:text-pink-600 font-semibold">
                            Leer artículo completo
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($blogs->isEmpty())
            <div class="text-center py-12">
                <i class="fas fa-blog text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No hay artículos disponibles</h3>
                <p class="text-gray-500">Pronto publicaremos nuevos contenidos sobre belleza natural.</p>
            </div>
        @endif
    </div>
</section>
@endsection
