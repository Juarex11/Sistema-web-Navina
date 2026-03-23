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
                <form action="{{ route('admin.categories.index') }}" method="GET" class="mb-4 flex gap-2 py-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar categoría..." class="px-4 py-2 border rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-pink-400">
                        <button type="submit" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                            Buscar
                        </button>
                </form>

                <div class="grid grid-cols-3 gap-10">
                    <div class="rounded-xl overflow-hidden border border-gray-300 col-span-1">
                        <div class="rounded-xl overflow-hidden border border-gray-300 col-span-1 p-6">
                            {{-- Create form --}}
                            @include('admin.categories.modals.create')
                        </div>
                    </div>

                    <div class="rounded-xl overflow-hidden border border-gray-300 col-span-2">
                        {{-- Index table --}}
                            @include('admin.categories.partials.table')
                        {{-- Edit modal --}}
                            @include('admin.categories.modals.edit')
                        {{-- Show modal --}}
                            @include('admin.categories.modals.show')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.categories.scripts.modals')
@endsection