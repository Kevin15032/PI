
@extends('layouts.nav') 
@section('contenido') 

{{-- inicia Tarjeta con formulario --}}
{{-- @dump($id) --}}

<div class="container mt-5 col-md-6">
  @if(session('exito'))
    <x-Alert tipo="success">{{ session('exito') }}</x-Alert>
    @endif
    @session('exito')
    <x-Alert tipo="warning">{{ $value }}</x-Alert>
    @endsession

    @session('exito')
    {! <script> 
      Swal.fire({
     title: "Respuesta servidor!",
    text: "{{ $value }}",
    icon: "success"});
    </script> !}
    @endsession

<div class="card font-monospace">

    <div class="card-header fs-5 text-center text-primary">
       Editar Nuevo Usuario
    </div>

    <div class="card-body text-justify ">

      <form action="{{route('rutaActualizar')}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" name="txtnombre" value="{{old('txtnombre')}}">
          <small class="text-danger fst-italic">{{ $errors->first('txtnombre') }}</small>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label"> Correo Electrónico: </label>
          <input type="text" class="form-control" name="txtcorreo" value="{{old('txtcorreo')}}">
          <small  class="text-danger fst-italic">{{ $errors->first('txtcorreo') }}</small>
        </div>
        <div class="mb-3">
          <label for="rol" class="form-label">Rol: </label>
          <select class="form-select" id="rol" name="txtrol" required>
            <option value="Superadministrador">Superadministrador</option>
            <option value="Administrador">Administrador</option>
            <option value="Usuario">Usuario</option>
        </select>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Guardar Usuario
        </button>
        <button type="button" class="btn btn-secondary">
            <i class="bi bi-x-circle"></i> Cancelar
        </button>
      </form>
    </div>
  </div>
</div>

{{-- Finaliza Tarjeta con formulario --}}

@endsection