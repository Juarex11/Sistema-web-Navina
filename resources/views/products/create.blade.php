<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <title>Crear producto</title>
    <style>
        .form-container {
            width: 500px;
            margin: 0 auto;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 16px;
        }
    </style>
</head>
<body>
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
</body>
</html>