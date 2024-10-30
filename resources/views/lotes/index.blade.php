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
    <table class="table">
        <tr class="row">
            <th class="cell">Número</th>
            <th class="cell">Descripción</th>
            <th class="cell">Cantidad Total</th>
            <th class="cell">Valor Total</th>
            <th class="cell">Precio Unitario</th>
            <th class="cell">Fecha de Ingreso</th>
            <th class="cell">Fecha de Vencimiento</th>
            <th class="cell">Producto</th>
            <th class="cell">Operaciones</th>
        </tr>
    </table>
    @foreach ($lotes as $lote)
    <tr class = "row">
        <td class="cell"> {{ $lote->numero }}</td>
        <td class="cell"> {{ $lote->descripcion }}</td>
        <td class="cell"> {{ $lote->cantidad_total }}</td>
        <td class="cell"> {{ $lote->valor_total }}</td>
        <td class="cell"> {{ $lote->precio_unitario }}</td>
        <td class="cell"> {{ $lote->fecha_ingreso }}</td>
        <td class="cell"> {{ $lote->fecha_vencimiento }}</td>
        <td class="cell"> {{ $lote->producto_id }}</td>
        <td class="cell">
            <a href="{{ route('lote.edit', $lote->id) }}"><button>Editar</button></a>
            <a href="{{ route('lote.delete', $lote->id) }}"><button>Eliminar</button></a>
        </td>
    </tr>
    @endforeach
    <a href="{{ route('lote.create') }}"><button>Agregar Lote</button></a>
</body>
</html>
