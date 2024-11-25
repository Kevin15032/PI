@extends('layouts.nav')

@section('contenido')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Crear usuario</h2>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
        </div>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>1</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
                            </form>
                        </td>


                    </tr>
                @endforeach

                <!-- Más filas aquí si es necesario -->
            </tbody>
        </table>
    </div>
@endsection
