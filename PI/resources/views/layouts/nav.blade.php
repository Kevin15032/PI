<!DOCTYPE html>
<html lang="es">
<head>
    {{-- Nav para Mi Tienda --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>@yield('titulo')</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('rutaInicio') }}">
                <span class="text-primary fs-4 fw-semibold">Mi Tienda</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaInicio') ? 'text-warning' : '' }}" href="{{ route('rutaInicio') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-tachometer-alt fa-lg text-primary"></i>
                                <span class="small">Inicio</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaVentas') ? 'text-warning' : '' }}" href="{{ route('rutaVentas') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-shopping-cart fa-lg text-primary"></i>
                                <span class="small">Ventas</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaInventario') ? 'text-warning' : '' }}" href="{{ route('rutaInventario') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-box fa-lg text-primary"></i>
                                <span class="small">Inventario</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaReportes') ? 'text-warning' : '' }}" href="{{ route('rutaReportes') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-chart-bar fa-lg text-primary"></i>
                                <span class="small">Reportes</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaUsuarios') ? 'text-warning' : '' }}" href="{{ route('rutaUsuarios') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-users fa-lg text-primary"></i>
                                <span class="small">Gestión Usuarios</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('contenido')

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>