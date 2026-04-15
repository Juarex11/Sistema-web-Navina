<div class="min-w-full min-h-full">
    <div class="mb-4">
        <h1 class="text-3xl text-pink-400 font-vibes xl:text-5xl">
            Añadir categoría
        </h1>
    </div>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nombre categoría</label>
            <input class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la categoría" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Estado categoría</label>
            <select class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status" required>
                <option value="1">Disponible</option>
                <option value="0">No disponible</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="text-white bg-blue-800 hover:bg-blue-900 hover:-translate-y-1 flex justify-center 
            gap-1.5 p-2 transition-all rounded-md flex-1 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Guardar
            </button>

            <a href="{{ route('admin.subcategories.index') }}" class="px-4 py-2 bg-pink-400 text-white hover:bg-pink-500 hover:-translate-y-1 transition-all rounded-md self-start">
                Subcategorías
            </a>
        </div>

    </form>
</div>