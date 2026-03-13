@extends('admin.index')

@section('content')
<div class="flex-1 overflow-auto px-6 py-7">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-5xl font-semibold font-vibes pb-2">
            Gestión de categorías
        </h1>
        <p class="text-gray-400 font-mulish">
            Administra tu catálogo de categoría para los productos. Puedes agregar, editar y eliminar categorías.
        </p>

        <div class="overflow-x-auto">

            <form action="{{ route('admin.categories') }}" method="GET" class="mb-4 flex gap-2 py-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar categoría..." class="px-4 py-2 border rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-pink-400">
                <button type="submit" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                    Buscar
                </button>
            </form>

            <div class="grid grid-cols-3 gap-10">

                <div class="rounded-xl overflow-hidden border border-gray-300 col-span-1">
                    <div class="rounded-xl overflow-hidden border border-gray-300 col-span-1 p-6">
                        @include('admin.admin-categories.create')
                    </div>
                </div>

                <div class="rounded-xl overflow-hidden border border-gray-300 col-span-2">
                    <table class="text-center w-full">
                        <thead class="text-pink-400 bg-pink-100">
                            <tr>
                                <th class="px-3 py-3">ID</th>
                                <th class="px-3 py-3">Nombre</th>
                                <th class="px-3 py-3">Estado</th>
                                <th class="px-3 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @if($categories->count() > 0)

                            @foreach ($categories as $category)
                            <tr>
                                <td class="px-3 py-2">{{ $category->id }}</td>
                                <td class="px-3 py-2">{{ $category->name }}</td>
                                <td class="px-3 py-2">{{ $category->status ? 'Disponible' : 'No disponible' }}</td>
                                <td class="px-3 py-2">
                                    <div class="flex justify-center items-center gap-2">
                                        <button class="showButton px-3 py-1 text-blue-700 rounded-md text-sm hover:text-blue-900" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-status="{{ $category->status }}" data-bs-toggle="modal" data-bs-target="#showModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button>
                                        <button class="editButton px-3 py-1 text-yellow-500 rounded-md text-sm hover:text-yellow-700" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-status="{{ $category->status }}" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1 text-red-600 rounded-md text-sm hover:text-red-800" type="submit" onclick="return confirm('¿Desea eliminar esta categoría?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="flex justify-end">
                                                <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                                            </div>
                                            <h5 class="modal-title text-3x1 font-bold">
                                                Editar categoría
                                            </h5>
                                            <p class="text-gray-400 pb-2">
                                                Modifica los detalles de la categoría.
                                            </p>
                                            <form method="POST" id="editForm" action="{{ route('categories.update', $category) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label class="font-bold block mb-1">Nombre:</label>
                                                    <input id="editName" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la categoría" value="{{ old('name',$category->name) }}" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="font-bold block mb-1">Estado:</label>
                                                    <select id="editStatus" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                                                        <option value="1">Disponible</option>
                                                        <option value="0">No disponible</option>
                                                    </select>
                                                </div>
                                                <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 flex justify-end gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                                                    Editar categoría
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="showModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="flex justify-end">
                                                <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                                            </div>
                                            <h5 class="modal-title text-3x1 font-bold mb-1">
                                                Ver categoría
                                            </h5>
                                            <div class="mb-1">
                                                <h5 class="text-pink-500 font-mulish font-bold">Nombre de la categoría</h5>
                                                <p class="font-bold" id="showName"></p>
                                            </div>
                                            <div class="mb-1">
                                                <h5 class="text-pink-500 font-mulish font-bold">Estado de la categoría</h5>
                                                <p class="font-bold" id="showStatus"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else

                            <tr>
                                <td colspan="10" class="text-center">No hay categorías registrados</td>
                            </tr>

                            @endif

                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll(".editButton").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.dataset.id
            const name = this.dataset.name
            const status = this.dataset.status
            document.getElementById("editName").value = name
            document.getElementById("editStatus").value = status
            document.getElementById("editForm").action =
                `/categories/${id}`
        })
    })

    document.querySelectorAll(".showButton").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.dataset.id
            const name = this.dataset.name
            const status = this.dataset.status
            document.getElementById("showName").textContent = name
            document.getElementById("showStatus").textContent = status == 1 ? "Disponible" : "No disponible"
        })
    })
</script>
@endsection