<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <!-- Información del sitio -->
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <!-- Tabla -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" 
                          action="{{ route('siteinfo.update') }}">
                        @csrf
                        @method('PUT')
                        <h2 class="text-6xl font-bold font-greatVibes mb-4">Información del sitio</h2>
                        
                        <p class="text-3xl font-greatVibes">Localizacion</p>
                        <input name="localizacion" value="{{ $info->localizacion }}" class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                        
                        <p class="text-3xl font-greatVibes">Telefono</p>
                        <input name="telefono" value="{{ $info->telefono }}" class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                        
                        <p class="text-3xl font-greatVibes">Correo</p>
                        <input name="correo" value="{{ $info->correo }}" class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                        
                        <p class="text-3xl font-greatVibes">Horario</p>
                        <input name="horario" value="{{ $info->horario }}" class="border w-full p-2 rounded-xl border-gray-400 mb-6">

                        <button class="ms-3 bg-pink-400 px-6 h-11 flex items-center justify-center text-white rounded-xl">
                            Guardar Cambios
                        </button>
                    </form>
                </div>

                <div class="min-h-screen flex items-center justify-center">
                    <div class="bg-gray-200 p-10 text-gray-900 text-center rounded-lg shadow-lg w-3/4 h-2/4">
                        <h1 class="text-6xl font-bold font-greatVibes mb-4"> {{ $info->localizacion }}</h1>
                        <p> {{ $info->telefono }}</p>
                        <p> {{ $info->correo }}</p>
                        <p> {{ $info->horario }}</p>
                    </div>
                </div>
            </div>
        </div>


        <!--Comentarios-->
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" 
                        action="{{ route('comments.store') }}" 
                        enctype="multipart/form-data" 
                        class="space-y-4">
                        @csrf

                        <h2 class="text-6xl font-bold font-greatVibes mb-4">Nuevo comentario</h2>

                        <input name="cliente" placeholder="Cliente" class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                        <textarea name="comentario" placeholder="Comentario" class="border w-full p-2 rounded-xl border-gray-400 mb-4"></textarea>

                        <input name="calificacion" placeholder="Calificación" class="border p-2 rounded-xl border-gray-400 mb-4" type="number" min="0" max="10">

                        <input type="date" name="fecha" class="border p-2 rounded-xl border-gray-400 mb-4">

                        <input type="file" name="foto" class="border w-full p-2">

                        <button class="ms-3 bg-green-600 px-6 h-11 flex items-center justify-center text-white rounded-xl">
                            Crear comentario
                        </button>
                    </form>
                    @if(session('success'))
                        <div class="bg-green-200 p-2 my-2">
                        {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <table class="min-w-full border border-gray-300">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Comentario</th>
                    <th class="border px-4 py-2">Calificación</th>
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
                            @if($comment->foto)
                                <img src="{{ asset('storage/' . $comment->foto) }}"
                                    class="w-20 h-20 object-cover rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                        <!--EDITAR + MARCO FLOTANTE-->
                        <button onclick="document.getElementById('edit{{ $comment->id }}').showModal()"
                                class="bg-blue-500 text-white px-3 py-1 rounded">
                                Editar
                        </button>

                        <dialog id="edit{{ $comment->id }}" class="p-6 rounded shadow">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h3 class="text-lg mb-4"> Editar comentario</h3>

                            <input type="text"
                                    name="cliente"
                                    value="{{ $comment->cliente }}"
                                    class="border p-2 w-full mb-3">

                            <textarea name="comentario"
                                        class="border p-2 w-full mb-3">
                                        {{ $comment->comentario }}
                            </textarea>

                            <input name="calificacion" 
                                    value="{{ $comment->calificacion }}" 
                                    class="border p-2 rounded-xl border-gray-400 mb-4"
                                    type="number" min="0" max="10">

                            <input name="fecha" 
                                    value="{{ $comment->fecha }}"
                                    class="border p-2 rounded-xl border-gray-400 mb-4"
                                    type="date">

                            <input type="file" 
                                    name="foto" 
                                    class="border p-2 w-full mb-3">
                            
                            <div class="flex justify-end gap-2">
                                <button type="button"
                                        onclick="this.closest('dialog').close()"
                                        class="px-3 py-1 border">
                                        Cancelar
                                </button>

                                <button type="submit"
                                    class="bg-green-600 text-white px-3 py-1 rounded">
                                    Guardar
                                </button>
                            </div>

                        </form>


<!--ELIMINAR-->
                        </dialog>
                        <form action="{{ route('comments.destroy', $comment->id) }}"
                            method="POST"
                            class="inline"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este comentario?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 text-white px-3 py-1 rounded">
                                Eliminar
                            </button>

                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
