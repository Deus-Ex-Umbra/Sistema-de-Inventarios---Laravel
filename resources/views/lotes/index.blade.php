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


<!-- <!DOCTYPE html>
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
--!