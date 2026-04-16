@extends('admin.index')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7"
    x-data="clientsPage()">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-5xl font-semibold ">
                Gestión de usuarios
            </h1>
            <p class="text-gray-400 font-mulish py-3">
                Administra la información de los usuarios registrados. Puedes buscar, editar y cambiar la información.
            </p>

            <div class="overflow-x-auto">
                <form action="{{ route('admin.clients.index') }}" method="GET" class="mb-4 flex gap-2 py-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Buscar por nombre, apellido, distrito o correo"
                        class="px-4 py-2 border rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-pink-400">
                    <button type="submit"
                        class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                        Buscar
                    </button>
                </form>

                <div>
                    <div class="rounded-xl overflow-hidden border border-gray-300 col-span-2">
                        @include('admin.clients.partials.table')
                        @include('admin.clients.modals.edit')
                    </div>
                    <div class="flex justify-end gap-3 mb-6 py-4 mx-14 ">
                        <button
                            class="bg-pink-400 shadow-md hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 transition all text-white rounded-full w-10 h-10 flex items-center justify-center"
                            @click="openCreate()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                        @include('admin.clients.modals.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.clients.scripts.scripts')
@endsection