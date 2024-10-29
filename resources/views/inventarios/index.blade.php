<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>  
</head>
<body>

    <h1>Inventarios</h1>
    @foreach ($inventarios as $inventario)
        <p><strong>Nombre:</strong> {{ $inventario->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $inventario->descripcion }}</p>
        <p><strong>Cantidad Total:</strong> {{ $inventario->cantidad_total }}</p>
        <p><strong>Valor Total:</strong> {{ $inventario->valor_total }}</p>   
        <img src="{{ asset('images/' . $inventario->ruta_imagen) }}" alt="{{ $inventario->nombre }}">
    @endforeach
    <a href="{{ route('inventario.create') }}"><button>Agregar Inventario</button></a>
</body>
</html>