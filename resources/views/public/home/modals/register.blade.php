<section class="h-screen hidden justify-center items-center bg-black/80 backdrop-blur-sm fixed inset-0 z-30"
  id="contactModal">

  <article class="w-[90vw] h-[85vh] flex bg-white text-neutral-700 rounded-lg overflow-hidden
  lg:max-w-3xl xl:h-150">

    <img class="w-85 object-cover shrink-0"
      src="{{ asset('imgs/img-register.webp') }}" alt="img">

    <section class="p-5 flex flex-col gap-4 text-sm flex-1 overflow-y-auto min-h-0">

      <h1 class="text-xl text-center text-pink-400 font-semibold">Inscríbete y disfruta de beneficios exclusivos.</h1>

      <p class="text-center text-sm">
        Regístrate y disfruta de la maravilla que genera hacer un regalo desde el corazón
      </p>

      <form class="flex flex-col gap-3 font-medium">
        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 placeholder:text-neutral-500"
          placeholder="Nombre"
          type="text">

        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 placeholder:text-neutral-500"
          placeholder="Apellido"
          type="text">

        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 placeholder:text-neutral-500"
          placeholder="Email"
          type="text">

        <div class="flex gap-3">
          <div class="p-2 flex gap-2 items-center rounded-lg border border-neutral-300">
            <svg width="20" height="15" viewBox="0 0 20 15">
              <rect x="6" y="0" width="8" height="15" fill="white"></rect>
              <rect x="0" y="0" width="6" height="15" fill="#D91023"></rect>
              <rect x="14" y="0" width="6" height="15" fill="#D91023"></rect>
            </svg>
            <span>+51</span>
          </div>

          <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 flex-1 
          placeholder:text-neutral-500"
            placeholder="Telefono (9 digitos)"
            type="text"
            pattern="[0-9]{8}"
            maxlength="9">
        </div>

        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300
        placeholder:text-neutral-500"
          placeholder="Distrito"
          type="text">

        <textarea class="p-3 rounded-lg border border-neutral-300 focus:outline-pink-300 
        placeholder:text-neutral-500 resize-none"
          name="" id="" placeholder="Mensaje"></textarea>

        <button class="py-2 px-3 rounded-md bg-pink-400 text-white cursor-pointer">
          Enviar
        </button>

        <p class="text-xs text-center">
          Al registrarte, aceptas recibir correos electrónicos de marketing. Consulta nuestra
          <span class="text-pink-400">política de privacidad</span> para obtener más información.
        </p>

      </form>

    </section>

  </article>

</section>


<script>
  window.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("contactModal")
    const form = modal.querySelector("article")

    const showContacModal = sessionStorage.getItem("showContactModal")
    if (!showContacModal) sessionStorage.setItem("showContactModal", "true")

    if (showContacModal != "false") {

      modal.classList.remove("hidden")
      modal.classList.add("flex")

    } else {

      modal.classList.remove("flex")
      modal.classList.add("hidden")

    }

    modal.addEventListener("click", () => {
      modal.classList.remove("flex")
      modal.classList.add("hidden")

      sessionStorage.setItem("showContactModal", "false")
    })


    form.addEventListener("click", (e) => {
      e.stopPropagation()
    })


  })
</script>