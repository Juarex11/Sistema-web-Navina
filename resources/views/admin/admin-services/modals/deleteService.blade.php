<div class="fixed inset-0 bg-black/50 hidden items-center justify-center backdrop-blur-xs"
  id="deleteService-{{ $service->id }}">

  <form class=" max-w-xs bg-white p-4 rounded-lg lg:w-[20vw]"
    action="{{ route('service.delete', $service->id ) }}"
    method="POST">
    @csrf
    @method('DELETE')

    <header class="text-neutral-700">
      <h1 class=" font-semibold text-lg">
        ¿Eliminar Servicio?
      </h1>

      <p class="py-4">
        Esta acción no se puede deshacer
      </p>

      <button class="py-2 px-4 rounded-lg bg-red-200 text-red-400"
        type="submit">
        Eliminar
      </button>
    </header>

  </form>
</div>