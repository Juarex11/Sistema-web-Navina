@extends('admin.index')

@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">

  <h1 class="text-4xl font-semibold text-neutral-800 pb-5 font-mulish">Mision y Vision</h1>

  <div class="gap-7 lg:grid lg:grid-cols-2">

    <form class="flex flex-col gap-4 text-neutral-700"
      action="{{ route('admin.aboutUs.update') }}"
      method="POST">
      @csrf
      @method('PATCH')

      <label class="text-xl font-medium">Mision</label>

      <textarea class="h-32 p-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        name="mision"
        required>{{ trim(old('mision', $aboutUs->mision ?? '')) }}</textarea>

      <label class="text-xl font-medium">Vision</label>

      <textarea class="h-32 p-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        name="vision"
        id="">{{ trim(old('vision', $aboutUs->vision ?? '')) }}</textarea>

      <button class="ml-auto bg-blue-500 px-4 py-2 rounded-lg text-white cursor-pointer"
        type="submit">
        Guardar Cambios
      </button>

    </form>

    <section class="p-5 flex flex-col gap-4 rounded-lg border-1.5 border-purple-300 bg-purple-100 
    text-neutral-700 font-mulish">

      <h1 class="text-2xl text-center  font-semibold text-neutral-800 ">Vista Previa</h1>

      <article class="p-4 flex flex-col gap-2 rounded-lg shadow-md bg-white">
        <h1 class="text-lg font-semibold text-neutral-900">Mision</h1>
        <p class="text-sm">
          {{ old('mision', $aboutUs->mision ?? '') }}
        </p>
      </article>

      <article class="p-4 flex flex-col gap-2 rounded-lg shadow-md bg-white">
        <h1 class="text-lg font-semibold text-neutral-900">Vision</h1>
        <p class="text-sm">
          {{ old('vision', $aboutUs->vision ?? '') }}
        </p>
      </article>

    </section>

  </div>

</main>

@endsection