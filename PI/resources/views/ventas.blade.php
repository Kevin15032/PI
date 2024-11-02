@extends('layouts.nav')

@section('contenido')

<div class="container mt-5 col-md-8">
    @if(session('exito'))
        <x-alert tipo="success">{{ session('exito') }}</x-alert>
    @endif

    @if(session('advertencia'))
        <x-alert tipo="warning">{{ session('advertencia') }}</x-alert>
    @endif

    <div class="container my-4">
        <h1 class="text-center mb-4">Sistema de Punto de Venta</h1>

        @if(session('mensaje'))
            <div class="alert alert-warning">
                {{ session('mensaje') }}
            </div>
        @endif 

        @if(isset($resultados) && $resultados->isNotEmpty())
            <h2>Resultados de la búsqueda:</h2>
            <ul>
                @foreach($resultados as $producto)
                    <li>{{ $producto->nombre }}</li>
                @endforeach
            </ul>
        @else
            <p>No se encontraron resultados.</p>
        @endif

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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Recibo de Venta</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Producto 1</td>
                            <td>1</td>
                            <td>$10.00</td>
                            <td>$10.00</td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-3">Subtotal: $10.00</p>
                <p>Descuento: $0.00</p>
                <p class="fw-bold">Total: $10.00</p>
                <p>Método de Pago: Efectivo</p>
                <p>Monto Recibido: $20.00</p>
                <p>Cambio: $10.00</p>
                <button class="btn btn-primary mt-3">Imprimir Recibo</button>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Historial de Ventas Diarias</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                            <th>Artículos</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>$25.50</td>
                            <td>3</td>
                            <td>10:30 AM</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>$40.00</td>
                            <td>2</td>
                            <td>11:45 AM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
