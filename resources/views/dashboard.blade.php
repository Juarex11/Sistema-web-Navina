<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('siteinfo.update') }}">
                    @csrf
                    @method('PUT')
                        <h2 class="text-xl font-bold">Información del sitio</h2>
                        <p>Localizacion</p>
                        <input name="localizacion" value="{{ $info->localizacion }}" class="border w-full p-2">
                        <p>Telefono</p>
                        <input name="telefono" value="{{ $info->telefono }}" class="border w-full p-2">
                        <p>Correo</p>
                        <input name="correo" value="{{ $info->correo }}" class="border w-full p-2">
                        <p>Horario</p>
                        <input name="horario" value="{{ $info->horario }}" class="border w-full p-2">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Guardar
                        </button>
                    </form>

                    <form method="POST" action="{{ route('comments.store') }}" class="space-y-4">
                    @csrf
                        <h2 class="text-xl font-bold">Nuevo comentario</h2>
                        <input name="cliente" placeholder="Cliente" class="border w-full p-2">
                        <textarea name="comentario" placeholder="Comentario" class="border w-full p-2"></textarea>
                        <input name="calificacion" placeholder="Calificación">
                        <input type="date" name="fecha">
                        <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Crear comentario
                        </button>
                    </form>
                    @if(session('success'))
                        <div class="bg-green-200 p-2 my-2">
                        {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
