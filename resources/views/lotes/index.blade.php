<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes</title>  
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
    @foreach ($lotes as $lote)
        <p><strong>Número:</strong> {{ $lote->numero }}</p>
        <p><strong>Descripción:</strong> {{ $lote->descripcion }}</p>
        <p><strong>Cantidad Total:</strong> {{ $lote->cantidad_total }}</p>
        <p><strong>Valor Total:</strong> {{ $lote->valor_total }}</p>
        <p><strong>Precio Unitario:</strong> {{ $lote->precio_unitario }}</p>
        <p><strong>Fecha de Ingreso:</strong> {{ $lote->fecha_ingreso }}</p>
        <p><strong>Fecha de Vencimiento:</strong> {{ $lote->fecha_vencimiento }}</p>
        <p><strong>ID del Producto:</strong> {{ $lote->producto_id }}</p>
        <a href="{{ route('lote.edit', $lote->id) }}"><button>Editar</button></a>
        <a href="{{ route('lote.delete', $lote->id) }}"><button>Eliminar</button></a>
    @endforeach
    <a href="{{ route('lote.create') }}"><button>Agregar Lote</button></a>
</body>
</html>
