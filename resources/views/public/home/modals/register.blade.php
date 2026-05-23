<section class="hidden fixed inset-0 z-30 bg-black/80 backdrop-blur-sm 
justify-center items-center p-3 sm:p-5"
  id="contactModal">

  <article class="w-full max-w-md lg:max-w-3xl xl:max-w-4xl 
  max-h-[92vh] bg-white text-neutral-700 rounded-xl overflow-hidden
  flex flex-col lg:flex-row shadow-2xl">

    <img class="hidden lg:block lg:w-85 xl:w-100 object-cover shrink-0"
      src="{{ asset('imgs/img-register.webp') }}" alt="img">

    <section class="p-4 sm:p-6 flex flex-col gap-4 text-sm flex-1 overflow-y-auto">

      <h1 class="text-lg sm:text-xl text-center text-pink-400 font-semibold leading-tight">
        Inscríbete y disfruta de beneficios exclusivos.
      </h1>

      <p class="text-center text-xs sm:text-sm text-neutral-600 leading-relaxed">
        Regístrate y disfruta de la maravilla que genera hacer un regalo desde el corazón
      </p>

      <form class="flex flex-col gap-3 font-medium"
        action="{{ route('subcription') }}"
        method="POST">
        @csrf
        
        <input class="py-2.5 px-3 rounded-lg border border-neutral-300 
        focus:outline-pink-300 placeholder:text-neutral-500 text-sm sm:text-base"
          placeholder="Nombre"
          type="text"
          required
          name="name">

        <input class="py-2.5 px-3 rounded-lg border border-neutral-300 
        focus:outline-pink-300 placeholder:text-neutral-500 text-sm sm:text-base"
          placeholder="Apellido"
          type="text"
          required
          name="lastname">

        <input class="py-2.5 px-3 rounded-lg border border-neutral-300 
        focus:outline-pink-300 placeholder:text-neutral-500 text-sm sm:text-base"
          placeholder="Email"
          type="email"
          required
          name="email">

        <div class="flex gap-2 sm:gap-3">

          <div class="min-w-20 sm:min-w-24 p-2 flex gap-2 items-center 
          justify-center rounded-lg border border-neutral-300 text-sm">

            <svg width="20" height="15" viewBox="0 0 20 15">
              <rect x="6" y="0" width="8" height="15" fill="white"></rect>
              <rect x="0" y="0" width="6" height="15" fill="#D91023"></rect>
              <rect x="14" y="0" width="6" height="15" fill="#D91023"></rect>
            </svg>

            <span>+51</span>

          </div>

          <input class="py-2.5 px-3 rounded-lg border border-neutral-300 
          focus:outline-pink-300 flex-1 placeholder:text-neutral-500
          text-sm sm:text-base"
            placeholder="Telefono (9 digitos)"
            type="text"
            pattern="[0-9]{9}"
            maxlength="9"
            name="phone"
            required>

        </div>

        <input class="py-2.5 px-3 rounded-lg border border-neutral-300 
        focus:outline-pink-300 placeholder:text-neutral-500
        text-sm sm:text-base"
          placeholder="Distrito"
          type="text"
          name="district"
          required>

        <textarea class="p-3 rounded-lg border border-neutral-300 
        focus:outline-pink-300 placeholder:text-neutral-500 
        resize-none min-h-28 text-sm sm:text-base"
          name="message" 
          placeholder="Mensaje"
          required></textarea>

        <button class="py-2.5 px-3 rounded-md bg-pink-400 text-white 
        cursor-pointer hover:bg-pink-500 transition text-sm sm:text-base"
          type="submit">
          Enviar
        </button>

        <p class="text-[11px] sm:text-xs text-center leading-relaxed text-neutral-500">
          Al registrarte, aceptas recibir correos electrónicos de marketing.
          Consulta nuestra
          <span class="text-pink-400">política de privacidad</span>
          para obtener más información.
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