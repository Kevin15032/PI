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
    <h1 class="mb-4 text-center">Lista de Productos</h1>

    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-primary" onclick="window.location='{{ route('rutaNuevoProducto') }}'">
            <i class="bi bi-plus-lg me-2"></i>Nuevo Producto
        </button>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Categoría</th>
                <th scope="col">Nombre</th>
                <th scope="col">Detalles</th>
                <th scope="col" style="width: 100px;">Editar</th>
                <th scope="col" style="width: 100px;">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->categoria_id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->detalles }}</td>
                <td>
                    <button class="btn btn-outline-primary btn-sm" onclick="window.location='{{ route('editarProducto', $producto->id) }}'">
                        <i class="bi bi-pencil">Editar</i>
                    </button>
                </td>
                <td>
                    <form action="{{ route('eliminarProducto', $producto->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este producto?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm" type="submit">
                            <i class="bi bi-trash">Eliminar</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection