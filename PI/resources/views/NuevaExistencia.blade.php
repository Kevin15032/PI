@extends('layouts.nav')

@section('contenido')

<div class="container mt-5">
    <h1 class="text-center">Añadir Nueva Existencia</h1>
    <form action="{{ route('guardarExistencia') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select id="categoria_id" name="categoria_id" class="form-control">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="producto_id" class="form-label">Producto</label>
            <select id="producto_id" name="producto_id" class="form-control">
                @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select id="proveedor_id" name="proveedor_id" class="form-control">
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label">Existencia</label>
            <input type="number" id="existencia" name="existencia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de Venta</label>
            <input type="text" id="precio_venta" name="precio_venta" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('rutaEntrada') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
       
@endsection