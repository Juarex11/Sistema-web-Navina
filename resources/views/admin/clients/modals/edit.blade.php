<div x-show="openEditModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" x-cloak>
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-8 mx-4" @click.away="openEditModal = false">
        <div class="flex justify-between mb-3">
            <p class="modal-title text-3xl font-bold">
                Editar Usuario
            </p>
            <button @click="openEditModal = false"
                class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <form :action="`/admin/clients/${clientData.id}`" method="POST">
            @csrf
            @method('PUT')
            <p class="text-gray-400 pb-2">
                Modifica los detalles del usuario.
            </p>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="block mb-1 font-medium text-gray-700">Nombre:</p>
                    <input type="text" name="name" x-model="clientData.name" placeholder="Nombre"
                        class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                <div>
                    <p class="block mb-1 font-medium text-gray-700">Apellido:</p>
                    <input type="text" name="lastname" x-model="clientData.lastname" placeholder="Apellido"
                        class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                </div>
            </div>
            <div class="pb-4">
                <p class="block mb-1 font-medium text-gray-700">Correo electrónico:</p>
                <input type="email" name="email" x-model="clientData.email"
                    class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                <p class="block mb-1 font-medium text-gray-700">Teléfono:</p>
                <input type="text" name="phone" x-model="clientData.phone"
                    class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                <p class="block mb-1 font-medium text-gray-700">Distrito:</p>
                <input type="text" name="district" x-model="clientData.district"
                    class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300">
                <p class="block mb-1 font-medium text-gray-700">Mensaje:</p>
                <textarea name="message" x-model="clientData.message"
                    class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300"
                    rows="3"></textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button type="submit"
                    class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>