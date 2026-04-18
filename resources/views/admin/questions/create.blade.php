@extends('admin.index')

@section('content')

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                            <i class="fas fa-plus-circle text-pink-500 mr-2"></i>
                            Crear Nueva Pregunta
                        </h3>
                        <p class="text-sm text-gray-600">Agrega una nueva pregunta y respuesta para tus clientes</p>
                    </div>

                    <form method="POST" action="{{ route('admin.questions.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="pregunta" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-question-circle text-pink-500 mr-1"></i>
                                Pregunta <span class="text-red-500">*</span>
                            </label>
                            <textarea name="pregunta" 
                                      id="pregunta" 
                                      rows="3" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-150 @error('pregunta') border-red-500 @enderror"
                                      required
                                      placeholder="Escribe la pregunta del cliente...">{{ old('pregunta') }}</textarea>
                            @error('pregunta')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="respuesta" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-comment text-pink-500 mr-1"></i>
                                Respuesta <span class="text-red-500">*</span>
                            </label>
                            <textarea name="respuesta" 
                                      id="respuesta" 
                                      rows="5" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-150 @error('respuesta') border-red-500 @enderror"
                                      required
                                      placeholder="Escribe la respuesta detallada...">{{ old('respuesta') }}</textarea>
                            @error('respuesta')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="orden" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-sort-numeric-up text-pink-500 mr-1"></i>
                                    Orden
                                </label>
                                <input type="number" 
                                       name="orden" 
                                       id="orden" 
                                       value="{{ old('orden', 0) }}"
                                       min="0"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-150 @error('orden') border-red-500 @enderror"
                                       placeholder="0">
                                @error('orden')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-toggle-on text-pink-500 mr-1"></i>
                                    Estado
                                </label>
                                <div class="flex items-center h-10">
                                    <input type="checkbox" 
                                           name="activo" 
                                           id="activo" 
                                           value="1"
                                           {{ old('activo', true) ? 'checked' : '' }}
                                           class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                                    <label for="activo" class="ml-2 block text-sm text-gray-700">
                                        Activo
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('admin.questions.index') }}" 
                               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-150">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-6 py-2 rounded-lg hover:from-pink-600 hover:to-pink-700 transition-all duration-200 shadow-md hover:shadow-lg">
                                <i class="fas fa-save mr-2"></i>
                                Guardar Pregunta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
