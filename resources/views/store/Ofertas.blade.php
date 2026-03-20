@extends('home')

@section('titulo','Ofertas')

@section('contenidoPagina')
<div>
    <div class="text-center">
        <h1 class=" text-pink-400 text-5xl md:mb-3">Promociones Especiales</h1>
        <div class="w-28 h-1 bg-pink-400 mx-auto mt-6 rounded"></div>
        <br>
    </div>

    <div>
        @php
            $total = 9; 
            $pages = ceil($total / 6);
        @endphp

        <div 
        x-data="{ page: 0 }"
        class="max-w-6xl mx-auto mb-16">

            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500"
                    :style="'transform: translateX(-' + (page * 100) + '%)'">

                    @for ($p = 0; $p < $pages; $p++)
                        <div class="min-w-full flex justify-center">

                            <div class="flex flex-wrap justify-center gap-4 w-full">

                                @for ($i = 0; $i < 6; $i++)
                                    @php
                                        $index = $p * 6 + $i;
                                    @endphp

                                    @if ($index < $total)
                                        <div class="w-[360px]">

                                            <!-- CARD MOCK -->
                                            <x-oferta-frame></x-oferta-frame>

                                        </div>
                                    @endif
                                @endfor

                            </div>

                        </div>
                    @endfor

                </div>
            </div>

            <!-- PAGINACIÓN -->
            <div class="flex justify-center gap-3 mt-6">
                @for ($i = 0; $i < $pages; $i++)
                    <button
                        @click="page = {{ $i }}"
                        class="w-3 h-3 rounded-full transition"
                        :class="page === {{ $i }}
                            ? 'bg-pink-400 scale-110'
                            : 'bg-gray-400'">
                    </button>
                @endfor
            </div>

        </div>
    </div>
</div>

@endsection