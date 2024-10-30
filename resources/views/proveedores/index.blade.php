<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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

    @foreach ($proveedores as $proveedor)
        <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
        <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
        <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
        <p><strong>Email:</strong> {{ $proveedor->email }}</p>
        <a href="{{ route('proveedor.edit', $proveedor->id) }}"><button>Editar</button></a>
        <a href="{{ route('proveedor.delete', $proveedor->id) }}"><button>Eliminar</button></a>
        <hr>
    @endforeach

    <a href="{{ route('proveedor.create') }}"><button>Agregar Proveedor</button></a>
</body>
</html>
