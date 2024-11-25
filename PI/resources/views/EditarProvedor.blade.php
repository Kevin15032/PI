@extends('layouts.nav')

@section('contenido')

<div class="container py-4">
    <h1 class="text-center mb-4">Editar Proveedor</h1>
    <form action="{{ route('actualizarProveedor', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $proveedor->nombre }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" value="{{ $proveedor->email }}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="{{ $proveedor->telefono }}">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ $proveedor->direccion }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
    </form>
</div>


@endsection