@extends('admin.index')


@section('content')
<div class="p-8">
    <h1 class="text-5xl font-bold font-[Great_Vibes] mb-2">Gestión de Blogs</h1>
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
    <div class="grid grid-cols-1 bg-white overflow-hidden shadow-lg sm:rounded-lg">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-pink-100 text-pink-400">
                    <th class="border px-4 py-2">Título</th>
                    <th class="border px-4 py-2">Descripción</th>
                    <th class="border px-4 py-2">Categoría</th>
                    <th class="border px-4 py-2">Imagen</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td class="border px-4 py-2">{{ $blog->title }}</td>
                        <td class="border px-4 py-2">{{ Str::limit($blog->description, 80) }}</td>
                        <td class="border px-4 py-2">{{ $blog->category->name ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            @if($blog->directory)
                                <img src="{{ asset('storage/' . $blog->directory) }}"
                                    class="w-20 h-20 object-cover rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            {{-- Botón Editar --}}
                            <button onclick="document.getElementById('edit{{ $blog->id }}').showModal()"
                                    class="bg-gray-100 border border-gray-300 px-3 py-1 rounded-lg text-sm text-gray-600 hover:bg-gray-200">
                                Editar
                            </button>

                            {{-- Botón Eliminar --}}
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                method="POST"
                                class="inline"
                                onsubmit="return confirm('¿Seguro que deseas eliminar este blog?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-50 border border-red-300 px-3 py-1 rounded-lg text-sm text-red-500 hover:bg-red-100">
                                    Eliminar
                                </button>
                            </form>

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
