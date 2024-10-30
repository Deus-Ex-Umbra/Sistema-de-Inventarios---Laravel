<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <header>
        <button>
            Inventarios
        </button>
        <button>
            Productos
        </button>
        <button>
            Lotes
        </button>
        <button>
            Proveedores
        </button>
    </header>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @foreach ($productos as $producto)
        <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Cantidad Total:</strong> {{ $producto->cantidad_total }}</p>
        <p><strong>Valor Total:</strong> {{ $producto->valor_total }}</p>
        <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
        <p><strong>Marca:</strong> {{ $producto->marca->nombre }}</p>
        <p><strong>Proveedor:</strong> {{ $producto->proveedor->nombre }}</p>
        <p><strong>Inventario:</strong> {{ $producto->inventario->nombre }}</p>
        <img src="{{ asset('images/' . $producto->ruta_imagen) }}" alt="{{ $producto->nombre }}">
        <a href="{{ route('producto.edit', $producto->id) }}"><button>Editar</button></a>
        <a href="{{ route('producto.delete', $producto->id) }}"><button>Eliminar</button></a>
    @endforeach

    <a href="{{ route('producto.create') }}"><button>Agregar Producto</button></a>
</body>
</html>
