<form action="{{ route('inventario.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="descripcion" placeholder="Descripción">
    <input type="file" name="ruta_imagen" placeholder="Ruta Imagen">
    <button type="submit">Crear</button>
</form>
