@extends('admin.index')

@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">
    <header class="pb-5 flex justify-between items-center">
        <div>
            <h1 class="text-5xl font-semibold font-greatVibes text-neutral-800 pb-2">Gestion de Comentarios</h1>
            <p class="text-gray-400">
                Administra los comentarios de los clientes. Puedes buscar, editar y eliminar entradas.
            </p>
        </div>
        <button onclick="document.getElementById('createComment').showModal()"
            class="bg-pink-400 px-4 py-2 flex items-center font-semibold justify-center text-white rounded-3xl
            transition hover:bg-pink-500 hover:scale-105 hover:shadow-pink-700 shadow cursor-pointer">
            Nuevo comentario
        </button>
    </header>

    <form method="GET" action="{{ route('admin.comments.index') }}" class="mb-6">
        <div class="relative">
            <img src="{{ asset('images/search.svg')}}"
                class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 pointer-events-none">
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar clientes"
                class="px-3 py-2 pl-10 rounded-xl w-full border border-neutral-300">
        </div>
    </form>

    <div class="shadow-lg sm:rounded-lg">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr class="bg-pink-100 text-pink-400">
                    <th class=" px-4 py-2">ID</th>
                    <th class=" px-4 py-2">Cliente</th>
                    <th class=" px-4 py-2">Comentario</th>
                    <th class=" px-4 py-2">Calificación</th>
                    <th class=" px-4 py-2">fecha</th>
                    <th class=" px-4 py-2">imagen</th>
                    <th class=" px-4 py-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td class=" px-4 py-2">
                        {{ $comment->id }}
                    </td>
                    <td class=" px-4 py-2">
                        {{ $comment->client ?? '-' }}
                    </td>
                    <td class=" px-4 py-2">
                        {{ $comment->commentary ?? '-' }}
                    </td>
                    <td class=" px-4 py-2">
                        {{ $comment->calification ?? '-' }}
                    </td>
                    <td class=" px-4 py-2">
                        {{ $comment->date ?? '-' }}
                    </td>
                    <td class=" p-4">
                        @if($comment->photo)
                        <img src="{{ asset('storage/' . $comment->photo) }}"
                            class="w-20 h-20 object-cover rounded">
                        @else
                        -
                        @endif
                    </td>
                    <td class=" px-4 py-2 space-x-2">

                        <button onclick="document.getElementById('edit{{ $comment->id }}').showModal()"
                            class=" -gray-500 px-2 py-2 rounded">
                            <img src="{{ asset('images/edit.svg') }}" class="w-5 h-5">
                        </button>

                        @include('admin.comments.modals.edit')

                        <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                            method="POST"
                            class="inline"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este comentario?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class=" -red-500 px-2 py-2 rounded ">
                                <img src="{{ asset('images/delete.svg') }}" class="w-5 h-5">
                            </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.comments.modals.create')

</main>

@endsection