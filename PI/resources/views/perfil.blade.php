@extends('layouts.nav')

@section('contenido')

<!-- Card para mostrar el perfil -->
<div class="max-w-2xl mx-auto p-4">
    <div class="card shadow-lg rounded-lg">
        <div class="card-header flex justify-between items-center p-4 bg-blue-500 text-white rounded-t-lg">
            <h2 class="text-lg font-semibold">Perfil de Usuario</h2>
            <button class="edit-button bg-transparent border-0 p-2 text-white rounded-full" id="edit-profile">
                ✏️
            </button>
        </div>
        <div class="card-body p-4 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-500">Nombre</label>
                    <p id="user-name" class="text-lg font-medium">Diego Carmona Bernal</p>
                </div>
                <div>
                    <label class="text-gray-500">Correo Electrónico</label>
                    <p id="user-email" class="text-lg font-medium">carmonabernaldiego@gmail.com</p>
                </div>
                <div>
                    <label class="text-gray-500">Rol</label>
                    <p id="user-role" class="text-lg font-medium">Superadministrador</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar perfil -->
<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden" id="edit-modal">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-1/2">
        <div class="modal-header mb-4">
            <h3 class="text-xl font-semibold">Editar Perfil</h3>
        </div>
        <form id="edit-form">
            <div class="space-y-4">
                <div class="field">
                    <label for="name" class="block text-sm font-medium">Nombre</label>
                    <input type="text" id="name" class="input w-full border p-2 rounded" value="Diego Carmona Bernal">
                </div>
                <div class="field">
                    <label for="email" class="block text-sm font-medium">Correo Electrónico</label>
                    <input type="email" id="email" class="input w-full border p-2 rounded" value="carmonabernaldiego@gmail.com">
                </div>
                <div class="field">
                    <label for="role" class="block text-sm font-medium">Rol</label>
                    <input type="text" id="role" class="input w-full border p-2 rounded" value="Superadministrador">
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" class="button bg-gray-500 text-white p-2 rounded" id="cancel-edit">Cancelar</button>
                    <button type="submit" class="button bg-blue-500 text-white p-2 rounded">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Obtener los elementos del DOM
    const editButton = document.getElementById('edit-profile');
    const modal = document.getElementById('edit-modal');
    const cancelEdit = document.getElementById('cancel-edit');
    const editForm = document.getElementById('edit-form');
    const userName = document.getElementById('user-name');
    const userEmail = document.getElementById('user-email');
    const userRole = document.getElementById('user-role');

    // Función para mostrar el modal de edición
    editButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Función para cerrar el modal sin guardar
    cancelEdit.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Función para guardar los cambios
    editForm.addEventListener('submit', (event) => {
        event.preventDefault();
        userName.textContent = document.getElementById('name').value;
        userEmail.textContent = document.getElementById('email').value;
        userRole.textContent = document.getElementById('role').value;
        modal.classList.add('hidden');
    });
</script>

@endsection

@section('styles')
<style>
    /* Estilos generales */
    .card {
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #ffffff;
        border-radius: 0.375rem 0.375rem 0 0;
    }

    .card-body {
        padding: 1rem;
    }

    .edit-button {
        cursor: pointer;
        padding: 0.5rem;
        background-color: transparent;
        border: none;
    }

    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        width: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-header h3 {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #e0e0e0;
        border-radius: 0.375rem;
    }

    .input:focus {
        border-color: #007bff;
        outline: none;
    }

    .button {
        padding: 0.5rem 1rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 0.375rem;
        cursor: pointer;
    }

    .button.bg-blue-500 {
        background-color: #007bff;
        color: #ffffff;
    }

    .button.bg-blue-500:hover {
        background-color: #0056b3;
    }

    .button.bg-gray-500 {
        background-color: #6c757d;
        color: #ffffff;
    }

    .button.bg-gray-500:hover {
        background-color: #5a6268;
    }
</style>
@endsection
