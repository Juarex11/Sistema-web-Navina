<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" 
                          action="{{ route('siteinfo.update') }}">
                        @csrf
                        @method('PUT')
                        <h2 class="text-xl font-bold">Información del sitio</h2>
                        
                        <p>Localizacion</p>
                        <input name="localizacion" value="{{ $info->localizacion }}" class="border w-full p-2 rounded-xl border-gray-400">
                        
                        <p>Telefono</p>
                        <input name="telefono" value="{{ $info->telefono }}" class="border w-full p-2">
                        
                        <p>Correo</p>
                        <input name="correo" value="{{ $info->correo }}" class="border w-full p-2">
                        
                        <p>Horario</p>
                        <input name="horario" value="{{ $info->horario }}" class="border w-full p-2">

                        <button class="bg-blue-600 text-white px-4 py-2 rounded">
                            Guardar
                        </button>
                    </form>

                    <form method="POST" 
                          action="{{ route('comments.store') }}" 
                          enctype="multipart/form-data" 
                          class="space-y-4">
                    @csrf
                        <h2 class="text-xl font-bold">Nuevo comentario</h2>
                        <input name="cliente" placeholder="Cliente" class="border w-full p-2">
                        <textarea name="comentario" placeholder="Comentario" class="border w-full p-2"></textarea>
                        <input name="calificacion" placeholder="Calificación">
                        <input type="date" name="fecha">
                        <input type="file" name="foto" class="border w-full p-2">

                        <button class="bg-green-600 text-white px-4 py-2 rounded">
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

                            <h3 class="text-lg mb-4">Editar comentario</h3>

                            <input
                                type="text"
                                name="cliente"
                                value="{{ $comment->cliente }}"
                                class="border p-2 w-full mb-3">

                            <textarea
                                name="comentario"
                                class="border p-2 w-full mb-3">
                                {{ $comment->comentario }}
                            </textarea>

                            <input type="file" name="foto" class="border p-2 w-full mb-3">
                            
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
