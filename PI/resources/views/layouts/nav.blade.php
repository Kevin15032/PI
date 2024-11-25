<!DOCTYPE html>
<html lang="es">
<head>
    {{-- Nav para Mi Tienda --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>@yield('titulo')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('rutaVentas') || request()->routeIs('rutaEntrada') ? 'text-warning' : '' }}" 
                            href="#" 
                            id="dropdownGestionProductos" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-boxes fa-lg text-primary"></i>
                                <span class="small">Gestión de Existencias</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownGestionProductos">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('rutaEntrada') ? 'text-warning' : '' }}" href="{{ route('rutaEntrada') }}">
                                    Entrada
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('rutaVentas') ? 'text-warning' : '' }}" href="{{ route('rutaVentas') }}">
                                    Venta
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('rutaCategorias') || request()->routeIs('rutaProductos') || request()->routeIs('rutaProveedores') ? 'text-warning' : '' }}" 
                            href="#" 
                            id="dropdownGestionProductos" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-boxes fa-lg text-primary"></i>
                                <span class="small">Gestión Productos</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownGestionProductos">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('rutaCategorias') ? 'text-warning' : '' }}" href="{{ route('rutaCategorias') }}">
                                    Categorías
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('rutaProductos') ? 'text-warning' : '' }}" href="{{ route('rutaProductos') }}">
                                    Productos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('rutaProveedores') ? 'text-warning' : '' }}" href="{{ route('rutaProveedores') }}">
                                    Proveedores
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('usuarios.index') ? 'text-warning' : '' }}" href="{{ route('usuarios.index') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-users fa-lg text-primary"></i>
                                <span class="small">Gestión Usuarios</span>
                            </div>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaPerfil') ? 'text-warning' : '' }}" href="{{ route('rutaPerfil') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-user-circle fa-lg text-primary"></i>
                                <span class="small">Perfil</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutaConfigure') ? 'text-warning' : '' }}" href="{{ route('rutaConfigure') }}">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fas fa-user-circle fa-lg text-primary"></i>
                                <span class="small">Configuración</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    @yield('contenido')
</body>
</html>


