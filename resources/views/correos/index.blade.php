<x-app-layout>

    <h1 class="text-5xl font-bold font-greatVibes mb-2">Gestión de Correos</h1>
    <p class="text-gray-400 mb-3">Administra los registros de usuarios. Puedes buscar, editar y eliminar entradas.</p>

    {{-- Buscador --}}
    <form method="GET" action="{{ route('correos.index') }}" class="mb-6">
        <div class="relative flex items-center">
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por nombre, apellido, distrito o correo..."
                class="border border-gray-300 px-3 py-2 rounded-xl w-full pr-10">

            @if(request('search'))
                <a href="{{ route('correos.index') }}"
                   class="absolute right-3 text-gray-400 hover:text-red-400 text-lg font-bold">
                    ✕
                </a>
            @else
                <button type="submit"
                        class="absolute right-3 text-gray-400 hover:text-pink-400">
                    🔍
                </button>
            @endif
        </div>
    </form>

    {{-- Tabla --}}
    <div class="grid grid-cols-1 bg-white overflow-hidden shadow-lg sm:rounded-lg">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-pink-100 text-pink-400">
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Apellido</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Distrito</th>
                    <th class="border px-4 py-2">Correo electrónico</th>
                    <th class="border px-4 py-2">Mensaje</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($correos as $correo)
                    <tr>
                        <td class="border px-4 py-2">{{ $correo->nombre }}</td>
                        <td class="border px-4 py-2">{{ $correo->apellido }}</td>
                        <td class="border px-4 py-2">{{ $correo->telefono }}</td>
                        <td class="border px-4 py-2">{{ $correo->distrito }}</td>
                        <td class="border px-4 py-2">{{ $correo->correo }}</td>
                        <td class="border px-4 py-2">{{ Str::limit($correo->mensaje, 50) }}</td>
                        <td class="border px-4 py-2 space-x-2">

                            {{-- Botón Editar --}}
                            <button onclick="document.getElementById('edit{{ $correo->id }}').showModal()"
                                    class="bg-gray-100 border border-gray-300 px-3 py-1 rounded-lg text-sm text-gray-600 hover:bg-gray-200">
                                Editar
                            </button>

                            {{-- Botón Eliminar --}}
                            <form action="{{ route('correos.destroy', $correo->id) }}"
                                method="POST"
                                class="inline"
                                onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
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
                    <dialog id="edit{{ $correo->id }}"
                            class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2
                                   -translate-x-1/2 -translate-y-1/2
                                   w-full max-w-3xl">
                        <form method="POST" action="{{ route('correos.update', $correo->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Editar Registro</h3>
                                <button type="button" onclick="this.closest('dialog').close()">✕</button>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="mb-1">* Nombre</p>
                                    <input type="text"
                                        name="nombre"
                                        value="{{ $correo->nombre }}"
                                        required
                                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                                    <p class="mb-1">* Apellido</p>
                                    <input type="text"
                                        name="apellido"
                                        value="{{ $correo->apellido }}"
                                        required
                                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                                    <p class="mb-1">* Teléfono</p>
                                    <input type="text"
                                        name="telefono"
                                        value="{{ $correo->telefono }}"
                                        required
                                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                                </div>

                                <div>
                                    <p class="mb-1">* Distrito</p>
                                    <input type="text"
                                        name="distrito"
                                        value="{{ $correo->distrito }}"
                                        required
                                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                                    <p class="mb-1">* Correo electrónico</p>
                                    <input type="email"
                                        name="correo"
                                        value="{{ $correo->correo }}"
                                        required
                                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                                </div>
                            </div>

                            <p class="mb-1">Mensaje</p>
                            <textarea name="mensaje"
                                      class="border w-full p-2 rounded-xl border-gray-400 mb-4"
                                      rows="3">{{ $correo->mensaje }}</textarea>

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
        {{ $correos->links() }}
    </div>

    {{-- Botón + para crear --}}
    <button onclick="document.getElementById('createCorreo').showModal()"
            class="fixed bottom-6 right-6 bg-pink-400 text-white w-12 h-12 rounded-full text-2xl shadow-lg flex items-center justify-center">
        +
    </button>

    {{-- Modal Crear --}}
    <dialog id="createCorreo"
            class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2
                   -translate-x-1/2 -translate-y-1/2
                   w-full max-w-3xl">
        <form method="POST" action="{{ route('correos.store') }}">
            @csrf

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Nuevo Registro</h3>
                <button type="button" onclick="this.closest('dialog').close()">✕</button>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="mb-1">* Nombre</p>
                    <input type="text"
                        name="nombre"
                        placeholder="Nombre"
                        required
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                    <p class="mb-1">* Apellido</p>
                    <input type="text"
                        name="apellido"
                        placeholder="Apellido"
                        required
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                    <p class="mb-1">* Teléfono</p>
                    <input type="text"
                        name="telefono"
                        placeholder="Teléfono"
                        required
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                </div>

                <div>
                    <p class="mb-1">* Distrito</p>
                    <input type="text"
                        name="distrito"
                        placeholder="Distrito"
                        required
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">

                    <p class="mb-1">* Correo electrónico</p>
                    <input type="email"
                        name="correo"
                        placeholder="correo@ejemplo.com"
                        required
                        class="border w-full p-2 rounded-xl border-gray-400 mb-4">
                </div>
            </div>

            <p class="mb-1">Mensaje</p>
            <textarea name="mensaje"
                      placeholder="Mensaje opcional"
                      class="border w-full p-2 rounded-xl border-gray-400 mb-4"
                      rows="3"></textarea>

            <div class="flex justify-end gap-2">
                <button type="button"
                        onclick="this.closest('dialog').close()"
                        class="px-3 py-1 border rounded-xl border-gray-400">
                    Cancelar
                </button>
                <button type="submit"
                    class="bg-pink-400 text-white px-3 py-1 border rounded-xl">
                    Guardar
                </button>
            </div>
        </form>
    </dialog>

</x-app-layout>