<table class="w-full text-center">
    <thead class="text-pink-400 bg-pink-100">
        <tr>
            <th class="px-3 py-3">ID</th>
            <th class="px-3 py-3">Nombre</th>
            <th class="px-3 py-3">Categoría</th>
            <th class="px-3 py-3">Estado</th>
            <th class="px-3 py-3">Precio</th>
            <th class="px-3 py-3">Stock</th>
            <th class="px-3 py-3">Dscto</th>
            <th class="px-3 py-3 text-center">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @forelse ($products as $product)
        <tr>
            <td class="px-3 py-1">{{ $product->id }}</td>
            <td class="px-3 py-1">{{ $product->name }}</td>
            <td class="px-3 py-1">{{ $product->category->name ?? 'Sin categoría' }}</td>
            <td class="px-3 py-1">{{ $product->status ? 'Disponible' : 'No disponible' }}</td>
            <td class="px-3 py-1">S/.{{ $product->price }}</td>
            <td class="px-3 py-1
            text-green-600 font-semibold">
                {{ $product->stock }}
            </td>
            <td class="px-3 py-1">
                {{ rtrim(rtrim($product->discount), '.') }}%
            </td>
            <td class="px-3 py-1">
                <div class="flex justify-center items-center gap-2">
                    <button class="px-3 py-1 text-blue-700 rounded-md text-sm hover:text-blue-900 cursor-pointer"
                        @click='openShow(@json($product))'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>

                    <button class="px-3 py-1 text-yellow-500 rounded-md text-sm hover:text-yellow-700 cursor-pointer"
                        @click='openEdit(@json($product))'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </button>

                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 text-red-600 rounded-md text-sm hover:text-red-800" type="submit" onclick="return confirm('¿Desea eliminar este producto?')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="py-6 text-center text-gray-500">No hay productos registrados</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4">
    {{ $products->links() }}
</div>