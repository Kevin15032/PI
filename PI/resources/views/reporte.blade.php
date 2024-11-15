@extends('layouts.nav')

@section('contenido')





<div class="container my-4">
  <h1 class="text-center font-weight-bold mb-4">Generación de Reportes de Ventas</h1>
  
  
  <div class="row mb-4">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header font-weight-bold">Rango de Fechas</div>
        <div class="card-body">
         
          <input type="date" class="form-control mb-2" placeholder="Desde">
          <input type="date" class="form-control" placeholder="Hasta">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header font-weight-bold">Filtros</div>
        <div class="card-body">
          <label class="font-weight-bold">Categoría de Producto</label>
          <select class="form-control mb-3">
            <option>Seleccionar categoría</option>
            <option value="electronics">Electrónicos</option>
            <option value="clothing">Ropa</option>
            <option value="food">Alimentos</option>
          </select>
          
          <label class="font-weight-bold">Vendedor</label>
          <select class="form-control">
            <option>Seleccionar vendedor</option>
            <option value="john">John Doe</option>
            <option value="jane">Jane Smith</option>
            <option value="bob">Bob Johnson</option>
          </select>
        </div>
      </div>
    </div>
  </div>


  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#sales">Reporte de Ventas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#inventory">Reporte de Inventario</a>
    </li>
  </ul>

  <div class="tab-content">
   
    <div id="sales" class="tab-pane active">
      <div class="card mb-4">
        <div class="card-header font-weight-bold">Reporte de Ventas</div>
        <div class="card-body">
          
          <canvas id="salesChart" width="100%" height="45"></canvas>
        </div>
      </div>
    </div>

    
    <div class="container mt-5 col-md-8">
    <div class="card text-justify font-monospace">
        <div class="card-header fs-5 text-primary">Reporte de Inventario</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventario as $item)
                    <tr>
                        <td>{{ $item->producto }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td>{{ $item->proveedor }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  
  <div class="d-flex justify-content-end mb-4">
    <button class="btn btn-outline-secondary mx-1">Exportar a Excel</button>
    <button class="btn btn-outline-secondary mx-1">Exportar a PDF</button>
    <button class="btn btn-outline-secondary mx-1">Imprimir</button>
  </div>

  
  <div class="card">
    <div class="card-header font-weight-bold">Resumen Financiero</div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h5 class="font-weight-bold">Ingresos vs Costos</h5>
          <canvas id="incomeCostChart" width="100%" height="100"></canvas>
        </div>
        <div class="col-md-6">
          <h5 class="font-weight-bold">Comparación de Ingresos</h5>
          <canvas id="incomeComparisonChart" width="100%" height="100"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection