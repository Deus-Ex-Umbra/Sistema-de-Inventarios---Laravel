<div class="encabezado">
    <a href="{{ route('inventario.index') }}">
        <div class="card">
            <img src="{{ asset('iconos/farmacia.svg') }}" />
            <h1>San Agustin</h1>
        </div>
    </a>
    <ul class="example-2">
        <li class="icon-content">
            <a href="{{ route('inventario.index') }}" aria-label="Inventarios">
                <div class="filled"></div>
                <img src="{{ asset('iconos/inventario.svg') }}" alt="Inventarios" />
            </a>
            <div class="tooltip">Inventarios</div>
        </li>
        <li class="icon-content">
            <a href="{{ route('categoria.index') }}" aria-label="Categorias">
                <div class="filled"></div>
                <img src="{{ asset('iconos/categoria.svg') }}" alt="Categorias" />
            </a>
            <div class="tooltip">Categorias</div>
        </li>
    </ul>
</div>

<div class="container">
    <h1>Categorías</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('categoria.delete', $categoria->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('categoria.create') }}" class="btn btn-success">Nueva Categoría</a>
</div>

<style>
    .container {
        padding: 20px;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
        margin: 0 0.25rem;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
        margin-top: 1rem;
    }
</style>
