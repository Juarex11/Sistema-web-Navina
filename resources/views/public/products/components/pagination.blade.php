@if ($products->hasPages())
<div class="flex items-center justify-between pt-7 text-white">

  {{-- Controls --}}
  <div class="flex gap-2">

    {{-- First --}}
    @if ($products->onFirstPage())
    <span class="p-2 bg-neutral-300 rounded-lg opacity-50">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M11 7l-5 5l5 5" />
        <path d="M17 7l-5 5l5 5" />
      </svg>
    </span>
    @else
    <a href="{{ $products->url(1) }}"
      class="p-2 bg-neutral-300 rounded-lg hover:bg-neutral-700 transition">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M11 7l-5 5l5 5" />
        <path d="M17 7l-5 5l5 5" />
      </svg>
    </a>
    @endif

    {{-- Prev --}}
    @if ($products->onFirstPage())
    <span class="p-2 bg-neutral-300 rounded-lg opacity-50">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M15 6l-6 6l6 6" />
      </svg>
    </span>
    @else
    <a href="{{ $products->previousPageUrl() }}"
      class="p-2 bg-neutral-300 rounded-lg hover:bg-neutral-700 transition">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M15 6l-6 6l6 6" />
      </svg>
    </a>
    @endif

    {{-- Info --}}
    <div class="text-sm py-2 px-4 text-neutral-700 font-mulish font-bold">
      Page {{ $products->currentPage() }} of {{ $products->lastPage() }}
    </div>

    {{-- Next --}}
    @if ($products->hasMorePages())
    <a href="{{ $products->nextPageUrl() }}"
      class="p-2 bg-neutral-300 rounded-lg text-white hover:bg-neutral-700 transition">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-chevron-right">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M9.707 5.293l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1 -1.414 -1.414l5.293 -5.293l-5.293 -5.293a1 1 0 0 1 1.414 -1.414" />
      </svg>
    </a>
    @else
    <span class="p-2 bg-neutral-300 rounded-lg opacity-50">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-chevron-right">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M9.707 5.293l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1 -1.414 -1.414l5.293 -5.293l-5.293 -5.293a1 1 0 0 1 1.414 -1.414" />
      </svg>
    </span>
    @endif

    {{-- Last --}}
    @if ($products->hasMorePages())
    <a class="p-2 bg-neutral-300 rounded-lg hover:bg-neutral-700 transition"
      href="{{ $products->url($products->lastPage()) }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 7l5 5l-5 5" />
        <path d="M13 7l5 5l-5 5" />
      </svg>
    </a>
    @else
    <span class="p-2 bg-neutral-300 rounded-lg opacity-50">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 7l5 5l-5 5" />
        <path d="M13 7l5 5l-5 5" />
      </svg>
    </span>
    @endif

  </div>
</div>
@endif