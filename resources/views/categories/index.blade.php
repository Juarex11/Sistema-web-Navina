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
    <title>Listar categorías</title>
</head>
<body>
    <h1 class="text-center mt-3">Lista de categorías</h1>
    <a class="text-center btn btn-secondary" href="{{ route('dashboard') }}">Volver</a>
    <a class="text-center btn btn-primary" href="{{ route('categories.create') }}">+ Añadir nueva categoría</a>
    <br>
    <div class="container mt-4" style="max-width: 1000px;">
    <table class="text-center table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status ? 'Disponible' : 'No disponible' }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('categories.edit',$category) }}">Editar</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No hay categorías registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</body>
</html>