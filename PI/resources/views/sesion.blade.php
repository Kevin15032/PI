<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - Inventario</title>
  @vite(['resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center vh-100">
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
</body>
</html>
