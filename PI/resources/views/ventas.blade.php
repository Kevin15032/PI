@extends('layouts.nav')

@section('contenido')
@if (session('success'))
    <script>
        Swal.fire({
            title: "¡Éxito!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@endif

<div class="container py-4">
    <h1 class="mb-4 text-center">Lista de Ventas</h1>

    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-primary" onclick="window.location='{{ route('rutaNuevaVenta') }}'">
            <i class="bi bi-plus-lg me-2"></i>Nueva Venta
        </button>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Número de Venta</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto Total</th>
                <th scope="col" style="width: 100px;">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->fecha }}</td>
                <td>${{ number_format($venta->monto_total, 2) }}</td>
                <td>
                    <form action="{{ route('eliminarVenta', $venta->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta venta?');">
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
