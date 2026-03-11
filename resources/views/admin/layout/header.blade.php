<header class="px-5 py-4 flex justify-between border-b-[1.5px] shrink-0 border-neutral-200 bg-white">

  <div class="flex items-center">
    <h1>Panel</h1>
  </div>

  <div class="relative">

    <button class="flex gap-1.5 items-center "
      onclick="toggleDropdown('profileOptions')">
      <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
      <i class="bx bx-chevron-up "></i>
    </button>

    <div class="hidden w-48 py-1 flex-col rounded-lg top-8 right-0 border border-neutral-200 
    shadow-md bg-neutral-50 text-neutral-600 absolute "
      id="profileOptions">

      <a class=" py-1 px-4 hover:bg-neutral-200"
        href="{{ route('profile.edit') }}">
        Profile
      </a>

      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="w-full py-1 px-4 hover:bg-neutral-200 text-start"
          type="submit">
          Log Out
        </button>
      </form>

    </div>
  </div>

</header>

<script>
  function toggleDropdown(id) {
    const el = document.getElementById(id)

    el.classList.toggle("hidden")
    el.classList.toggle("flex")
  }

  document.addEventListener("click", (e) => {

    document.querySelectorAll("[id$='Options']").forEach(dropdown => {

      const parent = dropdown.parentElement

      if (!parent.contains(e.target)) {
        dropdown.classList.add("hidden")
        dropdown.classList.remove("flex")
      }

    })

  })
</script>