@extends('admin.index')

@section('content')

<div class="max-w-7xl space-y-6">
  <div class="card">
    <div class="p-6 border-b border-gray-200">
      <div class="flex justify-between items-center">
        <div>
          <h3 class="text-5xl font-bold text-gray-900 font-greatVibes items-center">
            Preguntas y Respuestas
          </h3>
          <p class="text-gray-400">Administra las preguntas para dar respuestas para los clientes</p>
        </div>
        <a href="{{ route('admin.questions.create') }}"
          class="btn-linear px-4 py-2 rounded-lg font-medium inline-flex items-center">
          <i class="fas fa-plus mr-2"></i>
          Nueva question
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
      <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full">
          <thead class="bg-pink-100 text-pink-400">
            <tr>
              <th class="px-4 py-3">
                <i class="fas fa-hashtag mr-2"></i>N° Orden
              </th>
              <th class="px-4 py-3">
                <i class="fas fa-question mr-2"></i>Pregunta
              </th>
              <th class="px-4 py-3">
                <i class="fas fa-comment mr-2"></i>Respuesta
              </th>
              <th class="px-4 py-3">
                <i class="fas fa-toggle-on mr-2"></i>Estado
              </th>
              <th class="px-4 py-3">
                <i class="fas fa-cogs mr-2"></i>Opciones
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse($questions as $question)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 whitespace-nowrap">
                <span class="flex justify-center items-center">
                  {{ $question->orden }}
                </span>
              </td>
              <td class="px-4 py-3">
                <div class="text-sm font-medium text-gray-900">
                  {{ \Illuminate\Support\Str::limit($question->pregunta, 50) }}
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="text-sm text-gray-600">
                  {{ \Illuminate\Support\Str::limit($question->respuesta, 80) }}
                </div>
              </td>
              <td class="px-4 py-3 whitespace-nowrap">
                @if($question->activo)
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
              <td class="px-4 py-3 align-middle">
                <div class="flex justify-center items-center gap-3">

                  <!-- Editar -->
                  <a href="{{ route('admin.questions.edit', $question->id) }}"
                    class="w-9 h-9 flex items-center justify-center rounded bg-blue-500 hover:bg-blue-600 text-white transition-colors">
                    
                    <!-- Icono lápiz (SVG) -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.4998 5.49994L18.3282 8.32837M3 20.9997L3.04745 20.6675C3.21536 19.4922 3.29932 18.9045 3.49029 18.3558C3.65975 17.8689 3.89124 17.4059 4.17906 16.9783C4.50341 16.4963 4.92319 16.0765 5.76274 15.237L17.4107 3.58896C18.1918 2.80791 19.4581 2.80791 20.2392 3.58896C21.0202 4.37001 21.0202 5.63634 20.2392 6.41739L8.37744 18.2791C7.61579 19.0408 7.23497 19.4216 6.8012 19.7244C6.41618 19.9932 6.00093 20.2159 5.56398 20.3879C5.07171 20.5817 4.54375 20.6882 3.48793 20.9012L3 20.9997Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  </a>

                  <!-- Eliminar -->
                  <form action="{{ route('admin.questions.destroy', $question->id) }}"
                        method="POST"
                        onsubmit="return confirm('¿Estás seguro de eliminar esta question?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                      class="w-9 h-9 flex items-center justify-center rounded bg-red-500 hover:bg-red-600 text-white transition-colors">
                      
                      <!-- Icono tacho (SVG) -->
                      <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
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
                  <p class="text-xl text-gray-500 mb-2">No hay questions frecuentes</p>
                  <p class="text-gray-400">Usa el botón "Nueva question" para crear la primera</p>
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
@endsection