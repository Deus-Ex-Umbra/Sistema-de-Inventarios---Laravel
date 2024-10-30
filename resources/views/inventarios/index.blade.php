<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    <div class="contenido">
        <div class="buscador">
            <form action="{{ route('inventario.search') }}" method="post">
                @csrf
                <select name="search_column">
                        <option value="nombre">Nombre</option>
                        <option value="descripcion">Descripción</option>
                        <option value="cantidad_total">Cantidad Total</option>
                        <option value="valor_total">Valor Total</option>
                    </select>
                <div class="input-container">
                    <input type="text" name="search_value" placeholder="Buscar...">
                    <button type="submit">
                        <img src="{{ asset('iconos/lupa.svg') }}" alt="Buscar">
                    </button>
                </div>
            </form>
        </div>
        
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <div class="inventario">
    @foreach ($inventarios as $inventario)
 <a href="{{ route('inventario.productos', $inventario->id) }}">
     <div class="card">
     <div class="profile-pic"><img src="{{ asset('images/' . $inventario->ruta_imagen) }}" alt="{{ $inventario->nombre }}"></div>
     <div class="bottom">
         <div class="content">
             <span class="name">{{ $inventario->nombre }}</span>
             <span class="about-me">{{ $inventario->descripcion }}</span>
             <div class="detalles">
                 <div class="cantidad">
                     <strong>{{$inventario->cantidad_total}}</strong>
                     <span>Articulos</span>
                 </div>
             <div class="precio">
                 <strong>{{$inventario->valor_total}} Bs</strong>
                 <span>Total</span>
             </div>
         </div>
         </div>
         <div class="bottom-bottom">
         <div class="botones">
         <a href="{{ route('inventario.edit', $inventario->id) }}"><button class="btn open-modal-edit"><img src="{{ asset('iconos/editar.svg') }}" alt="Editar"></button></a>
         <form action="{{ route('inventario.delete', $inventario->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn"><img src="{{ asset('iconos/eliminar.svg') }}" alt="Eliminar"></button>
         </form>
         </div>
     </div>
     </div>
     </div>
 </a>
 @endforeach

 <a href="{{ route('inventario.create') }}"><button>Agregar Inventario</button></a>
    </div>
    </div>
        
</body>
</html>
