@extends('dashboard.layout')

@section('content')

<main class="p-6 pb-7 flex flex-col flex-1 overflow-y-auto">

  <h1 class="text-4xl font-semibold pb-5">Politicas de la empresa</h1>

  <div class="lg:grid lg:grid-cols-2">

    <form action="" class="flex flex-col gap-2">

      <label class="text-xl font-medium">Titulo</label>

      <input type="text" class="py-2 px-3 border border-neutral-950">

      <label class="text-xl font-medium">Descripcion</label>

      <textarea name="" id="" class="min-h-32 p-3 border border-neutral-950"></textarea>

      <div class="border-2 border-dashed p-6 rounded-lg text-center cursor-pointer"
        onclick="document.getElementById('imageInput').click()">

        <input type="file"
          name="image"
          id="imageInput"
          class="hidden"
          accept="image/*">

        <div>
          Arrastra tu imagen aquí o haz clic para seleccionar
        </div>
      </div>

      <div id="previewContainer" class="mt-4 hidden">
        <img id="previewImage" class="w-32 rounded">
      </div>

      <button class="bg-blue-600 px-4 py-2 rounded text-white cursor-pointer"
        type="submit">
        Guardar Cambios
      </button>

      <button class="bg-blue-600 px-4 py-2 rounded text-white cursor-pointer"
        type="submit">
        Guardar Cambios
      </button>

      <button class="bg-blue-600 px-4 py-2 rounded text-white cursor-pointer"
        type="submit">
        Guardar Cambios
      </button>

      <button class="bg-blue-600 px-4 py-2 rounded text-white cursor-pointer"
        type="submit">
        Guardar Cambios
      </button>

    </form>

  </div>

</main>

<script>
  document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('previewImage').src = e.target.result;
      document.getElementById('previewContainer').classList.remove('hidden');
    };
    reader.readAsDataURL(file);
  });
</script>

@endsection