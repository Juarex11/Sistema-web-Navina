<section id="blogs" class="">

  <header class="flex justify-between items-center py-10">
    <p class="text-pink-400 font-semibold text-4xl text-left pb-3">
      Blogs
    </p>

    <a class="bg-pink-400 hover:bg-pink-500 transition-all text-lg text-white py-2 px-4 rounded-full"
      href="/blogs">
      Explorar todas
    </a>
  </header>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 justify-items-center justify-center">

    @if($blogs->count() > 0)

    @foreach($blogs as $blog)

    <article class="w-[280px] h-[420px] rounded-2xl border border-neutral-200 shadow-lg overflow-hidden flex flex-col">

      <!-- Imagen -->
      <div class="w-full h-38 overflow-hidden">
        <img 
          class="w-full h-full object-cover object-[40%] transition-all duration-300 hover:scale-105"
          src="{{ asset('storage/' . $blog->directory) }}" 
          alt="{{ $blog->title }}">
      </div>

      <div class="flex flex-col px-5 py-4 flex-1">

        <!-- Categoría -->
        <div class="h-auto flex items-center">
          <p class="px-4 py-1 rounded-full text-sm text-pink-300 font-medium bg-neutral-100 whitespace-nowrap overflow-hidden text-ellipsis">
            @foreach($categories as $category)
              @if($category->id == $blog->category_id)
                {{ $category->name }}
              @endif
            @endforeach
          </p>
        </div>

        <!-- Título -->
        <div class="h-auto mt-2">
          <h1 class="text-lg font-semibold text-neutral-800 line-clamp-2">
            {{ $blog->title }}
          </h1>
        </div>

        <!-- Descripción -->
        <div class="h-[100px] mt-2">
          <p class="text-sm text-neutral-500 line-clamp-3">
            {{ $blog->description }}
          </p>
        </div>

        <!-- Separador -->
        <div class="w-full h-px bg-neutral-200 my-3"></div>

        <!-- CTA -->
        <div class="h-[40px] mt-auto">
          <a class="flex justify-between items-center text-pink-400 font-medium h-full"
            href="/blogs/{{ $blog->id }}">
            
            <span>Leer artículo</span>

            <svg xmlns="http://www.w3.org/2000/svg" 
              width="20" height="20" viewBox="0 0 24 24" fill="none" 
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M5 12l14 0"/>
              <path d="M15 16l4 -4"/>
              <path d="M15 8l4 4"/>
            </svg>

          </a>
        </div>

      </div>
    </article>

    @endforeach

    @else

    <h1 class="py-10 text-xl font-semibold text-neutral-700">No hay</h1>

    @endif

  </div>

</section>