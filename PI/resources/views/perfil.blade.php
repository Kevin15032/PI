@extends('layouts.nav')

@section('contenido')
<div class="max-w-2xl mx-auto p-4">
  <div class="border rounded-lg shadow-md bg-white">
    <div class="p-4 border-b">
      <h2 class="text-xl font-semibold flex justify-between items-center">
        Perfil de Usuario
        <!-- Botón para editar -->
        <button onclick="toggleEdit()" class="border p-2 rounded-full hover:bg-gray-100">
          ✏️
        </button>
      </h2>
    </div>
    <div class="p-4" id="profile-view">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="text-muted-foreground">Nombre</label>
          <p class="text-lg" id="user-name">Diego Carmona Bernal</p>
        </div>
        <div>
          <label class="text-muted-foreground">Correo electrónico</label>
          <p class="text-lg" id="user-email">carmonabernaldiego@gmail.com</p>
        </div>
        <div>
          <label class="text-muted-foreground">Rol</label>
          <p class="text-lg" id="user-role">Superadministrador</p>
        </div>
      </div>
    </div>

    <!-- Formulario para editar -->
    <form id="profile-edit" class="hidden p-4 space-y-4" onsubmit="saveChanges(event)">
      <div class="space-y-2">
        <label for="name" class="text-muted-foreground">Nombre</label>
        <input id="name" name="name" type="text" class="border p-2 rounded w-full" value="Diego Carmona Bernal" required>
      </div>
      <div class="space-y-2">
        <label for="email" class="text-muted-foreground">Correo electrónico</label>
        <input id="email" name="email" type="email" class="border p-2 rounded w-full" value="carmonabernaldiego@gmail.com" required>
      </div>
      <div class="space-y-2">
        <label for="role" class="text-muted-foreground">Rol</label>
        <input id="role" name="role" type="text" class="border p-2 rounded w-full" value="Superadministrador" required>
      </div>
      <div class="space-y-2">
        <label for="password" class="text-muted-foreground">Contraseña</label>
        <input id="password" name="password" type="password" class="border p-2 rounded w-full" value="********" required>
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="cancelEdit()" class="border p-2 rounded bg-gray-200 hover:bg-gray-300">
          Cancelar
        </button>
        <button type="submit" class="border p-2 rounded bg-blue-500 text-white hover:bg-blue-600">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function toggleEdit() {
    document.getElementById('profile-view').classList.add('hidden');
    document.getElementById('profile-edit').classList.remove('hidden');
  }

  function cancelEdit() {
    document.getElementById('profile-edit').classList.add('hidden');
    document.getElementById('profile-view').classList.remove('hidden');
  }

  function saveChanges(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const role = document.getElementById('role').value;

    document.getElementById('user-name').textContent = name;
    document.getElementById('user-email').textContent = email;
    document.getElementById('user-role').textContent = role;

    cancelEdit();
  }
</script>
@endsection
