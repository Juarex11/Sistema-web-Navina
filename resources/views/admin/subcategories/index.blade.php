@extends('admin.index')
@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-5xl font-semibold font-vibes pb-2">
                Gestión de subcategorías
            </h1>
            <p class="text-gray-400 font-mulish">
                Administra tu catálogo de subcategoría para los productos. Puedes agregar, editar y eliminar subcategorías.
            </p>

            <div class="overflow-x-auto">
                <form action="{{ route('admin.subcategories.index') }}" method="GET" class="mb-4 flex gap-2 py-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar subcategoría..." class="px-4 py-2 border rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-pink-400">
                        <button type="submit" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                            Buscar
                        </button>
                </form>

                <div class="grid grid-cols-3 gap-10">
                    <div class="rounded-xl overflow-hidden border border-gray-300 col-span-1">
                        <div class="rounded-xl overflow-hidden border border-gray-300 col-span-1 p-6">
                            {{-- Create form --}}
                            @include('admin.subcategories.modals.create')
                        </div>
                    </div>

                    <div class="rounded-xl overflow-hidden border border-gray-300 col-span-2" x-data="subcategoriesPage()">
                        {{-- Index table --}}
                            @include('admin.subcategories.partials.table')
                        {{-- Edit modal --}}
                            @include('admin.subcategories.modals.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection