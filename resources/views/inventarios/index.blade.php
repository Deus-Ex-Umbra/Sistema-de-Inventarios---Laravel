<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
</head>
<body>
    <header>
        <button>Inventarios</button>
        <button>Productos</button>
        <button>Lotes</button>
        <button>Proveedores</button>
    </header>
    <div class="buscador">
        <form action="{{ route('inventario.search') }}" method="post">
            @csrf
            @php
                use App\Http\Controllers\InventarioController;
                $columns = InventarioController::getAllColumnsInventario();
            @endphp
            @foreach ($columns as $column)
                <input type="text" name="{{ $column }}" placeholder="{{ str_replace('_', ' ', $column) }}">
                @if($column == 'ruta_imagen')
                    <input type="file" name="{{ $column }}">
                @elseif($column == 'proveedor_id')
                    <select name="{{ $column }}">
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                @endif
            @endforeach
            <input type="submit" value="Buscar">
        </form>
    </div>
    
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

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
