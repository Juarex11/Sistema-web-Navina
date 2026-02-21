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
    <title>Listar productos</title>
</head>
<body>
    <style>
    .table-fixed {
        table-layout: fixed;
        width: 100%;
    }
    .text-truncate-custom {
        max-width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    </style>

    <h1 class="text-center mt-3">Lista de productos</h1>
    <a class="text-center btn btn-secondary" href="{{ route('dashboard') }}">Volver</a>
    <a class="text-center btn btn-primary" href="{{ route('products.create') }}">+ Añadir nuevo producto</a>
    <br>
    <div class="container mt-4" style="max-width: 1200px;">
    <table border="2" class="text-center table table-striped table-fixed">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Beneficios</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Stock mínimo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td class="text-truncate-custom" title="{{ $product->description }}">{{ $product->description }}</td>
                <td class="text-truncate-custom" title="{{ $product->benefits }}">{{ $product->benefits }}</td>
                <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                <td>{{ $product->status ? 'Disponible' : 'No disponible' }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->stock_min }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('products.show',$product) }}">Ver</a>
                    <a class="btn btn-warning" href="{{ route('products.edit',$product) }}">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No hay productos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</body>
</html>