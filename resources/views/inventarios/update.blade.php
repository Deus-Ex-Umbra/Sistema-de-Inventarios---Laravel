<form action="{{ route('inventario.update', $inventario->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $inventario->nombre }}" placeholder="Nombre">
    <input type="text" name="descripcion" value="{{ $inventario->descripcion }}" placeholder="Descripción">
    <input type="file" name="ruta_imagen" value="{{ $inventario->ruta_imagen }}" placeholder="Imagen">
    <button type="submit">Actualizar</button>
</form>
<style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 30px rgba(0,0,0,0.2);
        width: 400px;
        animation: slideIn 0.5s ease-out;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border: 2px solid #eee;
        border-radius: 8px;
        box-sizing: border-box;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    input:focus {
        border-color: #40c9ff;
        outline: none;
        box-shadow: 0 0 8px rgba(64,201,255,0.3);
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #40c9ff 0%, #3f51b5 100%);
        border: none;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(63,81,181,0.3);
    }

    .success-modal {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        display: none;
        animation: slideInRight 0.5s ease-out;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .success-modal.show {
        display: block;
    }

    .success-modal p {
        margin: 0;
        color: #4CAF50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .success-modal p::before {
        content: '✓';
        background: #4CAF50;
        color: white;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }
</style>

<div class="modal-overlay">
    <div class="success-modal" id="successModal">
        <p>¡Inventario actualizado correctamente!</p>
    </div>
</div>

<script>
    @if(session('success'))
        const successModal = document.getElementById('successModal');
        successModal.classList.add('show');
        setTimeout(() => {
            successModal.classList.remove('show');
        }, 3000);
    @endif
</script>
