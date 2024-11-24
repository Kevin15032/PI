@extends('layouts.nav')

@section('contenido')
<div class="container mt-4">
    <h2 class="mb-4">GESTIÓN DE USUARIOS</h2>
    <button type="button" class="btn btn-danger btn-sm" 
        onclick="window.location.href='{{ route('rutaAgregar') }}'">
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
                @foreach($consultausermanagement as $usuario)
                <td>{{$consultausermanagement->nombre}}</td>
                <td>{{$consultausermanagement->correo}}</td>
                <td>{{$consultausermanagement->rol}}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm me-2" 
                    onclick="window.location.href('{{ route('rutaEliminar', $usuario->id) }}')">
                    <i class="bi bi-pencil"></i> Editar
            </button>
                    <button type="button" class="btn btn-danger btn-sm" 
                    onclick="window.location.href('{{ route('rutaEliminar', $usuario->id) }}')">
                    <i class="bi bi-trash"></i> Eliminar
            </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    function eliminarCliente(url) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "No podrás recuperar este registro.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
    </script>
@endsection