<dialog id="createComment"
  class="p-8 rounded-xl shadow-xl fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-3xl">

  <form method="POST"
    action="{{ route('admin.comments.store') }}"
    enctype="multipart/form-data">

    @csrf

    <h3 class="text-lg mb-4 font-bold">Nuevo comentario</h3>

    <div class="grid grid-cols-2 gap-4">

      <div>
        <div>
          <p>Cliente</p>
          <input
            name="client"
            required
            placeholder="Introduce el nombre del cliente"
            class=" w-full p-2 rounded-xl border border-gray-400 mb-4">
        </div>

        <div>
          <p>Comentario</p>
          <textarea name="commentary"
            required
            placeholder="Deja aqui tu comentario"
            class=" w-full p-2 rounded-xl border border-gray-400 mb-4"></textarea>
        </div>
      </div>

      <div>
        <p>Foto</p>
        <input type="file"
          name="photo"
          class=" p-2 w-full mb-3">
      </div>

      <div>
        <p>Calificación</p>
        <input name="calification"
          required
          placeholder="califica del 1 al 10"
          class=" w-full p-2 rounded-xl border border-gray-400 mb-4"
          type="number"
          min="0" max="10">
      </div>

      <div>
        <p>Fecha</p>
        <input type="date"
          name="date"
          required
          class=" p-2 rounded-xl border border-gray-400 mb-4">
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
        Crear comentario
      </button>
    </div>

  </form>
</dialog>