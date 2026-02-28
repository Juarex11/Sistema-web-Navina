 @extends('dashboard.layout')

 @section('content')
    <h1 class="text-center mt-3">Agregar un nuevo producto</h1>
    <br>

    <div class="container mt-4" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <h3>Información del producto</h3>
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input class="form-control" type="text" name="name" placeholder="Nombre del producto" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea class="form-control" name="description" placeholder="Descripción del producto"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Beneficios:</label>
                    <textarea class="form-control" name="benefits" placeholder="Beneficios del producto"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría:</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">--- Seleccionar ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                        <select class="form-select" name="status">
                            <option value="1">Disponible</option>
                            <option value="0">No disponible</option>
                        </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio: S/.</label>
                    <input class="form-control" type="number" name="price" step="0.01" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock:</label>
                    <input class="form-control" type="number" name="stock" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock mínimo:</label>
                    <input class="form-control" type="number" name="stock_min" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagenes:</label>
                    <input class="form-control" type="file" name="images[]" accept="image/*" multiple>
                </div>
                <div class="actions">
                    <button class="btn btn-primary" type="submit">Guardar producto</button>
                    <button class="btn btn-danger" type="reset">Vaciar datos</button>
                    <a class="btn btn-secondary" href="{{ route('products.index') }}">Volver</a>
                </div>
            </div>
        </div>
    </form>
    </div>
    @endsection