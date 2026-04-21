@extends('admin.index')

@section('content')

<section class="sm:px-6 lg:px-8 overflow-y-auto">

  <div class="overflow-hidden shadow-sm max-w-250 mx-auto 
  sm:rounded-lg">
    <div class="p-6 text-gray-900">

      <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">
          <i class="fas fa-edit text-pink-500 mr-2"></i>
          Editar Pregunta
        </h3>
        <p class="text-sm text-gray-600">
          Modifica la información de la pregunta frecuente
        </p>
      </div>

      <form method="POST" action="{{ route('admin.questions.update', $question) }}" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Pregunta --}}
        <div>
          <label for="pregunta" class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-question-circle text-pink-500 mr-1"></i>
            Pregunta <span class="text-red-500">*</span>
          </label>

          <textarea name="pregunta"
            id="pregunta"
            rows="3"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 "
            placeholder="Escribe la pregunta del cliente...">{{ old('pregunta', $question->pregunta) }}</textarea>

          @error('pregunta')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        {{-- Respuesta --}}
        <div>
          <label for="respuesta" class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-comment text-pink-500 mr-1"></i>
            Respuesta <span class="text-red-500">*</span>
          </label>

          <textarea name="respuesta"
            id="respuesta"
            rows="5"
            required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 "
            placeholder="Escribe la respuesta detallada...">{{ old('respuesta', $question->respuesta) }}</textarea>

          @error('respuesta')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        {{-- Orden + Estado --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          <div>
            <label for="orden" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-sort-numeric-up text-pink-500 mr-1"></i>
              Orden
            </label>

            <input type="number"
              name="orden"
              id="orden"
              min="0"
              value="{{ old('orden', $question->orden) }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">

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
                {{ old('activo', $question->activo) ? 'checked' : '' }}
                class="h-4 w-4 text-pink-600 border-gray-300 rounded">

              <label for="activo" class="ml-2 text-sm text-gray-700">
                Activo
              </label>
            </div>
          </div>

        </div>

        {{-- Botones --}}
        <div class="flex justify-between pt-6 border-t border-gray-200">

          <a href="{{ route('admin.questions.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            <i class="fas fa-arrow-left mr-2"></i>
            Cancelar
          </a>

          <button type="submit"
            class="bg-linear-to-r from-pink-500 to-pink-600 text-white px-6 py-2 rounded-lg hover:from-pink-600 hover:to-pink-700">
            <i class="fas fa-save mr-2"></i>
            Actualizar Pregunta
          </button>

        </div>

      </form>

    </div>
  </div>
</section>


@endsection