@extends('layouts.nav')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Existencia</h1>
    <form action="{{ route('actualizarExistencia', $existencia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select id="categoria_id" name="categoria_id" class="form-control">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == $existencia->categoria_id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="producto_id" class="form-label">Producto</label>
            <select id="producto_id" name="producto_id" class="form-control">
                @foreach ($productos as $producto)
                <option value="{{ $producto->id }}" {{ $producto->id == $existencia->producto_id ? 'selected' : '' }}>
                    {{ $producto->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select id="proveedor_id" name="proveedor_id" class="form-control">
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ $proveedor->id == $existencia->proveedor_id ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label">Existencia</label>
            <input type="number" id="existencia" name="existencia" class="form-control" value="{{ $existencia->existencia }}" required>
        </div>
        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de Venta</label>
            <input type="text" id="precio_venta" name="precio_venta" class="form-control" value="{{ $existencia->precio_venta }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('rutaEntrada') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection