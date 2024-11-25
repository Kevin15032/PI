@extends('layouts.nav')

@section('contenido')
    <div class="mx-4">
        <br>
        <h3>Crear usuario</h3>
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <div class="mb-3">
                <label for="role_id" class="form-label">Rol</label>
                <select class="form-select @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>
@endsection
