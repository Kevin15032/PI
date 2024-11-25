@extends('layouts.nav')

@section('contenido')
@if (session('exito'))
    
    <script>
        Swal.fire({
            title: "Respuesta servidor!",
            text: "{{ session('exito') }}",
            icon: "success"
        });
    </script>
@endif
<div class="container py-4">
    <h1 class="mb-4 text-center">Lista de Proveedores</h1>

    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-primary" onclick="window.location='{{ route('nuevoProveedor') }}'">
            <i class="bi bi-plus-lg me-2"></i>Nuevo Proveedor
        </button>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm"
                            onclick="window.location='{{ route('editarProveedor', $proveedor->id) }}'">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('eliminarProveedor', $proveedor->id) }}" method="POST"
                            onsubmit="return confirm('¿Está seguro de que desea eliminar este proveedor?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection