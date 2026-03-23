@extends('admin.index')


@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">

    <h1 class="text-4xl font-semibold text-neutral-800 pb-5 font-mulish">Informacion de la empresa</h1>

    <div class="gap-7 lg:grid lg:grid-cols-2">

        <form class="flex flex-col gap-3"
            method="POST"
            action="{{ route('admin.siteinfo.update') }}">
            @csrf
            @method('PATCH')

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
                @if($info)
                <h1 class="text-2xl font-bold font-greatVibes mb-2"> {{ $info->localizacion }}</h1>
                <p> {{ $info->telefono }}</p>
                <p> {{ $info->correo }}</p>
                <p> {{ $info->horario }}</p>
                @endif
            </div>
        </div>

    </div>
</main>

@endsection