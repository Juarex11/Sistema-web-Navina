@extends('admin.index')

@section('content')
<div class="px-8 py-7 flex-1 overflow-auto" id="adminProducts">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-medium pb-2">
            Gestión de productos
        </h1>
        <p class="text-gray-400 font-mulish">
            Administra tu catálogo de productos naturales. Puedes agregar, editar y eliminar productos.
        </p>

        <div class="overflow-x-auto">

            <form action="{{ route('products.index') }}" method="GET" class="flex gap-4 pt-3 pb-6">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre o categoría..." class="px-4 py-2 border border-neutral-300 rounded-lg shadow-sm w-full outline-none focus:ring-2 focus:ring-pink-400">
                <button type="submit" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white rounded-lg transition-all">
                    Buscar
                </button>
            </form>

            <div class="rounded-xl overflow-hidden border border-gray-300">
                <table class="w-full text-center">
                    <thead class="text-pink-400 bg-pink-100">
                        <tr>
                            <th class="px-3 py-3">ID</th>
                            <th class="px-3 py-3">Nombre</th>
                            <th class="px-3 py-3">Categoría</th>
                            <th class="px-3 py-3">Estado</th>
                            <th class="px-3 py-3">Precio</th>
                            <th class="px-3 py-3">Stock</th>
                            <th class="px-3 py-3">Dscto</th>
                            <th class="px-3 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($products as $product)
                        <tr>
                            <td class="px-3 py-1">{{ $product->id }}</td>
                            <td class="px-3 py-1">{{ $product->name }}</td>
                            <td class="px-3 py-1">{{ $product->category->name ?? 'Sin categoría' }}</td>
                            <td class="px-3 py-1">{{ $product->status ? 'Disponible' : 'No disponible' }}</td>
                            <td class="px-3 py-1">S/.{{ $product->price }}</td>
                            <td class="px-3 py-1
                                ">{{ $product->stock }}</td>
                            <td class="px-3 py-1">{{ rtrim(rtrim($product->discount, '0'), '.') }}%</td>
                            <td class="px-3 py-1">
                                <div class="flex justify-center items-center gap-2">
                                    <button class="showButton px-3 py-1 text-blue-700 rounded-md text-sm hover:text-blue-900" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-category="{{ $product->category->name ?? 'Sin categoría' }}" data-status="{{ $product->status }}" data-price="{{ $product->price }}" data-discount="{{ $product->discount }}" data-description="{{ $product->description }}" data-benefits="{{ $product->benefits }}" data-images="{{ $product->images->first()->directory ?? '' }}" data-bs-toggle="modal" data-bs-target="#showModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                    <button class="editButton px-3 py-1 text-yellow-500 rounded-md text-sm hover:text-yellow-700" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-category="{{ $product->category->id }}" data-status="{{ $product->status }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}" data-discount="{{ $product->discount }}" data-description="{{ $product->description }}" data-benefits="{{ $product->benefits }}" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 text-red-600 rounded-md text-sm hover:text-red-800" type="submit" onclick="return confirm('¿Desea eliminar este producto?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="py-6 text-center text-gray-500">No hay productos registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 py-4">
            <button class="bg-pink-400 shadow-md hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 transition all text-white rounded-full w-10 h-10 flex items-center justify-center"
            onclick="openModal('createProduct')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>

        @include('admin.admin-products.modals.createProduct')

    </div>
</div>

<script>
    const openModal = (ov) => {

        const overlay = document.querySelector(`#${ov}`)
        const content = overlay.querySelector("form")

        overlay.classList.remove("hidden")
        overlay.classList.add("flex")

        content.addEventListener('click', function(e) {
            e.stopPropagation()
        })

        overlay.addEventListener('click', function() {
            overlay.classList.add('hidden')
        })

    }
</script>

<script>
    document.querySelectorAll(".editButton").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.dataset.id
            const name = this.dataset.name
            const category = this.dataset.category
            const status = this.dataset.status
            const price = this.dataset.price
            const stock = this.dataset.stock
            const discount = this.dataset.discount
            const description = this.dataset.description
            const benefits = this.dataset.benefits
            document.getElementById("editName").value = name
            document.getElementById("editCategory").value = category
            document.getElementById("editStatus").value = status
            document.getElementById("editPrice").value = price
            document.getElementById("editStock").value = stock
            document.getElementById("editDiscount").value = discount
            document.getElementById("editDescription").value = description
            document.getElementById("editBenefits").value = benefits
            document.getElementById("editForm").action =
                `/products/${id}`
        })
    })

    document.querySelectorAll(".showButton").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.dataset.id
            const name = this.dataset.name
            const category = this.dataset.category
            const status = this.dataset.status
            const price = parseFloat(this.dataset.price)
            const discount = parseFloat(this.dataset.discount)
            let finalprice;
            if (discount > 0) {
                finalprice = (price - ((discount / 100) * price)).toFixed(2)
            } else {
                finalprice = price
            }
            const description = this.dataset.description
            const benefits = this.dataset.benefits
            const image = this.dataset.images
            document.getElementById("showName").textContent = name
            document.getElementById("showCategory").textContent = category
            document.getElementById("showStatus").textContent = status == 1 ? "Disponible" : "No disponible"
            document.getElementById("showPrice").textContent = price
            document.getElementById("showFinalPrice").textContent = finalprice
            document.getElementById("showDescription").textContent = description
            document.getElementById("showBenefits").textContent = benefits
            if (image) {
                document.getElementById("showImage").src = "/storage/" + image
            } else {
                document.getElementById("showImage").src = ""
            }
        })
    })
</script>

<script>
    // Preview crear
    const imagesInputCreate = document.getElementById('imagesInputCreate');
    const previewContainerCreate = document.getElementById('previewImagesCreate');

    imagesInputCreate.addEventListener('change', function() {
        previewContainerCreate.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-20', 'h-20', 'object-cover', 'rounded-md', 'border', 'border-gray-300');
                previewContainerCreate.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });

    // Preview editar
    const imagesInputEdit = document.getElementById('imagesInputEdit');
    const previewContainerEdit = document.getElementById('previewImagesEdit');

    imagesInputEdit.addEventListener('change', function() {
        previewContainerEdit.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-20', 'h-20', 'object-cover', 'rounded-md', 'border', 'border-gray-300');
                previewContainerEdit.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });

    // Limpiar al cerrar modal
    const createModal = document.getElementById('createModal');
    createModal.addEventListener('hidden.bs.modal', () => {
        imagesInputCreate.value = '';
        previewContainerCreate.innerHTML = '';
    });

    const editModal = document.getElementById('editModal');
    editModal.addEventListener('hidden.bs.modal', () => {
        imagesInputEdit.value = '';
        previewContainerEdit.innerHTML = '';
    });
</script>
@endsection