@extends('admin.index')

@section('content')

<main class="px-8 py-7 flex flex-col gap-5 flex-1 overflow-y-auto"
  id="servicesView"
  data-services='@json($services)'>

  <header class="flex items-center justify-between ">
    <h1 class="text-4xl font-semibold text-neutral-800 font-mulish">Gestion de Servicios</h1>
    <button class="bg-pink-400 text-white px-4 py-2 rounded-lg cursor-pointer"
      onclick="openModal('createService')">
      Crear Servicio
    </button>
  </header>

  <div class="flex text-sm">
    <input class="py-2 px-3 rounded-s-lg border-1.5 border-neutral-300 outline-pink-300 grow"
      type="text"
      placeholder="Buscar por titulo del servicio"
      id="servicesFilter">

    <div class="p-2 px-4 rounded-e-lg border-1.5 border-neutral-300">
      <i class="bx bx-search"></i>
    </div>
  </div>

  <div class="flex-1">
    <table class="w-full">
      <thead>
        <tr class="bg-pink-50 h-14 rounded-xl text-pink-400 font-semibold">
          <td class="px-4">Titulo</td>
          <td class="px-4">Descripción</td>
          <td class="px-4">Características</td>
          <td class="px-4">Imagen</td>
          <td class="px-4">Accciones</td>
        </tr>
      </thead>

      <tbody class="text-sm"
        id="servicesTable">

        @if($services->count() > 0)

        @foreach($services as $service)
        <tr class="h-28 text-neutral-600 font-medium border-y border-neutral-200">
          <td class="px-4">{{ $service->title }}</td>
          <td class="px-4">
            <p class="line-clamp-3">
              {{ $service->description }}
            </p>
          </td>

          <td class="px-4">
            @if(!empty($service->features))
            @foreach($service->features as $feature)

            <p class="flex gap-2 items-center">
              <i class="bx bx-check"></i>
              {{ $feature }}
            </p>

            @endforeach
            @endif
          </td>

          <td class="px-4">
            @if($service->image)
            <img class="w-20 max-h-16 rounded-lg object-cover"
              src="{{ asset('storage/' . $service->image) }}">
            @else
            <span class="text-neutral-700 font-semibold">No Image</span>
            @endif
          </td>

          <td class="px-4">

            <div class="flex gap-3">
              <button class="p-1.5 rounded-lg bg-green-100"
                type="button"
                onclick="openModal('updateService-{{ $service->id }}')">
                <i class="bx bx-pencil text-green-400"></i>
              </button>

              @include('admin.services.modals.updateService')

              <button class="p-1.5 rounded-lg bg-red-100"
                type="button"
                onclick="openModal('deleteService-{{ $service->id }}')">
                <i class="bx bx-trash-alt text-red-400"></i>
              </button>

              @include('admin.services.modals.deleteService')
            </div>

          </td>

        </tr>
        @endforeach

        @else

        <tr>
          <td class="h-20 text-neutral-600 text-lg font-semibold text-center"
            colspan="5">
            No hay servicios
          </td>
        </tr>

        @endif

      </tbody>
    </table>
  </div>

  @include('admin.services.modals.createService')

</main>

<script>
  function openModal(ov) {

    const overlay = document.getElementById(ov)
    const content = overlay.querySelector("form")

    overlay.classList.remove('hidden')
    overlay.classList.add('flex')

    content.addEventListener('click', function(event) {
      event.stopPropagation()
    })

    overlay.addEventListener('click', function() {
      overlay.classList.add('hidden')
    })

  }

  
  const filterInput = document.getElementById("servicesFilter")
  const tableBody = document.getElementById("servicesTable")

  filterInput.addEventListener("input", function() {
    const value = this.value.toLowerCase().trim()

    const rows = tableBody.querySelectorAll("tr")
    
    rows.forEach(row => {
      
      const titleCell = row.querySelector("td")

      if (!titleCell) return

      const title = titleCell.innerText.toLowerCase()

      if (title.includes(value)) {
        row.classList.remove("hidden")
      } else {
        row.classList.add("hidden")
      }

    })
  })


  const featuresOptions = ["Rápido", "Efectivo", "Duradero", "Natural"]
  const services = JSON.parse(document.getElementById("servicesView").dataset.services)

  services.map(el => {

    const updateServiceModal = document.getElementById(`updateService-${el.id}`)

    // Image Preview

    const dropZone = updateServiceModal.querySelector("#dropZone")
    const fileInput = updateServiceModal.querySelector("#imageInput")
    const previewImage = updateServiceModal.querySelector("#previewImage")
    const previewContainer = updateServiceModal.querySelector("#previewContainer")

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

    // Features Options

    const dropdown = updateServiceModal.querySelector("#dropdown")
    const chipsContainer = updateServiceModal.querySelector("#chips")
    const searchInput = updateServiceModal.querySelector("#searchInput")
    const selectBox = updateServiceModal.querySelector("#selectBox")

    let selected = []

    if (el.features) {
      selected = [...el.features]
      updateServiceModal.querySelector("#featuresInput").value = JSON.stringify(selected)
    }

    let isOpen = false

    selectBox.addEventListener("click", (e) => {
      e.stopPropagation()

      isOpen = !isOpen
      dropdown.classList.toggle("hidden", !isOpen)
    })

    dropdown.addEventListener("click", (e) => {
      e.stopPropagation()
    })

    renderChips()


    function renderDropdown(filter = "") {
      dropdown.innerHTML = ""

      featuresOptions
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

      updateServiceModal.querySelector("#featuresInput").value = JSON.stringify(selected)

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
            <button class="text-gray-500 hover:text-black"
              type="button">
              &times;
            </button>
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

  })
</script>

@endsection