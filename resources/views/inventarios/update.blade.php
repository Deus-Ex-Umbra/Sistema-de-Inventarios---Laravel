<form action="{{ route('inventario.update', $inventario->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $inventario->nombre }}" placeholder="Nombre">
    <input type="text" name="descripcion" value="{{ $inventario->descripcion }}" placeholder="Descripción">
    <input type="file" name="ruta_imagen" value="{{ $inventario->ruta_imagen }}" placeholder="Imagen">
    <button type="submit">Actualizar</button>
</form>
