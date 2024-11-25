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
<div class="container mt-5">
    <h1 class="text-center">Lista de Existencias</h1>
    <a href="{{ route('rutaNuevaExistencia') }}" class="btn btn-primary mb-3">Añadir Nueva Existencia</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Existencia</th>
                <th>Precio de Venta</th>
                <th>Fecha de Entrada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($existencias as $existencia)
            <tr>
                <td>{{ $existencia->categoria_id }}</td>
                <td>{{ $existencia->producto_id }}</td>
                <td>{{ $existencia->proveedor_id }}</td>
                <td>{{ $existencia->existencia }}</td>
                <td>${{ number_format($existencia->precio_venta, 2) }}</td>
                <td>{{ $existencia->fecha_entrada }}</td>
                <td>
                    <a href="{{ route('rutaEditarExistencia', $existencia->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('eliminarExistencia', $existencia->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection