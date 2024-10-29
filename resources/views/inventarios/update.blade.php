<form action="{{ route('inventario.update', $inventario->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" placeholder="Nombre" value="{{ $inventario->nombre }}" required>
    <input type="text" name="descripcion" placeholder="Descripción" value="{{ $inventario->descripcion }}">
    <input type="file" name="ruta_imagen" placeholder="Ruta Imagen">
    <button type="submit">Actualizar</button>
</form>
