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
    <title>Ver producto</title>
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body" style="margin-left: 5%; margin-right: 5%;">
                <h1 class="text-center">Ver detalles del producto</h1>
                <a class="text-center btn btn-secondary" href="{{ route('products.index') }}">Volver</a>
                <hr>
                <h3>Información del producto</h3>
                
                <div class="row">
                    <div class="col-md-6">
                        @forelse ($product->images as $image)
                            <img src="{{ asset('storage/'.$image->directory) }}" class="img-fluid" style="width: auto; height: 520px">
                        @empty
                            <label>No hay Imágenes disponibles.</label>
                        @endforelse
                    </div>
                    <div class="col-md-6">
                        <h1 style="padding-bottom: 8px;">{{ old('name',$product->name) }}</h1>
                        <h5>DESCRIPCIÓN:</h5>
                            <label style="padding-bottom: 12px;">{{ old('description',$product->description) }}</label>
                        <h5 >BENEFICIOS:</h5>
                            <label style="padding-bottom: 12px;">{{ old('benefits',$product->benefits) }}</label>
                        <h5>ESTADO:</h5>
                            <label style="padding-bottom: 12px;">{{ $product->status ? 'Disponible' : 'No disponible'}}</label>
                        <h5>PRECIO:</h5>
                            <label style="padding-bottom: 12px;">{{ old('price',$product->price) }}</label>
                        <h5>CATEGORÍA:</h5>
                            <label style="padding-bottom: 12px;">{{ $product->category->name ?? 'Sin categoría' }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>