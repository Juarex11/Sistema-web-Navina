<x-app-layout>

            <!-- Tabla -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white ">
                <div class=" text-gray-900">
                    <form method="POST" 
                          action="{{ route('siteinfo.update') }}">
                        @csrf
                        @method('PUT')
                        <h2 class="text-5xl font-bold font-greatVibes mb-4">Información de la Empresa</h2>
                        
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

                        <button class=" bg-pink-400 px-6 h-11 flex items-center justify-center text-white rounded-xl">
                            Guardar Cambios
                        </button>
                    </form>
                </div>

                <div class="min-h-screen">
                    <div class="bg-gray-100 border border-gray-200 rounded-lg shadow-lg w-full min-h-[500px] 
                                  flex flex-col justify-center items-center text-center">
                        <h1 class="text-6xl font-bold font-greatVibes mb-2"> {{ $info->localizacion }}</h1>
                        <p> {{ $info->telefono }}</p>
                        <p> {{ $info->correo }}</p>
                        <p> {{ $info->horario }}</p>
                    </div>
                </div>
                
            </div>

</x-app-layout>
