<div class="fixed inset-0 bg-black/50 hidden items-center justify-center backdrop-blur-xs"
  id="updateService-{{ $service->id }}">

  <form class="w-[65vw] max-h-[90vh] max-w-228 bg-white p-6 grid grid-cols-2 gap-6 rounded-lg"
    action="{{ route('service.update', $service->id) }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <header class="flex justify-between col-span-2">
      <h1 class="text-neutral-900 font-semibold text-lg">Actualizar Servicio</h1>
      <button class="w-max py-2 px-4 rounded-lg bg-sky-400 text-white cursor-pointer hover:opacity-60"
        type="submit">
        Actualizar
      </button>
    </header>

    <article class="flex flex-col gap-3">

      <div class="flex items-center gap-2">
        <i class="bx bx-asterisk text-red-400"></i>
        <label for="">Titulo</label>
      </div>

      <input class="py-2 px-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        type="text"
        name="title"
        value="{{ old('title', $service->title ?? '') }}"
        placeholder="Ingrese el titulo del servicio">

      <div class="flex items-center gap-2">
        <i class="bx bx-asterisk text-red-400"></i>
        <label for="">Características</label>
      </div>

      <div class="relative">
        <div class="min-h-12 p-2 text-sm rounded-lg border-1.5 border-neutral-300 flex gap-2 items-center cursor-text
          overflow-x-auto shadow-md"
          id="selectBox">

          <div id="chips" class="flex gap-2"></div>

          <input id="searchInput"
            type="text"
            class="flex-1 outline-none min-w-20 h-0 hidden"
            placeholder="">

        </div>

        <div class="absolute w-full mt-2 bg-neutral-100 rounded-lg shadow-md hidden z-50 overflow-hidden"
          id="dropdown"></div>

        <input type="hidden" name="features" id="featuresInput">
      </div>

      <div class="flex items-center gap-2">
        <i class="bx bx-asterisk text-red-400"></i>
        <label for="">Descripcion</label>
      </div>

      <textarea class="h-20 p-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        name="description"
        placeholder="Escribe una breve descripcion"
        required>{{ old('description', $service->description ?? '') }}</textarea>
    </article>



    <article class="flex flex-col gap-3">
      <label for="">Imagen</label>

      <div class="p-5 rounded-lg border-1.5 border-sky-300 bg-sky-50 text-center shadow-md cursor-pointer"
        id="dropZone">

        <input type="file"
          name="image"
          id="imageInput"
          class="hidden"
          accept="image/*">

        <div class="flex flex-col gap-2">
          <i class="bx bx-arrow-to-top text-neutral-300 text-3xl"></i>
          Arrastra tu imagen aquí o haz clic para seleccionar
        </div>
      </div>

      @if(!empty($service?->image))

      <div class="p-3 flex gap-4 items-center rounded-lg border-1.5 border-pink-300 bg-pink-100">
        <img class="w-20"
          src="{{ asset('storage/' . $service->image) }}">

        <span class="font-mulish font-semibold text-pink-500">Imagen Actual</span>
      </div>
      @endif

      <div class="p-3 rounded-lg border-1.5 border-yellow-200 bg-yellow-100 hidden overflow-y-auto"
        id="previewContainer">
        <img id="previewImage" class="w-32 rounded">
      </div>
    </article>
  </form>
</div>