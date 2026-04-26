<div class="bg-white w-[360px] min-h-[220px] rounded-xl p-3 relative overflow-hidden z-0">

    <div class="flex items-center gap-3 relative z-10">
        <img src="{{ $comment->photo 
            ? asset('storage/' . $comment->photo) 
            : asset('images/Navina_logo.webp') }}"
        class="h-15 w-15 rounded-full object-cover">

        <div class="flex flex-col">
            <p class="font-bold truncate">{{ $comment->client }}</p>
            @php
                $fullStars = floor($comment->calification / 2);
                $halfStar = $comment->calification % 2;
            @endphp
            <p class="text-pink-400 font-bold">
                @for ($i = 0; $i < $fullStars; $i++)
                ★
                @endfor

                @if ($halfStar)
                ☆
                @endif
            </p>
        </div>
    </div>


    <div class="absolute bottom-0 left-0 w-full h-[145px] bg-cover bg-center opacity-50 "
        style="background-image: url('{{ asset('images/bg_comment.jpg') }}');"> {{-- Apesar de marcar error, es solo visual, el codigo funciona --}}
    </div>


    <div class="absolute top-20 left-4 right-4 bg-white rounded-lg px-4 py-2 shadow-md ">

        <p class="text-sm line-clamp-3 break-words">
            {{ $comment->commentary  }}
        </p>
    </div>
</div>