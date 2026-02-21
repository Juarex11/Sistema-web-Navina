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
    <title>Crear categoría</title>
    <style>
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <h1 class="text-center mt-3">Actualizar categoría</h1>
    <br>
    <div class="container mt-4" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update',$category) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3>Detalles de la categoría</h3>
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input class="form-control" type="text" name="name" placeholder="Nombre de la categoría" value="{{ old('name',$category->name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                        <select class="form-select" name="status">
                            <option value="1">Disponible</option>
                            <option value="0">No disponible</option>
                        </select>
                </div>
                <div class="actions">
                    <button class="btn btn-primary" type="submit">Actualizar categoría</button>
                    <button class="btn btn-danger" type="reset">Vaciar datos</button>
                    <a class="btn btn-secondary" href="{{ route('categories.index') }}">Volver</a>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>