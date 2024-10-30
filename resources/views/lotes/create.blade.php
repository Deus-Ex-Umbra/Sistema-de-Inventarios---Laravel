@extends('layouts.app')
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
<div class="container">
    <h1>Crear Nuevo Lote</h1>
    <form action="{{ route('lote.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad_total">Cantidad Total:</label>
            <input type="number" class="form-control" id="cantidad_total" name="cantidad_total" required>
        </div>
        <div class="form-group">
            <label for="valor_total">Valor Total:</label>
            <input type="number" class="form-control" id="valor_total" name="valor_total" required>
        </div>
        <div class="form-group">
            <label for="precio_unitario">Precio Unitario:</label>
            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
        </div>
        <div class="form-group">
            <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
        </div>
        <div class="form-group">
            <label for="producto_id">ID del Producto:</label>
            <input type="number" class="form-control" id="producto_id" name="producto_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Lote</button>
    </form>
</div>
<style>
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1001;
        max-width: 500px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal h1 {
        color: #333;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #555;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #4CAF50;
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
        margin-top: 1rem;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #45a049;
    }

    .close-modal {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #777;
    }

    .close-modal:hover {
        color: #333;
    }

    /* Estilos para hacer el formulario más compacto */
    .form-row {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .form-row .form-group {
        flex: 1;
        margin-bottom: 0;
    }
</style>

<div class="modal-overlay" id="modalOverlay"></div>
<div class="modal" id="createLoteModal">
    <button class="close-modal" onclick="closeModal()">&times;</button>
    <div class="container">
        <!-- El contenido del formulario se moverá aquí mediante JavaScript -->
    </div>
</div>

<script>
    // Mover el contenido del formulario al modal
    document.addEventListener('DOMContentLoaded', function() {
        const modalContainer = document.querySelector('#createLoteModal .container');
        const originalContainer = document.querySelector('.container');
        modalContainer.innerHTML = originalContainer.innerHTML;
        originalContainer.remove();
    });

    // Mostrar el modal automáticamente
    window.onload = function() {
        document.getElementById('modalOverlay').style.display = 'block';
        document.getElementById('createLoteModal').style.display = 'block';
    }

    // Función para cerrar el modal
    function closeModal() {
        document.getElementById('modalOverlay').style.display = 'none';
        document.getElementById('createLoteModal').style.display = 'none';
        window.history.back(); // Regresar a la página anterior
    }

    // Cerrar el modal si se hace clic fuera de él
    document.getElementById('modalOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
