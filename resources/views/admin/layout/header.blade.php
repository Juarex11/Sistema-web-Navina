<header class="px-5 h-14 flex justify-between border-b-[1.5px] shrink-0 border-neutral-200 bg-white">

  <div class="flex items-center">
    <h1>Panel</h1>
  </div>

  <button class="flex gap-1.5 items-center ">

    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
    <i class="bx bx-chevron-up "></i>

  </button>


  <!-- <div class="pt-4 pb-1 border-t border-gray-200">
    <div class="px-4">
      <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
      <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
    </div>

    <div class="mt-3 space-y-1">
      <x-responsive-nav-link :href="route('profile.edit')">
        {{ __('Profile') }}
      </x-responsive-nav-link>

      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
          onclick="event.preventDefault();
                                        this.closest('form').submit();">
          {{ __('Log Out') }}
        </x-responsive-nav-link>
      </form>
    </div>
  </div> -->

</header>