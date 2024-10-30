<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <header>
    <div class="encabezado">
            <a href="{{ route('inventario.index') }}">
                <div class="card">
                    <img src="{{ asset('iconos/farmacia.svg') }}" />
                    <h1>San Agustin</h1>
                </div>
            </a>
            <ul class="example-2">
                <li class="icon-content">
                    <a
                        href="{{ route('inventario.index') }}"
                        aria-label="Spotify"
                        data-social="spotify"
                    >
                        <div class="filled"></div>
                        <img
                            src="{{ asset('iconos/inventario.svg') }}"
                            alt="Inventarios"
                        />
                    </a>
                    <div class="tooltip">Inventarios</div>
                </li>
                <li class="icon-content">
                    <a
                        href="{{ route('producto.index') }}"
                        aria-label="Dribbble"
                        data-social="dribbble"
                    >
                        <div class="filled"></div>
                        <img
                            src="{{ asset('iconos/producto.svg') }}"
                            alt="Productos"
                        />
                    </a>
                    <div class="tooltip">Productos</div>
                </li>
                <li class="icon-content">
                    <a
                        href="{{ route('lote.index') }}"
                        aria-label="Telegram"
                        data-social="telegram"
                    >
                        <div class="filled"></div>
                        <img src="{{ asset('iconos/lote.svg') }}" alt="Lotes" />
                    </a>
                    <div class="tooltip">Lotes</div>
                </li>
                <li class="icon-content">
                    <a
                        href="{{ route('proveedor.index') }}"
                        aria-label="Pinterest"
                        data-social="pinterest"
                    >
                        <div class="filled"></div>
                        <img
                            src="{{ asset('iconos/proveedor.svg') }}"
                            alt="Proveedores"
                        />
                    </a>
                    <div class="tooltip">Proveedores</div>
                </li>
            </ul>
        </div>
    </header>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if (!empty($id_inventario))
        <a href="{{ route('producto.create', $id_inventario) }}"><button>Agregar Producto</button></a>
    @endif
    @foreach ($productos as $producto)
        <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Cantidad Total:</strong> {{ $producto->cantidad_total }}</p>
        <p><strong>Valor Total:</strong> {{ $producto->valor_total }}</p>
        <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
        <p><strong>Marca:</strong> {{ $producto->marca->nombre }}</p>
        <p><strong>Proveedor:</strong> {{ $producto->proveedor->nombre }}</p>
        <p><strong>Inventario:</strong> {{ App\Http\Controllers\InventarioController::getInventarioById($producto->inventario_id)->nombre }}</p>
        <img src="{{ asset('images/' . $producto->ruta_imagen) }}" alt="{{ $producto->nombre }}">
        <a href="{{ route('producto.edit', $producto->id) }}"><button>Editar</button></a>
        <form action="{{ route('producto.delete', $producto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">
                <img src="{{ asset('iconos/eliminar.svg') }}" alt="Eliminar">
                Eliminar</button>
        </form>
    @endforeach
</body>
</html>
