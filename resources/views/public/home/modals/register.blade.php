<section class="h-screen hidden justify-center items-center bg-black/80 backdrop-blur-sm fixed inset-0 z-30"
  id="contactModal">

  <article class="w-[90vw] h-[85vh] flex bg-white text-neutral-700 rounded-lg overflow-hidden
  lg:max-w-3xl xl:max-w-4xl xl:h-150">

    <img class="w-85 object-cover shrink-0 xl:w-100"
      src="{{ asset('imgs/img-register.webp') }}" alt="img">

    <section class="p-5 flex flex-col justify-center gap-4 text-sm flex-1 overflow-y-auto min-h-0">

      <h1 class="text-xl text-center text-pink-400 font-semibold">Inscríbete y disfruta de beneficios exclusivos.</h1>

      <p class="text-center text-sm">
        Regístrate y disfruta de la maravilla que genera hacer un regalo desde el corazón
      </p>

      <form class="flex flex-col gap-3 font-medium"
        action="{{ route('subcription') }}"
        method="POST">
        @csrf
        
        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 placeholder:text-neutral-500"
          placeholder="Nombre"
          type="text"
          required
          name="name">

        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 placeholder:text-neutral-500"
          placeholder="Apellido"
          type="text"
          required
          name="lastname">

        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300 placeholder:text-neutral-500"
          placeholder="Email"
          type="email"
          required
          name="email">

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
            pattern="[0-9]{9}"
            maxlength="9"
            name="phone"
            required>
        </div>

        <input class="py-2 px-3 rounded-lg border border-neutral-300 focus:outline-pink-300
        placeholder:text-neutral-500"
          placeholder="Distrito"
          type="text"
          name="district"
          required>

        <textarea class="p-3 rounded-lg border border-neutral-300 focus:outline-pink-300 
        placeholder:text-neutral-500 resize-none"
          name="message" 
          placeholder="Mensaje"
          required></textarea>

        <button class="py-2 px-3 rounded-md bg-pink-400 text-white cursor-pointer"
          type="submit">
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

@if (session('success'))
<script>
  window.addEventListener("DOMContentLoaded", () => {
    alert("{{ session('success') }}")

    const modal = document.getElementById("contactModal")
    modal.classList.remove("flex")
    modal.classList.add("hidden")

    sessionStorage.setItem("showContactModal", "false")
  })
</script>
@endif

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