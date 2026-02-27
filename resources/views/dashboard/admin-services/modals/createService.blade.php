<div class="fixed inset-0 bg-black/50 hidden items-center justify-center backdrop-blur-xs"
  id="createService">

  <form class="w-[65vw] max-h-[90vh] max-w-228 bg-white p-6 grid grid-cols-2 gap-6 rounded-lg"
    action="{{ route('service.create') }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf

    <header class="flex justify-between col-span-2">
      <h1 class="text-neutral-900 font-semibold text-lg">Nuevo Servicio</h1>
      <button class="w-max py-2 px-4 rounded-lg bg-sky-400 text-white cursor-pointer hover:opacity-60"
        type="submit">
        Crear Servicio
      </button>
    </header>

    <article class="flex flex-col gap-3">

      <div class="flex items-center gap-2">
        <i class="bx bx-asterisk text-red-400"></i>
        <label for="">Titulo</label>
      </div>

      <input class="py-2 px-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        type="text"
        name="title"
        placeholder="Ingrese el titulo del servicio">

      <div class="flex items-center gap-2">
        <i class="bx bx-asterisk text-red-400"></i>
        <label for="">Características</label>
      </div>

      <div class="relative">
        <div class="min-h-12 p-2 text-sm rounded-lg border-1.5 border-neutral-300 flex gap-2 items-center cursor-text
          overflow-x-auto shadow-md"
          id="selectBox">

          <div id="chips" class="flex gap-2"></div>

          <input id="searchInput"
            type="text"
            class="flex-1 outline-none min-w-20 h-0"
            placeholder="">

        </div>

        <div class="absolute w-full mt-2 bg-neutral-100 rounded-lg shadow-md hidden z-50 overflow-hidden"
          id="dropdown"></div>

        <input type="hidden" name="features" id="featuresInput">
      </div>

      <div class="flex items-center gap-2">
        <i class="bx bx-asterisk text-red-400"></i>
        <label for="">Descripcion</label>
      </div>

      <textarea class="h-20 p-3 rounded-lg border-1.5 border-neutral-300 outline-pink-300 shadow-md"
        name="description"
        placeholder="Escribe una breve descripcion"
        required></textarea>
    </article>



    <article class="flex flex-col gap-3">
      <label for="">Imagen</label>

      <div class="p-5 rounded-lg border-1.5 border-sky-300 bg-sky-50 text-center shadow-md cursor-pointer"
        id="dropZone">

        <input type="file"
          name="image"
          id="imageInput"
          class="hidden"
          accept="image/*">

        <div class="flex flex-col gap-2">
          <i class="bx bx-arrow-to-top text-neutral-300 text-3xl"></i>
          Arrastra tu imagen aquí o haz clic para seleccionar
        </div>
      </div>

      <div class="p-3 rounded-lg border-1.5 border-yellow-200 bg-yellow-100 hidden overflow-y-auto"
        id="previewContainer">
        <img id="previewImage" class="w-32 rounded">
      </div>
    </article>
  </form>
</div>


<script>
  const createServiceModal = document.getElementById("createService")
  const dropZone = createServiceModal.querySelector("#dropZone")
  const fileInput = createServiceModal.querySelector("#imageInput")
  const previewImage = createServiceModal.querySelector("#previewImage")
  const previewContainer = createServiceModal.querySelector("#previewContainer")

  dropZone.addEventListener("click", () => {
    fileInput.click();
  });

  dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  dropZone.addEventListener("drop", (e) => {
    e.preventDefault();

    const files = e.dataTransfer.files;
    if (files.length > 0) {
      fileInput.files = files;
      showPreview(files[0]);
    }
  });

  fileInput.addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (!file) return;

    showPreview(file);
  });

  function showPreview(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      previewImage.src = e.target.result;
      previewContainer.classList.remove("hidden");
    };
    reader.readAsDataURL(file);
  }
</script>


<script>
  const options = ["Rápido", "Efectivo", "Duradero", "Natural"]

  const dropdown = createServiceModal.querySelector("#dropdown")
  const chipsContainer = createServiceModal.querySelector("#chips")
  const searchInput = createServiceModal.querySelector("#searchInput")
  const selectBox = createServiceModal.querySelector("#selectBox")

  let selected = []
  let isOpen = false

  selectBox.addEventListener("click", (e) => {
    e.stopPropagation()

    isOpen = !isOpen
    dropdown.classList.toggle("hidden", !isOpen)
  })

  dropdown.addEventListener("click", (e) => {
    e.stopPropagation()
  })

  function renderDropdown(filter = "") {
    dropdown.innerHTML = ""

    options
      .filter(option => option.toLowerCase().includes(filter.toLowerCase()))
      .forEach(option => {
        const item = document.createElement("div")
        item.className = "flex justify-between items-center px-4 py-2 hover:bg-neutral-200 cursor-pointer"

        item.innerHTML = `
                <span>${option}</span>
                ${selected.includes(option) ? "✅" : ""}
            `

        item.onclick = () => toggleOption(option)
        dropdown.appendChild(item)
      })
  }

  function toggleOption(option) {
    if (selected.includes(option)) {
      selected = selected.filter(o => o !== option)
    } else {
      selected.push(option)
    }

    createServiceModal.querySelector("#featuresInput").value = JSON.stringify(selected)

    renderChips()
    renderDropdown(searchInput.value)
  }

  function renderChips() {
    chipsContainer.innerHTML = ""

    selected.forEach(option => {
      const chip = document.createElement("div")
      chip.className = "bg-gray-200 px-3 py-1 rounded-md flex items-center gap-2"

      chip.innerHTML = `
            <span>${option}</span>
            <button class="text-gray-500 hover:text-black">&times;</button>
        `

      chip.querySelector("button").onclick = (e) => {
        e.stopPropagation()
        toggleOption(option)
      }

      chipsContainer.appendChild(chip)
    })
  }

  searchInput.addEventListener("input", (e) => {
    renderDropdown(e.target.value)
  })

  renderDropdown()
</script>