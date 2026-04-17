<aside class="min-w-60 h-screen flex flex-col border-r-[1.5px] border-neutral-200">

  <div class="px-3 py-5 flex justify-center bg-white shrink-0 border-b-[1.5px] border-neutral-200">
    <img class="w-24"
      src="{{ asset('imgs/NaviLogo.webp') }}"
      alt="logo">
  </div>

  <ul class="p-3 flex flex-col gap-1 text-sm text-neutral-800 flex-1 overflow-y-auto">

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.products.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.products.index') }}">
      <i class="bx bx-shopping-bag"></i>
      Productos
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.categories.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.categories.index') }}">
      <i class="bx bx-folder"></i>
      Categorias
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.siteinfo.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.siteinfo.index') }}">
      <i class="bx bx-info-circle"></i>
      Información
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.comments.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.comments.index') }}">
      <i class="bx bx-message-bubble-dots"></i>
      Comentarios
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.blogs.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.blogs.index') }}">
      <i class="bx bx-file"></i>
      Blogs
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.clients.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.clients.index') }}">
      <i class="bx bx-envelope"></i>
      Correo
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.promotions.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.promotions.index') }}">
      <i class="bx bx-discount"></i>
      Promociones
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.questions') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.policies.index') }}">
      <i class="bx bx-help-circle"></i>
      Dudas y Respuestas
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.policies.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.policies.index') }}">
      <i class="bx bx-file-detail"></i>
      Politicas
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.services.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.services.index') }}">
      <i class="bx bx-bolt"></i>
      Servicios
    </a>

    <a class="min-h-10 px-4 flex gap-2 items-center rounded-lg 
      {{ request()->routeIs('admin.aboutUs.index') ? 'bg-pink-50 text-pink-400' : '' }}"
      href="{{ route('admin.aboutUs.index') }}">
      <i class="bx bx-group"></i>
      About Us
    </a>

  </ul>

</aside>