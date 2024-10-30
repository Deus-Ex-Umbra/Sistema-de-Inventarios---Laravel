<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
    <table class="table">
        <tr class="row">
            <td class="cell">Nombre</td>
            <td class="cell">Direccion</td>
            <td class="cell">Telefono</td>
            <td class="cell">Email</td>
            <td class="cell">Operaciones</td>
        </tr>
    @foreach ($proveedores as $proveedor)
        <tr class="row">
        <th class="cell"> {{ $proveedor->nombre }}</th>
        <th class="cell"> {{ $proveedor->direccion }}</th>
        <th class="cell"> {{ $proveedor->telefono }}</th>
        <th class="cell"> {{ $proveedor->email }}</th>
        <th class="cell">
        <a href="{{ route('lote.edit', $lote->id) }}"><button><img src="{{ asset('iconos/editar.svg') }}" alt="Editar"></button></a>
            <a href="{{ route('lote.delete', $lote->id) }}"><button><img src="{{ asset('iconos/eliminar.svg') }}" alt="Eliminar"></button></a>
        </th>
        </tr>
    @endforeach
    </table>

    <a href="{{ route('proveedor.create') }}"><button>Agregar Proveedor</button></a>
</body>
</html>
