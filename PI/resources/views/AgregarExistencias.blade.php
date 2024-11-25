@extends('layouts.nav')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Modificar Existencia</h1>
    <p class="text-center"><strong>Producto:</strong> {{ $existencia->producto->nombre }}</p>
    <p class="text-center"><strong>Existencia Actual:</strong> {{ $existencia->existencia }}</p>

    <form action="{{ route('ajustarExistencia', $existencia->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad a Ajustar</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingresa la cantidad" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion" value="quitar" class="btn btn-danger">Quitar</button>
            <a href="{{ route('rutaEntrada') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
       
@endsection