@extends('layouts.navsesion')

@section('title', 'Iniciar Sesión - Inventario')

@section('content')
<div class="card shadow-lg" style="width: 100%; max-width: 400px;">
  <div class="card-body">
    <h4 class="text-center mb-4">Iniciar Sesión</h4>
    <form action="{{route('login.submit')}}" method="POST" onsubmit="mostrarSweetAlert(event)">
      @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Ingresa tu nombre de usuario" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
    </form>
  </div>
</div>
<script>
  function mostrarSweetAlert(event) {
    event.preventDefault();
    Swal.fire({
      title: '¡Bienvenido!',
      text: 'Inicio de sesión exitoso',
      icon: 'success',
      confirmButtonText: 'OK'
    });
  }
</script>
@endsection
