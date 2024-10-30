<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes</title>  
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
    @if (!empty($id_producto))
        <a href="{{ route('lote.create', $id_producto) }}"><button>Crear Nuevo Lote</button></a>
    @endif
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
        <form action="{{ route('lote.destroy', $lote->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endforeach
</body>
</html>
