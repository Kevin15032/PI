@extends('layouts.navsesion')
@section('title', 'Registrar - Inventario')
@section('content')

<div class="card shadow-lg" style="width: 100%; max-width: 400px;">
  <div class="card-body">
    <h4 class="text-center mb-4">Registrar Usuario</h4>
    <form action="{{ route('register.submit') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nombre completo</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Ingresa tu nombre completo" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Elige un nombre de usuario" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Elige una contraseña segura" required>
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repite tu contraseña" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select id="role" name="role" class="form-select" required>
          <option value="" disabled selected>Selecciona tu rol</option>
          <option value="administrador">Administrador</option>
          <option value="usuario">Usuario</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success w-100">Registrar</button>
    </form>
  </div>
</div>
@endsection
