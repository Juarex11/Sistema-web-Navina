<aside class="min-w-60 h-screen flex flex-col border-r-[1.5px] border-neutral-200">
 
  <div class="px-3 py-5 flex justify-center bg-white shrink-0 border-b-[1.5px] border-neutral-200">
    <img class="w-24"
      src="{{ asset('imgs/NaviLogo.webp') }}"
      alt="logo">
  </div>

  <ul class="p-3 flex flex-col gap-1 text-sm text-neutral-800 flex-1 overflow-y-auto">

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.products') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('products.index') }}">
      <i class="bx bx-shopping-bag"></i>
      Productos
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.categories') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('categories.index') }}">
      <i class="bx bx-folder"></i>
      Categorias
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.siteinfo') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.siteinfo') }}">
      <i class="bx bx-info-circle"></i>
      Información
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.comments') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.comments') }}">
      <i class="bx bx-message-bubble-dots"></i>
      Comentarios
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.blogs') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.policies') }}">
      <i class="bx bx-file"></i>
      Blogs
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.email') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.policies') }}">
      <i class="bx bx-envelope"></i>
      Email
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.offers') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.services') }}">
      <i class="bx bx-discount"></i>
      Promociones
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.questions') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.policies') }}">
      <i class="bx bx-help-circle"></i>
      Dudas y Respuestas
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.policies') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.policies') }}">
      <i class="bx bx-file-detail"></i>
      Politicas
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.services') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.services') }}">
      <i class="bx bx-bolt"></i>
      Servicios
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.aboutUs') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.aboutUs') }}">
      <i class="bx bx-group"></i>
      About Us
    </a>

  </ul>

</aside>