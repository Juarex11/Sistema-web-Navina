<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Preguntas Frecuentes
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="card">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                                <i class="fas fa-question-circle text-2xl text-primary mr-3"></i>
                                Gestión de Preguntas Frecuentes
                            </h3>
                            <p class="text-sm mt-1 text-gray-600">Administra las preguntas y respuestas para tus clientes</p>
                        </div>
                        <a href="{{ route('preguntas-frecuentes.create') }}" 
                           class="btn-gradient px-4 py-2 rounded-lg font-medium inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Nueva Pregunta
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mt-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-r from-primary to-primary-dark text-white">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        <i class="fas fa-hashtag mr-2"></i>Orden
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        <i class="fas fa-question mr-2"></i>Pregunta
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        <i class="fas fa-comment mr-2"></i>Respuesta
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        <i class="fas fa-toggle-on mr-2"></i>Estado
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        <i class="fas fa-cogs mr-2"></i>Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($pregunta_frecuentes as $pregunta)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="inline-flex items-center justify-center w-8 h-8 bg-gradient-to-r from-primary to-primary-dark text-white rounded-full text-sm font-bold">
                                                {{ $pregunta->orden }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ \Illuminate\Support\Str::limit($pregunta->pregunta, 50) }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="text-sm text-gray-600">
                                                {{ \Illuminate\Support\Str::limit($pregunta->respuesta, 80) }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @if($pregunta->activo)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-1"></i>
                                                    Activo
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <i class="fas fa-times-circle mr-1"></i>
                                                    Inactivo
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <a href="{{ route('preguntas-frecuentes.edit', $pregunta->id) }}" 
                                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors">
                                                    <i class="fas fa-pen mr-1"></i>
                                                    Editar
                                                </a>
                                                
                                                <form action="{{ route('preguntas-frecuentes.destroy', $pregunta->id) }}" 
                                                      method="POST" 
                                                      class="inline"
                                                      onsubmit="return confirm('¿Estás seguro de eliminar esta pregunta?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors">
                                                        <i class="fas fa-trash mr-1"></i>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-12">
                                            <div class="text-center">
                                                <i class="fas fa-question-circle text-6xl text-gray-300 mb-4"></i>
                                                <p class="text-xl text-gray-500 mb-2">No hay preguntas frecuentes</p>
                                                <p class="text-gray-400">Usa el botón "Nueva Pregunta" para crear la primera</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
