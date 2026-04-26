<div class="min-w-full min-h-full">
<div class="mb-4">
    <h1 class="text-5xl text-pink-400 font-greatVibes">
        Añadir subcategoría
    </h1>
</div>
<form action="{{ route('admin.subcategories.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block mb-1 font-medium">Categoría principal</label>
        <select class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id" required>
            <option value="">--- Seleccionar ---</option>
            @forelse ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
                <option value="">-- Sin Categorías --</option>
            @endforelse
        </select>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Nombre de la subcategoría</label>
        <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="name" placeholder="Nombre de la subcategoría" required>
    </div>

    <button type="submit" class="text-white bg-blue-800 hover:bg-blue-900 hover:-translate-y-1 flex justify-end gap-3 mb-6 py-2 px-4 transition-all rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Guardar
    </button>
</form>
</div>