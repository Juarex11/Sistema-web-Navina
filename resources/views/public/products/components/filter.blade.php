<aside class="flex flex-col gap-7 w-full lg:w-55 xl:w-60">

  <article class="p-5 rounded-lg border-1.5 border-pink-200">

    <h1 class="text-xl font-semibold text-pink-400 pb-4">
      Categorias
    </h1>

    <ul class="flex flex-col gap-4 xl:gap-5">

      <li class="text-neutral-600 hover:text-pink-400 font-semibold">

        <a href="{{ route('products', collect(request()->query())->except('category')->toArray() ) }}">
          Todas
        </a>

      </li>

      @if($categories->count() > 0)

      @foreach($categories as $category)

      <li class="font-medium flex
        {{ request('category') == $category->id
        ? 'text-pink-400'
        : 'text-neutral-500 hover:text-pink-400' }}">

        <a href="{{ route('products', array_merge(request()->except('page'), ['category' => $category->id])) }}">
          {{ $category->name }}
        </a>

      </li>

      @endforeach

      @else

      <span>No hay</span>

      @endif

    </ul>

  </article>

  <article class="p-5 rounded-lg border-1.5 border-pink-200 shrink-0">

    <h1 class="text-xl font-semibold text-pink-400 pb-4">
      Precios
    </h1>

    <ul class="flex flex-col gap-4 font-medium xl:gap-5">

      <li class="text-neutral-600 hover:text-pink-400 font-semibold">

        <a href="{{ route('products', collect(request()->query())->except('price_range')->toArray() ) }}">
          Todas
        </a>

      </li>

      <li class="{{ request('price_range') == '5-50' ? 'text-pink-400' : 'text-neutral-500 hover:text-pink-400' }}">

        <a href="{{ route('products', array_merge(request()->except('page'), ['price_range' => '5-50' ])) }}">
          S/5 - S/50
        </a>

      </li>

      <li class="{{ request('price_range') == '50-100' ? 'text-pink-400' : 'text-neutral-500 hover:text-pink-400' }}">

        <a href="{{ route('products', array_merge(request()->except('page'), ['price_range' => '50-100' ])) }}">
          S/50 - S/100
        </a>

      </li>

      <li class="{{ request('price_range') == '100-150' ? 'text-pink-400' : 'text-neutral-500 hover:text-pink-400' }}">

        <a href="{{ route('products', array_merge(request()->except('page'), ['price_range' => '100-150' ])) }}">
          S/100 - S/150
        </a>

      </li>

      <li class="{{ request('price_range') == '150-200' ? 'text-pink-400' : 'text-neutral-500 hover:text-pink-400' }}">

        <a href="{{ route('products', array_merge(request()->except('page'), ['price_range' => '150-200' ])) }}">
          S/150 - S/200
        </a>

      </li>

    </ul>

  </article>

</aside>