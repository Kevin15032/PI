<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #003366;
      color: white;
    }
    .titulo-inventario {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 30px; 
      display: flex;
      align-items: center;
      color: white;
      justify-content: center; 
      margin-top: 50px; 
    }
    .titulo-inventario i {
      font-size: 30px;
      margin-right: 10px;
    }
    .card {
      border-radius: 15px;
      overflow: hidden;
      background: #fff;
      color: #333;
    }
    .card-body {
      padding: 30px;
    }
    .btn-primary {
      background-color: #ff66b2;
      border-color: #ff66b2;
    }
    .btn-primary:hover {
      background-color: #ff3385;
      border-color: #ff3385;
    }
    .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="titulo-inventario">
      <i class="bi bi-box"></i> 
      <span>Inventario</span>
    </div>
    <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
      <div class="card-body">
        <h4 class="text-center mb-4">Iniciar Sesión</h4>
        <form action="{{ route('login.submit') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" placeholder="Correo electrónico" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" placeholder="Contraseña" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" id="remember" name="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Recuérdame</label>
          </div>
          <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
        @error('login')
        <div class="error">{{ $message }}</div>
        @enderror
      </div>
    </div>
  </div>
</body>
</html>