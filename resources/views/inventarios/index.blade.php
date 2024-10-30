<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="encabezado">
            <a href="index.php">
            <div class="card">
                <img src="multimedia/images/elements/farmacia.png">
                <h1>San Agustin</h1>
            </div>
            </a>
            <ul class="example-2">
  <li class="icon-content">
    <a href="index.php" aria-label="Spotify" data-social="spotify">
        <div class="filled"></div>
        <i class="fa fa-box"></i>
    </a>
    <div class="tooltip">Inventarios</div>
  </li>
  <li class="icon-content">
    <a href="php/viewbrand.php" aria-label="Pinterest" data-social="pinterest">
      <div class="filled"></div>
      <i class="fa-solid fa-tag"></i>
    </a>
    <div class="tooltip">Marcas</div>
  </li>
  <li class="icon-content">
    <a href="{{ route('producto.index') }}" aria-label="Dribbble" data-social="dribbble">
      <div class="filled"></div>
      <i class="fas fa-pills"></i>
      <div class="tooltip">Productos</div>
    </a>
  </li>
  <li class="icon-content">
    <a href="{{ route('lotes.index') }}" aria-label="Telegram" data-social="telegram">
      <div class="filled"></div>
      <i class="fas fa-barcode"></i>
      <div class="tooltip">Lotes</div>
    </a>
  </li>
</ul>
        </div>
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

    <style>
        .inventario-link {
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
    </style>

   
    @foreach ($inventarios as $inventario)
    <a href="{{ route('inventario.productos', $inventario->id) }}">
        <div class="tarjeta">
        <p><strong>Nombre:</strong> {{ $inventario->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $inventario->descripcion }}</p>
        <p><strong>Cantidad Total:</strong> {{ $inventario->cantidad_total }}</p>
        <p><strong>Valor Total:</strong> {{ $inventario->valor_total }}</p>
        <img src="{{ asset('images/' . $inventario->ruta_imagen) }}" alt="{{ $inventario->nombre }}">
        <a href="{{ route('inventario.edit', $inventario->id) }}"><button>Editar</button></a>
        <a href="{{ route('inventario.delete', $inventario->id) }}"><button>Eliminar</button></a>
        </div>
    </a>
    @endforeach

    <a href="{{ route('inventario.create') }}"><button>Agregar Inventario</button></a>
</body>
</html>
