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

  <div class="grid grid-cols-3 gap-7">

    @if($blogs->count() > 0)

    @foreach($blogs as $blog)

    <article class="rounded-2xl border border-neutral-200 shadow-lg overflow-hidden">

      <img class="w-full h-60 object-cover "
        src="{{ asset('storage/' . $blog->directory) }}" alt="{{ $blog->title }}">

      <div class="p-5 flex flex-col gap-3">

        <p class="max-w-max px-4 py-1 rounded-full text-sm text-pink-300 font-medium bg-neutral-100">
          @foreach($categories as $category)
          @if($category->id == $blog->category_id)
          {{ $category->name }}
          @endif
          @endforeach
        </p>

        <h1 class="text-xl font-semibold text-neutral-800">{{ $blog->title }}</h1>

        <p class="text-sm font-medium text-neutral-500 line-clamp-3">
          {{ $blog->description }}
        </p>

        <div class="w-full h-px bg-neutral-200 mt-2"></div>

        <a class="flex justify-between items-center text-pink-400 font-medium "
          href="/blogs/{{ $blog->id }}">

          <span>Leer más</span>

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right ">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l14 0" />
            <path d="M15 16l4 -4" />
            <path d="M15 8l4 4" />
          </svg>

        </a>

      </div>

    </article>

    @endforeach

    @else

    <h1 class="py-10 text-xl font-semibold text-neutral-700">No hay</h1>

    @endif

  </div>

</section>