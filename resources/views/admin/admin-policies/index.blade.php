@extends('admin.index')

@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">

  <h1 class="text-4xl font-semibold text-neutral-800 pb-5 font-mulish">Politicas de la empresa</h1>

  <div class="gap-7 lg:grid lg:grid-cols-2">

    <form class="flex flex-col gap-4 text-neutral-700 "
      action="{{ route('admin.policies') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <label class="text-xl font-medium">Titulo</label>

      <input class="py-2 px-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        type="text"
        name="title"
        value="{{ old('title', $policy->title ?? '') }}"
        required>

      <label class="text-xl font-medium">Descripcion</label>

      <textarea class="h-32 p-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        name="description"
        required>{{old('description', $policy->description ?? '')}}</textarea>

      <label class="text-xl font-medium">Imagen</label>

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

      <div class="p-3 rounded-lg border-1.5 border-yellow-200 bg-yellow-100 hidden"
        id="previewContainer">
        <img id="previewImage" class="w-32 rounded">
        
      </div>

      @if(!empty($policy?->image))

      <div class="p-3 flex gap-4 items-center rounded-lg border-1.5 border-pink-300 bg-pink-100">
        <img class="w-20"
          src="{{ asset('storage/' . $policy->image) }}">

        <span class="font-mulish font-semibold text-pink-500">Imagen Actual</span>
      </div>
      @endif

      <button class="ml-auto bg-blue-500 px-4 py-2 rounded-lg text-white cursor-pointer"
        type="submit">
        Guardar Cambios
      </button>

    </form>

    <section class="p-5 flex flex-col gap-3 rounded-lg border-1.5 border-green-300 bg-green-100 font-mulish">
      <div class="text-2xl text-center  font-semibold text-neutral-800 shrink-0">
        {{ $policy->title }}
      </div>

      <p class="text-neutral-800 whitespace-pre-line flex-1 overflow-auto">
        {{ $policy->description }}
      </p>

      <div class="pt-4 flex justify-center shrink-0">

        <img class="w-11/12 rounded-lg"
          src="{{ asset('storage/' . $policy->image) }}"
          alt="{{ $policy->title }}">
      </div>
    </section>

  </div>

</main>

<script>
  const dropZone = document.getElementById("dropZone");
  const fileInput = document.getElementById("imageInput");
  const previewImage = document.getElementById("previewImage");
  const previewContainer = document.getElementById("previewContainer");

  // Click abre el selector
  dropZone.addEventListener("click", () => {
    fileInput.click();
  });

  // Evitar que el navegador abra la imagen
  dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  dropZone.addEventListener("drop", (e) => {
    e.preventDefault();

    const files = e.dataTransfer.files;
    if (files.length > 0) {
      fileInput.files = files;
      showPreview(files[0]);
    }
  });

  // Cuando seleccionas manualmente
  fileInput.addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (!file) return;

    showPreview(file);
  });

  // Función reutilizable
  function showPreview(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      previewImage.src = e.target.result;
      previewContainer.classList.remove("hidden");
    };
    reader.readAsDataURL(file);
  }
</script>

@endsection