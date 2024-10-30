<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
    <table class='table'>
        <tr class="row">
            <th class="cell">Nombre</th>
            <th class="cell">Descripción</th>
            <th class="cell">Cantidad Total</th>
            <th class="cell">Valor Total</th>
            <th class="cell">Categoría</th>
            <th class="cell">Marca</th>
            <th class="cell">Proveedor</th>
            <th class="cell">Inventario</th>
            <th class="cell">Imagen</th>
            <th class="cell">Operaciones</th>
        </tr>
    @foreach ($productos as $producto)
        <tr class="row">
        <td class="cell"> {{ $producto->nombre }}</td>
        <td class="cell"> {{ $producto->descripcion }}</td>
        <td class="cell"> {{ $producto->cantidad_total }}</td>
        <td class="cell"> {{ $producto->valor_total }}</td>
        <td class="cell"> {{ $producto->categoria->nombre }}</td>
        <td class="cell"> {{ $producto->marca->nombre }}</td>
        <td class="cell"> {{ $producto->proveedor->nombre }}</td>
        <td class="cell"> {{ $producto->inventario->nombre }}</td>
        <td class="cell"><img src="{{ asset('images/' . $producto->ruta_imagen) }}" alt="{{ $producto->nombre }}"></td>
        <td class="cell"><a href="{{ route('producto.edit', $producto->id) }}"><button>Editar</button></a>
        <a href="{{ route('producto.delete', $producto->id) }}"><button>Eliminar</button></a></td>
        </tr>
    @endforeach
    </table>
    <a href="{{ route('producto.create') }}"><button>Agregar Producto</button></a>
</body>
</html>
