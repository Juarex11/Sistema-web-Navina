@extends('admin.index')

@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">

    <div class="max-w-7xl mx-auto sm:px-8 lg:px-8 mt-10" hidden>
        <div class="grid grid-cols-1 gap-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form method="POST"
                    action="{{ route('admin.comments.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <h2 class="text-2xlZ mb-4">Nuevo comentario</h2>

                    <p class="text-3xl font-greatVibes">Cliente</p>
                    <input name="cliente"
                        placeholder="Introduce el nombre del cliente"
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                    <p class="text-3xl font-greatVibes">Comentario</p>
                    <textarea name="comentario"
                        placeholder="Deja aqui tu comentario"
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4"></textarea>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                        <p class="text-3xl font-greatVibes">Calificación</p>
                        <p class="text-3xl font-greatVibes">Fecha</p>

                        <input name="calificacion"
                            placeholder="califica del 1 al 10"
                            class="border p-2 rounded-xl border-gray-400 mb-4"
                            type="number"
                            min="0" max="10">

                        <input type="date"
                            name="fecha"
                            class="border p-2 rounded-xl border-gray-400 mb-4">
                    </div>
                    <p class="text-3xl font-greatVibes">Foto</p>
                    <input type="file"
                        name="foto"
                        class="border w-full p-2 mb-8">

                    <button class="ms-3 bg-pink-400 px-6 h-11 flex items-center justify-center text-white rounded-xl">
                        Crear comentario
                    </button>
                </form>
            </div>
        </div>
    </div>

    <header class="pb-5">
        <h1 class="text-4xl font-semibold text-neutral-800 font-mulish pb-2">Gestion de Comentarios</h1>
        <p class="text-neutral-300">
            Administra los comentarios de los clientes. Puedes buscar, editar y eliminar entradas.
        </p>
    </header>

    <form method="GET" action="{{ route('admin.comments.index') }}" class="mb-6">
        <div class="relative">
            <img src="{{ asset('images/search.svg')}}"
                class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 pointer-events-none">
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar clientes"
                class="border border-gray-300 px-3 py-2 pl-10 rounded-xl w-full">
        </div>
    </form>

    <div class="grid grid-cols-1 bg-white overflow-hidden shadow-lg sm:rounded-lg">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr class="bg-pink-100 text-pink-400">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Cliente</th>
                    <th class="border px-4 py-2">Comentario</th>
                    <th class="border px-4 py-2">Calificación</th>
                    <th class="border px-4 py-2">fecha</th>
                    <th class="border px-4 py-2">imagen</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td class="border px-4 py-2">
                        {{ $comment->id }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $comment->cliente ?? '-' }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $comment->comentario ?? '-' }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $comment->calificacion ?? '-' }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $comment->fecha ?? '-' }}
                    </td>
                    <td class="border px-4 py-2">
                        @if($comment->foto)
                        <img src="{{ asset('storage/' . $comment->foto) }}"
                            class="w-20 h-20 object-cover rounded">
                        @else
                        -
                        @endif
                    </td>
                    <td class="border px-4 py-2 space-x-2">

                        <button onclick="document.getElementById('edit{{ $comment->id }}').showModal()"
                            class="border border-gray-500 px-2 py-2 rounded">
                            <img src="{{ asset('images/edit.svg') }}" class="w-5 h-5">
                        </button>

                        <dialog id="edit{{ $comment->id }}"
                            class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2 
                                        -translate-x-1/2 -translate-y-1/2 
                                        w-full max-w-3xl ">
                            <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h3 class="text-lg mb-4 font-bold"> Editar comentario</h3>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <div>
                                            <p>Cliente</p>
                                            <input type="text"
                                                name="cliente"
                                                value="{{ $comment->cliente }}"
                                                class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                                        </div>

                                        <div>
                                            <p>Comentario</p>
                                            <textarea name="comentario"
                                                class="border w-full p-2 rounded-xl border-gray-400 mb-4">{{ $comment->comentario }}</textarea>
                                        </div>
                                    </div>

                                    <div>
                                        <p>Foto</p>
                                        @if($comment->foto)
                                        <div class="mb-4 flex justify-center">
                                            <div class="relative inline-block group">
                                                <img src="{{ asset('storage/' . $comment->foto) }}"
                                                    class="w-48 aspect-square object-cover rounded-lg shadow">

                                                <button type="submit"
                                                    name="delete_foto"
                                                    value="1"
                                                    class="absolute top-2 right-2 border border-gray-500 
                                                           opacity-0 group-hover:opacity-100 bg-white
                                                           transition rounded p-1 shadow">
                                                    <img src="{{ asset('images/delete_black.svg')}}">
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                        <div>
                                            <input type="file"
                                                name="foto"
                                                class="border p-2 w-full mb-3"
                                                hidden>
                                        </div>
                                    </div>

                                    <div>
                                        <p>Calificación</p>
                                        <input name="calificacion"
                                            value="{{ $comment->calificacion }}"
                                            class="border w-full p-2 rounded-xl border-gray-400 mb-4"
                                            type="number" min="0" max="10">
                                    </div>

                                    <div>
                                        <p>Fecha</p>
                                        <input name="fecha"
                                            value="{{ $comment->fecha }}"
                                            class="border p-2 rounded-xl border-gray-400 mb-4"
                                            type="date">
                                    </div>
                                </div>


                                <div class="flex justify-end gap-2">
                                    <button type="button"
                                        onclick="this.closest('dialog').close()"
                                        class="px-3 py-1 border rounded-xl border-gray-400">
                                        Cancelar
                                    </button>

                                    <button type="submit"
                                        class="bg-pink-400 text-white px-3 py-1 border rounded-xl">
                                        Guardar Cambios
                                    </button>
                                </div>
                            </form>
                        </dialog>

                        <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                            method="POST"
                            class="inline"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este comentario?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="border border-red-500 px-2 py-2 rounded ">
                                <img src="{{ asset('images/delete.svg') }}" class="w-5 h-5">
                            </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection