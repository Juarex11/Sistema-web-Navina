<x-app-layout>
    <div class="py-12 ">
        <!-- Información del sitio -->
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <!-- Tabla -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" 
                          action="{{ route('siteinfo.update') }}">
                        @csrf
                        @method('PUT')
                        <h2 class="text-6xl font-bold font-greatVibes mb-4">Información del sitio</h2>
                        
                        <p class="text-3xl font-greatVibes">Localizacion</p>
                        <input name="localizacion" 
                               value="{{ $info->localizacion }}"
                               class="border w-full p-2 rounded-xl border-gray-400 mb-4"
                               required>
                        
                        <p class="text-3xl font-greatVibes">Telefono</p>
                        <input name="telefono" 
                               value="{{ $info->telefono }}" 
                               class="border w-full p-2 rounded-xl border-gray-400 mb-4"
                               required>
                        
                        <p class="text-3xl font-greatVibes">Correo</p>
                        <input name="correo" 
                               value="{{ $info->correo }}" 
                               class="border w-full p-2 rounded-xl border-gray-400 mb-4"
                               required>
                        
                        <p class="text-3xl font-greatVibes">Horario</p>
                        <input name="horario" 
                               value="{{ $info->horario }}" 
                               class="border w-full p-2 rounded-xl border-gray-400 mb-6"
                               required>

                        <button class="ms-3 bg-pink-400 px-6 h-11 flex items-center justify-center text-white rounded-xl">
                            Guardar Cambios
                        </button>
                    </form>
                </div>

                <div class="min-h-screen flex items-center justify-center">
                    <div class="bg-gray-200 p-10 text-gray-900 text-center rounded-lg shadow-lg w-3/4 h-2/4">
                        <h1 class="text-6xl font-bold font-greatVibes mb-4"> {{ $info->localizacion }}</h1>
                        <p> {{ $info->telefono }}</p>
                        <p> {{ $info->correo }}</p>
                        <p> {{ $info->horario }}</p>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
