<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ConfiguracionController;

// Rutas básicas
Route::get('/', [ControladorVistas::class, 'sesion'])->name('sesion');
Route::post('/login', [ControladorVistas::class, 'login'])->name('login');
Route::get('/inicio', [ControladorVistas::class, 'inicio'])->name('rutaInicio')->middleware('auth');

// Rutas de gestión de usuarios
Route::get('/usuarios', [ControladorVistas::class, 'index'])->name('rutaUsuarios'); // Vista principal
Route::get('/usuarios/crear', [UserManagementController::class, 'create'])->name('rutaEnviar'); // Mostrar formulario
Route::post('/usuarios', [UserManagementController::class, 'store'])->name('rutaEnviar'); // Guardar usuario
Route::get('/usuarios/{id}/editar', [UserManagementController::class, 'edit'])->name('rutaEditar'); // Editar usuario
Route::put('/usuarios/{id}', [UserManagementController::class, 'update'])->name('rutaActualizar');
Route::delete('/usuarios/{id}', [UserManagementController::class, 'destroy'])->name('rutaEliminar'); // Eliminar usuario

// Rutas adicionales
Route::get('/ventas', [ControladorVistas::class, 'ventas'])->name('rutaVentas');
Route::get('/inventario', [ControladorVistas::class, 'inventario'])->name('rutaInventario');
Route::get('/productos', [ControladorVistas::class, 'productos'])->name('rutaProductos');
Route::get('/proveedores', [ControladorVistas::class, 'proveedores'])->name('rutaProveedores');
Route::get('/perfil', [ControladorVistas::class, 'perfil'])->name('rutaPerfil');