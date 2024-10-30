@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Lote</h1>
    <form action="{{ route('lote.update', $lote->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{ $lote->numero }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $lote->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="cantidad_total">Cantidad Total:</label>
            <input type="number" class="form-control" id="cantidad_total" name="cantidad_total" value="{{ $lote->cantidad_total }}" required>
        </div>
        <div class="form-group">
            <label for="valor_total">Valor Total:</label>
            <input type="number" class="form-control" id="valor_total" name="valor_total" value="{{ $lote->valor_total }}" required>
        </div>
        <div class="form-group">
            <label for="precio_unitario">Precio Unitario:</label>
            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" value="{{ $lote->precio_unitario }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{ $lote->fecha_ingreso }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ $lote->fecha_vencimiento }}" required>
        </div>
        <div class="form-group">
            <label for="producto_id">ID del Producto:</label>
            <input type="number" class="form-control" id="producto_id" name="producto_id" value="{{ $lote->producto_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Lote</button>
    </form>
</div>
@endsection
