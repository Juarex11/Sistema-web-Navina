@extends('admin.index')


@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">

    <h1 class="text-4xl font-semibold text-neutral-800 pb-5 font-mulish">Informacion de la empresa</h1>

    <div class="gap-7 lg:grid lg:grid-cols-2">

        <form class="flex flex-col gap-3"
            method="POST"
            action="{{ route('siteinfo.update') }}">
            @csrf
            @method('PUT')

            <p class="text-xl text-neutral-700">Localizacion</p>
            <input name="localizacion"
                value="{{ old('localizacion', $info->localizacion ?? '') }}"
                class="border-[1.5px] p-2 text-sm rounded-xl border-neutral-400"
                required>

            <p class="text-xl text-neutral-700">Telefono</p>
            <input name="telefono"
                value="{{ old('telefono', $info->telefono ?? '') }}"
                class="border-[1.5px] p-2 text-sm rounded-xl border-neutral-400"
                required>

            <p class="text-xl text-neutral-700">Correo</p>
            <input name="correo"
                value="{{ old('correo', $info->correo ?? '') }}"
                class="border-[1.5px] p-2 text-sm rounded-xl border-neutral-400"
                required>

            <p class="text-xl text-neutral-700">Horario</p>
            <input name="horario"
                value="{{ old('horario', $info->horario ?? '') }}"
                class="border-[1.5px] p-2 text-sm rounded-xl border-neutral-400"
                required>

            <button class="ml-auto w-max bg-pink-400 mt-2 px-6 py-2 text-white rounded-xl">
                Guardar Cambios
            </button>

        </form>

        <div class="flex-1 flex">
            <div class="bg-neutral-100 border border-neutral-200 rounded-lg shadow-lg w-full
            flex flex-col justify-center items-center text-center">
                <h1 class="text-2xl font-bold font-greatVibes mb-2"> {{ $info->localizacion }}</h1>
                <p> {{ $info->telefono }}</p>
                <p> {{ $info->correo }}</p>
                <p> {{ $info->horario }}</p>
            </div>
        </div>

    </div>
</main>


<!-- Tabla -->
<!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white ">
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

    </div> -->


@endsection