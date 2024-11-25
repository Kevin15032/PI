@extends('layouts.nav')

@section('contenido')
<div class="container py-4">
    <h1 class="text-center mb-4">Agregar Nuevo Proveedor</h1>
    <form action="{{ route('guardarProveedor') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del proveedor">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" placeholder="Email del proveedor">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono del proveedor">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="Dirección del proveedor">
        </div>
        <button type="submit" class="btn btn-success">Guardar Proveedor</button>
    </form>
</div>

@endsection