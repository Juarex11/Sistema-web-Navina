<div>

  {{-- BOTON MOVIL --}}
  <button
    id="openSidebar"
    class="lg:hidden fixed top-4 left-4 z-40 bg-pink-400 text-white p-2 rounded-lg shadow-lg"
  >
    <i class="bx bx-menu text-2xl"></i>
  </button>

  {{-- OVERLAY --}}
  <div
    id="sidebarOverlay"
    class="fixed inset-0 bg-black/40 z-40 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"
  ></div>

  {{-- SIDEBAR --}}
  <aside
    id="sidebar"
    class="
      fixed lg:static
      top-0 left-0
      z-50
      w-72 min-w-72
      h-screen
      flex flex-col
      bg-white
      border-r-[1.5px] border-neutral-200
      -translate-x-full lg:translate-x-0
      transition-transform duration-300 ease-in-out
    "
  >

    {{-- HEADER --}}
    <div class="relative px-4 py-5 flex justify-center items-center border-b-[1.5px] border-neutral-200 shrink-0">

      {{-- LOGO --}}
      <img
        class="w-24 object-contain"
        src="{{ asset('imgs/NaviLogo.webp') }}"
        alt="logo"
      >

      {{-- BOTON CERRAR --}}
      <button
        id="closeSidebar"
        class="lg:hidden absolute right-4 text-3xl text-neutral-700"
      >
        <i class="bx bx-x"></i>
      </button>

    </div>

    {{-- MENU --}}
    <ul class="p-3 flex flex-col gap-1 text-sm text-neutral-800 flex-1 overflow-y-auto">

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.products.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.products.index') }}"
      >
        <i class="bx bx-shopping-bag text-lg"></i>
        Productos
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.categories.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.categories.index') }}"
      >
        <i class="bx bx-folder text-lg"></i>
        Categorias
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.siteinfo.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.siteinfo.index') }}"
      >
        <i class="bx bx-info-circle text-lg"></i>
        Información
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.comments.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.comments.index') }}"
      >
        <i class="bx bx-message-bubble-dots text-lg"></i>
        Comentarios
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.blogs.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.blogs.index') }}"
      >
        <i class="bx bx-file text-lg"></i>
        Blogs
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.clients.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.clients.index') }}"
      >
        <i class="bx bx-envelope text-lg"></i>
        Correo
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.promotions.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.promotions.index') }}"
      >
        <i class="bx bx-discount text-lg"></i>
        Promociones
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.questions.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.questions.index') }}"
      >
        <i class="bx bx-help-circle text-lg"></i>
        Dudas y Respuestas
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.policies.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.policies.index') }}"
      >
        <i class="bx bx-file-detail text-lg"></i>
        Politicas
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.services.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.services.index') }}"
      >
        <i class="bx bx-bolt text-lg"></i>
        Servicios
      </a>

      <a
        class="min-h-10 px-4 flex gap-2 items-center rounded-lg transition-colors
        {{ request()->routeIs('admin.aboutUs.index') ? 'bg-pink-50 text-pink-400' : 'hover:bg-neutral-100' }}"
        href="{{ route('admin.aboutUs.index') }}"
      >
        <i class="bx bx-group text-lg"></i>
        About Us
      </a>

    </ul>

  </aside>

</div>

<script>

  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');

  const openBtn = document.getElementById('openSidebar');
  const closeBtn = document.getElementById('closeSidebar');

  function openSidebar() {
    sidebar.classList.remove('-translate-x-full');

    overlay.classList.remove('opacity-0', 'pointer-events-none');
    overlay.classList.add('opacity-100');

    document.body.classList.add('overflow-hidden');
  }

  function closeSidebar() {
    sidebar.classList.add('-translate-x-full');

    overlay.classList.add('opacity-0', 'pointer-events-none');
    overlay.classList.remove('opacity-100');

    document.body.classList.remove('overflow-hidden');
  }

  openBtn.addEventListener('click', openSidebar);

  closeBtn.addEventListener('click', closeSidebar);

  overlay.addEventListener('click', closeSidebar);

</script>