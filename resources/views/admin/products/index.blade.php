@extends('admin.index')

@section('content')
<div class="flex-1 overflow-auto px-6 py-7"
    id="adminProductsView"
    x-data="adminProductsPage(@js($categories), @js($subcategories))">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-5xl font-semibold font-greatVibes">
            Gestión de productos
        </h1>
        <p class="text-gray-400 font-mulish py-3">
            Administra tu catálogo de productos naturales. Puedes agregar, editar y eliminar productos.
        </p>

        <div class="overflow-x-auto">
            <form action="{{ route('admin.products.index') }}" method="GET" class="mb-4 flex gap-2 py-2">
                <input class="px-4 py-2 rounded-lg border border-neutral-400 w-full focus:outline-pink-300"
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar por nombre o categoría...">

                <button type="submit"
                    class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                    Buscar
                </button>
            </form>

            <div class="rounded-xl overflow-hidden border border-gray-300">
                @include('admin.products.partials.table')
            </div>
        </div>

        <div class="flex justify-end gap-3 py-4 ">
            <button
                class="bg-pink-400 shadow-md hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 transition all text-white rounded-full w-10 h-10 flex items-center justify-center"
                @click="openCreate()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>

    </div>

    @include('admin.products.modals.create')
    @include('admin.products.modals.edit')
    @include('admin.products.modals.show')
</div>


@include('admin.products.scripts.alpine')

@endsection