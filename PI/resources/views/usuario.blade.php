@extends('layouts.nav')

@section('contenido')
<div class="container mt-4">
    <h2 class="mb-4">GESTIÓN DE USUARIOS</h2>
    <button class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#nuevoUsuarioModal">
        <i class="bi bi-person-plus"></i> Nuevo Usuario
    </button>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Vanessa Martínez</td>
                <td>vanessam@gmail.com</td>
                <td>Superadministrador</td>
                <td>
                    <button class="btn btn-primary btn-sm me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal de Nuevo Usuario -->
<div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" aria-labelledby="nuevoUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoUsuarioModalLabel">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('rutaEnviar') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol" required>
                            <option value="Superadministrador">Superadministrador</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Guardar Usuario
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Alertas y SweetAlert -->
@if(session('exito'))
<script>
    Swal.fire({
        title: "¡Éxito!",
        text: "{{ session('exito') }}",
        icon: "success"
    });
</script>
@endif
@endsection