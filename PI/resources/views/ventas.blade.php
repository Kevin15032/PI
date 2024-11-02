@extends('layouts.nav')

@section('contenido')
<div class="container mt-5 col-md-8">

    @if(session('exito'))
        <x-alert tipo="success">{{ session('exito') }}</x-alert>
    @endif

    @if(session('advertencia'))
        <div class="alert alert-warning">
            {{ session('advertencia') }}
        </div>
    @endif

    @if(isset($resultados))
        @foreach($resultados as $producto)
            <div>
                <h4>{{ $producto->nombre }}</h4>
                <p>Precio: {{ $producto->precio }}</p>
                <p>Stock: {{ $producto->stock }}</p>
            </div>
        @endforeach
    @endif

    <h1 class="text-center mb-4">Sistema de Punto de Venta</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Búsqueda de Productos</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('buscarProducto') }}" method="POST">
                        @csrf
                        <input type="text" name="busqueda" class="form-control mb-3" placeholder="Buscar producto por nombre" value="{{ old('busqueda') }}" required>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Carrito de Compras</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 300px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Producto 1</td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" value="1" min="1" style="width: 60px;" required>
                                    </td>
                                    <td>$10.00</td>
                                    <td>$10.00</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <span>Subtotal:</span>
                            <span>$10.00</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Descuento:</span>
                            <input type="number" class="form-control form-control-sm" style="width: 80px;" required>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Total:</span>
                            <span class="fw-bold">$10.00</span>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <label>Método de Pago:</label>
                            <select class="form-select form-select-sm" style="width: 150px;" required>
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <label>Monto Recibido:</label>
                            <input type="number" class="form-control form-control-sm" style="width: 80px;" required>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <span>Cambio:</span>
                            <span>$0.00</span>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button class="btn btn-secondary me-2">Cancelar Venta</button>
                            <button class="btn btn-success">Finalizar Venta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="table-responsive" style="max-height: 300px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($resultados) && $resultados->isNotEmpty())
                            @foreach($resultados as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">Seleccionar</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No hay productos disponibles.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection