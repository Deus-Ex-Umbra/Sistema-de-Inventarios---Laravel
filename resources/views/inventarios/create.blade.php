<form action="{{ route('inventario.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required>
    <div class="modal-overlay" style="display: none;">
        <div class="success-modal" id="successModal">
            <p>¡Inventario creado correctamente!</p>
        </div>
    </div>

    <script>
        @if(session('success'))
            const successModal = document.getElementById('successModal');
            const overlay = document.querySelector('.modal-overlay');
            overlay.style.display = 'flex';
            setTimeout(() => {
                overlay.style.display = 'none';
            }, 3000);
        @endif
    </script>

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
            z-index: 1100;
        }

        .success-modal {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            animation: slideInRight 0.5s ease-out;
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
    </style>
    <input type="text" name="descripcion" placeholder="Descripción">
    <input type="file" name="ruta_imagen" placeholder="Ruta Imagen">
    <button type="submit" class="submit-btn">Crear</button>
    <style>
        form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 400px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            animation: slideIn 0.5s ease-out;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #FFD43B;
            outline: none;
            box-shadow: 0 0 5px rgba(255,212,59,0.5);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #FFD43B 0%, #FF6600 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,102,0,0.3);
        }
    </style>