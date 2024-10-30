<div class="modal-container">
    <div class="modal-content">
        <h2>Crear Nueva Categoría</h2>
        
        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nombre">Nombre de la Categoría</label>
                <input type="text" 
                       id="nombre" 
                       name="nombre" 
                       value="{{ old('nombre') }}"
                       required 
                       maxlength="255" 
                       class="form-input">
                @error('nombre')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">Crear Categoría</button>
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<style>
.modal-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    width: 100%;
    max-width: 500px;
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-content h2 {
    color: #2d3748;
    margin-bottom: 1.5rem;
    text-align: center;
    font-size: 1.5rem;
    font-weight: 600;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #4a5568;
    font-weight: 500;
}

.form-input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.2s;
    background-color: #f8fafc;
}

.form-input:focus {
    outline: none;
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
    background-color: #fff;
}

.error-message {
    color: #e53e3e;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: block;
}

.button-group {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
}

.btn {
    padding: 0.625rem 1.25rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.2s;
    font-size: 0.875rem;
}

.btn-primary {
    background-color: #4299e1;
    color: white;
}

.btn-primary:hover {
    background-color: #3182ce;
    transform: translateY(-1px);
}

.btn-secondary {
    background-color: #718096;
    color: white;
}

.btn-secondary:hover {
    background-color: #4a5568;
    transform: translateY(-1px);
}
</style>
