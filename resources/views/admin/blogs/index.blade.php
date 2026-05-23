@extends('admin.index')

@section('content')

<div class="p-8 overflow-y-auto">
  <h1 class="text-5xl font-semibold font-greatVibes">Gestión de Blogs</h1>
  <p class="text-gray-400 mb-3">Administra los admin.blogs. Puedes buscar, editar y eliminar entradas.</p>


  {{--Buscador--}}
  <form method="GET" action="{{ route('admin.blogs.index') }}" class="mb-6">
    <div class="relative">
      <img src="{{ asset('images/search.svg')}}"
        class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 pointer-events-none">

      <input type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Buscar Blogs..."
        class="border border-gray-300 px-3 py-2 pl-10 rounded-xl w-full">
    </div>
  </form>

  {{-- Tabla --}}
  <div class="overflow-hidden shadow-md sm:rounded-lg">
    <table class="min-w-full border border-neutral-200">
      <thead>
        <tr class="bg-pink-100 text-pink-400">
          <th class="px-4 py-2">Título</th>
          <th class="px-4 py-2">Descripción</th>
          <th class="px-4 py-2">Categoría</th>
          <th class="px-4 py-2">Imagen</th>
          <th class="px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($blogs as $blog)
        <tr>
          <td class="px-4 py-2">{{ $blog->title }}</td>
          <td class="px-4 py-2 max-w-xs">
              <div class="line-clamp-3 break-words overflow-hidden">
                  {{ $blog->description }}
              </div>
          </td>
          <td class="px-4 py-2">
            {{ $blog->category->name ?? '-' }}
          </td>
          <td class="px-4 py-5 items-center justify-center flex">
            @if($blog->directory)
            <img src="{{ asset('storage/' . $blog->directory) }}"
              class="size-20 object-cover rounded">
            @else
            No image
            @endif
          </td>
          <td class="px-4 py-2">
            <div class="flex justify-center items-center gap-3">
              <button class="text-yellow-500"
                onclick="document.getElementById('edit{{ $blog->id }}').showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
              </button>

              <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                method="POST"
                class="inline"
                onsubmit="return confirm('¿Seguro que deseas eliminar este blog?');">
                @csrf
                @method('DELETE')

                <button class="text-red-600"
                  type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>
                </button>
              </form>
            </div>
          </td>
        </tr>

        {{-- Modal Editar --}}
        <dialog id="edit{{ $blog->id }}"
          class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2
                              -translate-x-1/2 -translate-y-1/2
                                   w-full max-w-3xl">
          <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex justify-between items-center mb-4">
              <h3 class="text-lg font-bold">Editar Entrada</h3>
              <button type="button" onclick="this.closest('dialog').close()">✕</button>
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div>
                <p class="mb-1">* Título</p>
                <input type="text"
                  name="title"
                  value="{{ $blog->title }}"
                  class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                <p class="mb-1">* Categoría</p>
                <select name="category_id"
                  class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div>
                <p class="mb-1">* Imagen</p>
                @if($blog->directory)
                <img src="{{ asset('storage/' . $blog->directory) }}"
                  class="w-48 aspect-square object-cover rounded-lg shadow mb-2">
                @endif
                <input type="file"
                  name="directory"
                  class="border p-2 w-full mb-3">
              </div>
            </div>

            <p class="mb-1">Descripción</p>
            <textarea name="description"
              class="border w-full p-2 rounded-xl border-gray-400 mb-4"
              rows="4">{{ $blog->description }}</textarea>

            <div class="flex justify-end gap-2">
              <button type="button"
                onclick="this.closest('dialog').close()"
                class="px-3 py-1 border rounded-xl border-gray-400">
                Cancelar
              </button>
              <button type="submit"
                class="bg-blue-500 text-white px-3 py-1 border rounded-xl">
                Guardar Cambios
              </button>
            </div>
          </form>
        </dialog>

        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Paginación --}}
  <div class="mt-4">
    {{ $blogs->links() }}
  </div>

  {{-- Botón + para crear --}}
  <button onclick="document.getElementById('createBlog').showModal()"
    class="fixed bottom-6 right-6 bg-pink-400 text-white w-12 h-12 rounded-full text-2xl shadow-lg flex items-center justify-center">
    +
  </button>

  {{-- Modal Crear --}}
  <dialog id="createBlog"
    class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2
                   -translate-x-1/2 -translate-y-1/2
                   w-full max-w-3xl">
    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold">Crear Blog</h3>
        <button type="button" onclick="this.closest('dialog').close()">✕</button>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <p class="mb-1">* Título</p>
          <input type="text"
            name="title"
            placeholder="Título del blog"
            class="border w-full p-2 rounded-xl border-gray-400 mb-4">

          <p class="mb-1">* Categoría</p>
          <select name="category_id"
            class="border w-full p-2 rounded-xl border-gray-400 mb-4">
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <p class="mb-1">* Imagen</p>
          <input type="file"
            name="directory"
            class="border p-2 w-full mb-3">
        </div>
      </div>

      <p class="mb-1">* Descripción</p>
      <textarea name="description"
        placeholder="Descripción del blog"
        class="border w-full p-2 rounded-xl border-gray-400 mb-4"
        rows="4"></textarea>

      <div class="flex justify-end gap-2">
        <button type="button"
          onclick="this.closest('dialog').close()"
          class="px-3 py-1 border rounded-xl border-gray-400">
          Cancelar
        </button>
        <button type="submit"
          class="bg-pink-400 text-white px-3 py-1 border rounded-xl">
          Crear Blog
        </button>
      </div>
    </form>
  </dialog>
</div>
@endsection