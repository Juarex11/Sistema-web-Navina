<table class="text-center w-full">
    <thead class="text-pink-400 bg-pink-100">
        <tr>
            <th class="px-3 py-3">Nombre</th>
            <th class="px-3 py-3">Apellido</th>
            <th class="px-3 py-3">Teléfono</th>
            <th class="px-3 py-3">Distrito</th>
            <th class="px-3 py-3">Correo electrónico</th>
            <th class="px-3 py-3">Mensaje</th>
            <th class="px-3 py-3">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @forelse ($clients as $client)
            <tr>
                <td class="px-3 py-2">{{ $client->name }}</td>
                <td class="px-3 py-2">{{ $client->lastname }}</td>
                <td class="px-3 py-2">{{ $client->phone }}</td>
                <td class="px-3 py-2">{{ $client->district }}</td>
                <td class="px-3 py-2">{{ $client->email }}</td>
                <td class="px-3 py-2">{{ $client->message }}</td>
                <td class="px-3 py-2">
                    <div class="flex justify-center items-center gap-2">
                        <button class="px-3 py-1 text-yellow-500 rounded-md text-sm hover:text-yellow-700 transition-all"
                            @click="openEdit({ 
                                id: {{ $client->id }}, 
                                name: @js($client->name), 
                                lastname: @js($client->lastname),
                                phone: @js($client->phone),
                                district: @js($client->district),
                                email: @js($client->email),
                                message: @js($client->message)
                            })">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </button>
                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 text-red-600 rounded-md text-sm hover:text-red-800 transition-all"
                                type="submit" onclick="return confirm('¿Desea eliminar este usuario?')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center p-4">No hay usuarios registrados</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4">
    {{ $clients->links() }}
</div>