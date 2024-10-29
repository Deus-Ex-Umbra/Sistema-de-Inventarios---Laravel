<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>  
</head>
<body>
    <header>
        <button>
            Inventarios
        </button>
        <button>
            Productos
        </button>
        <a href="{{ route('lotes.index') }}"><button>Lotes</button></a>
        <button>
            Proveeedores
        </button>
    </header>
    @foreach ($inventarios as $inventario)
        <p><strong>Nombre:</strong> {{ $inventario->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $inventario->descripcion }}</p>
        <p><strong>Cantidad Total:</strong> {{ $inventario->cantidad_total }}</p>
        <p><strong>Valor Total:</strong> {{ $inventario->valor_total }}</p>   
        <img src="{{ asset('images/' . $inventario->ruta_imagen) }}" alt="{{ $inventario->nombre }}">
        <a href="{{ route('inventario.edit', $inventario->id) }}"><button>Editar</button></a>
        <a href="{{ route('inventario.delete', $inventario->id) }}"><button>Eliminar</button></a>
    @endforeach
    <a href="{{ route('inventario.create') }}"><button>Agregar Inventario</button></a>
</body>
</html>