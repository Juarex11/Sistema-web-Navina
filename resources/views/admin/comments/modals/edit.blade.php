<dialog id="edit{{ $comment->id }}"
  class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2 
                            -translate-x-1/2 -translate-y-1/2 w-full max-w-3xl ">
  <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h3 class="text-lg mb-4 font-bold"> Editar comentario</h3>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <div>
          <p>Cliente</p>
          <input type="text"
            name="client"
            value="{{ $comment->client }}"
            class=" w-full p-2 rounded-xl border border-gray-400 mb-4">
        </div>

        <div>
          <p>Comentario</p>
          <textarea name="commentary"
            class=" w-full p-2 rounded-xl border border-gray-400 mb-4">{{ $comment->commentary }}</textarea>
        </div>
      </div>

      <div>
        <p>Foto</p>
        @if($comment->photo)
        <div class="mb-4 flex justify-center">
          <div class="relative inline-block group">
            <img src="{{ asset('storage/' . $comment->photo) }}"
              class="w-48 aspect-square object-cover rounded-lg shadow">

            <button type="submit"
              name="delete_photo"
              value="1"
              class="absolute top-2 right-2 border border-gray-500 opacity-0 group-hover:opacity-100 bg-white transition rounded p-1 shadow">
              <img src="{{ asset('images/delete_black.svg')}}">
            </button>
          </div>
        </div>
        @endif
        <div>
          <input type="file"
            name="photo"
            class=" p-2 w-full mb-3 boder border-gray-400">
        </div>
      </div>

      <div>
        <p>Calificación</p>
        <input name="calification"
          value="{{ $comment->calification }}"
          class=" w-full p-2 rounded-xl border border-gray-400 mb-4"
          type="number" min="0" max="5">
      </div>

      <div>
        <p>Fecha</p>
        <input name="date"
          value="{{ $comment->date }}"
          class=" p-2 rounded-xl border border-gray-400 mb-4"
          type="date">
      </div>
    </div>


    <div class="flex justify-end gap-2">
      <button type="button"
        onclick="this.closest('dialog').close()"
        class="px-3 py-1  rounded-xl border border-gray-400">
        Cancelar
      </button>

      <button type="submit"
        class="bg-pink-400 text-white px-3 py-1  rounded-xl">
        Guardar Cambios
      </button>
    </div>
  </form>
</dialog>