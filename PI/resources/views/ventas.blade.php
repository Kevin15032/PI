@extends('layouts.nav')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Punto de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <h1 class="text-center mb-4">Sistema de Punto de Venta</h1>
    
    <div class="row">
        <!-- Búsqueda de Productos -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Búsqueda de Productos</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control mb-3" placeholder="Buscar producto por nombre o código">
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
                                <tr>
                                    <td>Producto 1</td>
                                    <td>$10.00</td>
                                    <td>100</td>
                                    <td><button class="btn btn-primary btn-sm">Agregar</button></td>
                                </tr>
                                <tr>
                                    <td>Producto 2</td>
                                    <td>$15.50</td>
                                    <td>50</td>
                                    <td><button class="btn btn-primary btn-sm">Agregar</button></td>
                                </tr>
                                <tr>
                                    <td>Producto 3</td>
                                    <td>$5.75</td>
                                    <td>200</td>
                                    <td><button class="btn btn-primary btn-sm">Agregar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrito de Compras -->
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
                                    <td><input type="number" class="form-control form-control-sm" value="1" min="1" style="width: 60px;"></td>
                                    <td>$10.00</td>
                                    <td>$10.00</td>
                                    <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
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
                            <input type="number" class="form-control form-control-sm" style="width: 80px;">
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Total:</span>
                            <span class="fw-bold">$10.00</span>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <label>Método de Pago:</label>
                            <select class="form-select form-select-sm" style="width: 150px;">
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <label>Monto Recibido:</label>
                            <input type="number" class="form-control form-control-sm" style="width: 80px;">
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
    </div>

    <!-- Recibo de Venta -->
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

    <!-- Historial de Ventas Diarias -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection