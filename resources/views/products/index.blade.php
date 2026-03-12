@extends('dashboard.layout')

@section('content')
    <div class="flex-1 overflow-auto px-6 py-7">
        <div class="max-w-6xl mx-auto">
            <h1 class="!text-5xl !font-semibold !font-vibes pb-2">
                Gestión de productos
            </h1>
            <p class="text-gray-400 font-mulish">
                Administra tu catálogo de productos naturales. Puedes agregar, editar y eliminar productos.
            </p>

            
            <div class="overflow-x-auto">

                <form action="{{ route('products.index') }}" method="GET" class="mb-4 flex gap-2 py-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre o categoría..." class="px-4 py-2 border rounded-lg shadow-sm w-full focus:outline-none focus:ring-2 focus:ring-pink-400">
                        <button type="submit" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 text-white !rounded-lg transition-all">
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
                                @if($product->stock > 20)
                                 bg-green-600 text-white
                                @elseif($product->stock > 10)
                                 bg-yellow-500 text-black
                                @else
                                 bg-red-600 text-white
                                @endif
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
                    {{-- Edit modal --}}
                        <div class="modal fade" id="editModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="flex justify-end">
                                            <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" id="editForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-2 gap-6">
                                            {{-- Columna izquierda --}}
                                            <div class=" overflow-hidden">
                                                <h5 class="modal-title text-3x1 font-bold">
                                                    Editar producto
                                                </h5>
                                                <p class="text-gray-400 pb-2">
                                                    Modifica los detalles del producto.
                                                </p>
                                                    
                                                <div class="mb-1">
                                                    <label class="block mb-1 font-medium text-gray-700">
                                                        Nombre:
                                                    </label>
                                                    <input id="editName" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre del producto" required>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="block mb-1 font-medium text-gray-700">
                                                        Categoría:
                                                    </label>
                                                    <select id="editCategory" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id" required>
                                                        <option value="">--- Seleccionar ---</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="block mb-1 font-medium text-gray-700">
                                                        Estado:
                                                    </label>
                                                    <select id="editStatus" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                                                        <option value="1">Disponible</option>
                                                        <option value="0">No disponible</option>
                                                    </select>
                                                </div>
                                                <div class="grid grid-cols-3 gap-4 mb-1">
                                                    <div>
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Precio: S/.
                                                        </label>
                                                        <input id="editPrice" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="price" step="0.01" min="0" required>
                                                    </div>
                                                    <div>
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Stock:
                                                        </label>
                                                        <input id="editStock" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="stock" min="0" required>
                                                    </div>
                                                    <div>
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Descuento:
                                                        </label>
                                                        <input id="editDiscount" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="discount" step="0.01" min="0" max="100" required>
                                                    </div>
                                                        
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Descripción:
                                                        </label>
                                                        <textarea id="editDescription" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="description" placeholder="Descripción del producto"></textarea>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Beneficios:
                                                        </label>
                                                        <textarea id="editBenefits" class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="benefits" placeholder="Beneficios del producto"></textarea>
                                                    </div>
                                                </div>
                                                {{-- Columna derecha --}}
                                                <div class="overflow-hidden">
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Imagenes:
                                                        </label>
                                                        <input id="imagesInputEdit" class="min-w-full px-3 py-1 rounded-lg border border-gray-400 bg-gray-100 hover:bg-gray-300 transition-all file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-black" type="file" name="images[]" accept="image/*" multiple>
                                                        <div id="previewImagesEdit" class="flex flex-wrap gap-2 mt-2"></div>
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                                                            Editar Producto
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end Edit modal --}} 
                </div>
            </div>

            <div class="flex justify-end gap-3 mb-6 py-4 mx-14">
                <button class="bg-pink-400 shadow-md hover:bg-pink-500 hover:shadow-lg hover:-translate-y-1 transition all text-white !rounded-full w-10 h-10 flex items-center justify-center" data-bs-toggle="modal" data-bs-target="#createModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            {{-- Create modal --}}
                            <div class="modal fade" id="createModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <div class="flex justify-end">
                                                <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid grid-cols-2 gap-6">
                                                {{-- Columna izquierda --}}
                                                <div class=" overflow-hidden">
                                                    <h5 class="modal-title text-3x1 font-bold">
                                                        Añadir producto
                                                    </h5>
                                                    <p class="text-gray-400 pb-2">
                                                        Agrega los datos del producto.
                                                    </p>
                                                    
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Nombre:
                                                        </label>
                                                        <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre del producto" required>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Categoría:
                                                        </label>
                                                        <select class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id" required>
                                                            <option value="">--- Seleccionar ---</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Estado:
                                                        </label>
                                                        <select class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="status">
                                                            <option value="1">Disponible</option>
                                                            <option value="0">No disponible</option>
                                                        </select>
                                                    </div>
                                                    <div class="grid grid-cols-3 gap-4 mb-1">
                                                        <div>
                                                            <label class="block mb-1 font-medium text-gray-700">
                                                                Precio: S/.
                                                            </label>
                                                            <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="price" step="0.01" min="0" required>
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1 font-medium text-gray-700">
                                                                Stock:
                                                            </label>
                                                            <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="stock" min="0" required>
                                                        </div>
                                                        <div>
                                                            <label class="block mb-1 font-medium text-gray-700">
                                                                Descuento:
                                                            </label>
                                                            <input class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="number" name="discount" step="0.01" min="0" max="100" required>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Descripción:
                                                        </label>
                                                        <textarea class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="description" placeholder="Descripción del producto"></textarea>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Beneficios:
                                                        </label>
                                                        <textarea class="w-full px-3 py-1 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="benefits" placeholder="Beneficios del producto"></textarea>
                                                    </div>
                                                </div>
                                                {{-- Columna derecha --}}
                                                <div class="overflow-hidden">
                                                    <div class="mb-1">
                                                        <label class="block mb-1 font-medium text-gray-700">
                                                            Imagenes:
                                                        </label>
                                                        <input id="imagesInputCreate" class="min-w-full px-3 py-1 rounded-lg border border-gray-400 bg-gray-100 hover:bg-gray-300 transition-all file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-black" type="file" name="images[]" accept="image/*" multiple>
                                                        <div id="previewImagesCreate" class="flex flex-wrap gap-2 mt-2"></div>
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 gap-3 mb-6 py-2 px-4 mx-12 transition-all rounded-md">
                                                            Añadir Producto
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            </form>
                                            
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end Create modal --}}  

                            {{-- Show modal --}}
                            <div class="modal fade" id="showModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="flex justify-end">
                                                <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-0.5">
                                                {{-- IMÁGENES --}}
                                                <div class="col-auto" style="margin-left: 5%;margin-right: 5%">
                                                <img
                                                    id="showImage"
                                                    class="object-contain rounded-xl border border-gray-200 bg-gray-50"
                                                    style="max-height: 520px; max-width: 383.6;">
                                                </div>
                                                {{-- INFO --}}
                                                <div>
                                                    <h1 id="showName" class="mb-1 !text-3xl !font-extrabold !text-gray-600 !font-mulish"></h1>
                                                    <div class="mb-1">
                                                        <h5 class="!font-bold !text-pink-500 !font-mulish">DESCRIPCIÓN:</h5>
                                                        <p id="showDescription"></p>
                                                    </div>
                                                    <div class="mb-1">
                                                        <h5 class="!font-bold !text-pink-500 !font-mulish">BENEFICIOS:</h5>
                                                        <p  style="white-space: pre-line;" id="showBenefits"></p>
                                                    </div>
                                                    <div class="mb-1">
                                                        <h5 class="!font-bold !text-pink-500 !font-mulish">ESTADO:</h5>
                                                        <div class="flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                        </svg>
                                                        <p class="!font-bold" id="showStatus"></p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <h5 class="!font-bold !text-pink-500 !font-mulish">CATEGORÍA:</h5>
                                                        <p class="!font-bold" id="showCategory"></p>
                                                    </div>
                                                    <div class="mb-1 grid grid-cols-2">
                                                        <div class="flex">
                                                            <p class="font-extrabold text-pink-500 font-mulish">S/.</p>
                                                            <p id="showFinalPrice" class="font-extrabold text-pink-500 font-mulish px-2"></p>
                                                            <s class="!text-sm font-extrabold text-gray-300 font-mulish line-through ml-2">S/.</s>
                                                            <s id="showPrice" class="!text-sm font-extrabold text-gray-300 font-mulish line-through ml-2"></s>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            {{-- end Show modal --}}     
            </div>
        </div>
    </div>
    <script>
    document.querySelectorAll(".editButton").forEach(button => {
    button.addEventListener("click", function(){
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
    button.addEventListener("click", function(){
        const id = this.dataset.id
        const name = this.dataset.name
        const category = this.dataset.category
        const status = this.dataset.status
        const price = parseFloat(this.dataset.price)
        const discount = parseFloat(this.dataset.discount)
        let finalprice;
        if (discount > 0){
            finalprice = (price - ((discount/100) * price)).toFixed(2)
        }else{
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
        if(image){
        document.getElementById("showImage").src = "/storage/" + image
        }else{
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