@extends('admin.index')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-5xl font-semibold font-vibes pb-2">
                Gestión de productos
            </h1>
            <p class="text-gray-400 font-mulish">
                Administra tu catálogo de productos naturales. Puedes agregar, editar y eliminar productos.
            </p>

            <div class="overflow-x-auto">
                <form action="{{ route('products.index') }}" method="GET" class="mb-4 flex gap-2 py-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre o categoría..." class="px-4 py-2 border rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-pink-400">
                        <button type="submit" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                            Buscar
                        </button>
                </form>

                <div class="rounded-xl overflow-hidden border border-gray-300">
                    {{-- Index table --}}
                    @include('admin.products.partials.table')
                    {{-- Edit modal --}}
                    @include('admin.products.modals.edit')
                </div>
            </div>

            <div class="flex justify-end gap-3 mb-6 py-4 mx-14">
                <button class="bg-pink-400 shadow-md hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 transition all text-white rounded-full w-10 h-10 flex items-center justify-center" data-bs-toggle="modal" data-bs-target="#createModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
                {{-- Create modal --}}
                    @include('admin.products.modals.create')

                {{-- Show modal --}}
                    @include('admin.products.modals.show')   
            </div>
        </div>
    </div>
@include('admin.products.scripts.modals')
@endsection