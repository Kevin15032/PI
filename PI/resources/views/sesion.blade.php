<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  @vite(['resources/js/app.js'])
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
  
  <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
    <div class="card-header text-center">
      <h4 class="card-title mb-1">Iniciar Sesión</h4>
      <p class="card-text text-muted">Accede al sistema POS</p>
    </div>
    
    <div class="card-body">
      <form id="loginForm">
        <div class="mb-3">
          <label for="username" class="form-label">Nombre de usuario</label>
          <input type="text" class="form-control" id="username" placeholder="Ingresa tu nombre de usuario" required>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
        </div>
        
        <div id="errorAlert" class="alert alert-danger d-none" role="alert">
          Usuario o contraseña incorrectos
        </div>
        
        <button type="submit" class="btn btn-primary w-100" id="loginButton">Iniciar Sesión</button>
      </form>
    </div>
  </div>
</body>
</html>
