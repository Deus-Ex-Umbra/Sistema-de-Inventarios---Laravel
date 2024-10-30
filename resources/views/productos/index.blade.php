<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="encabezado">
            <a href="{{ route('inventario.index') }}">
            <div class="card">
                <img src="{{ asset('iconos/farmacia.svg') }}">
                <h1>San Agustin</h1>
            </div>
            </a>
            <ul class="example-2">
  <li class="icon-content">
    <a href="{{ route('inventario.index') }}" aria-label="Spotify" data-social="spotify">
        <div class="filled"></div>
        <img src="{{ asset('iconos/inventario.svg') }}" alt="Inventarios">
    </a>
    <div class="tooltip">Inventarios</div>
  </li>
  <li class="icon-content">
    <a href="{{ route('producto.index') }}" aria-label="Dribbble" data-social="dribbble">
      <div class="filled"></div>
      <img src="{{ asset('iconos/producto.svg') }}" alt="Productos">
    </a>
    <div class="tooltip">Productos</div>
  </li>
  <li class="icon-content">
    <a href="{{ route('lote.index') }}" aria-label="Telegram" data-social="telegram">
      <div class="filled"></div>
      <img src="{{ asset('iconos/lote.svg') }}" alt="Lotes">
</a>
<div class="tooltip">Lotes</div>
  </li>
  <li class="icon-content">
    <a href="{{ route('proveedor.index') }}" aria-label="Pinterest" data-social="pinterest">
      <div class="filled"></div>
      <img src="{{ asset('iconos/proveedor.svg') }}" alt="Proveedores">
    </a>
    <div class="tooltip">Proveedores</div>
  </li>
</ul>
        </div>


    @if (!empty($id_inventario))
        <a href="{{ route('producto.create', $id_inventario) }}"><button>Agregar Producto</button></a>
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
        <form action="{{ route('producto.delete', $producto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">
                <img src="{{ asset('iconos/eliminar.svg') }}" alt="Eliminar">
                Eliminar</button>
        </form>
    @endforeach
    </table>
    <><a href="{{ route('producto.create', ['id_inventario' => $inventario->id]) }}">Crear Producto</a>

</body>
</html>
