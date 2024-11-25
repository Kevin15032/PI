<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ExistenciasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ConfiguracionController; 

// Rutas básicas
Route::get('/',[ControladorVistas::class,'sesion'])->name('rutaSesion');
Route::get('/inicio',[ControladorVistas::class,'inicio'])->name('rutaInicio');
Route::get('/inventario',[ControladorVistas::class,'inventario'])->name('rutaInventario');
Route::get('/usuarios', [ControladorVistas::class, 'usuario'])->name('rutaUsuarios');

// Rutas de configuración
Route::get('/configure/{id}/edit', [ConfiguracionController::class, 'edit'])->name('rutaEditarEmpresa');
Route::put('empresa/actualizar/{id}', [ConfiguracionController::class, 'update'])->name('rutaActualizarEmpresa');
Route::get('/configure', [ConfiguracionController::class, 'index'])->name('rutaConfigure');

// Gestión de productos
Route::get('/productos', [ProductosController::class, 'index'])->name('rutaProductos');
Route::get('/productos/crear', [ProductosController::class, 'create'])->name('rutaNuevoProducto');
Route::post('/productos', [ProductosController::class, 'store'])->name('guardarProducto');
Route::get('/productos/{id}/editar', [ProductosController::class, 'edit'])->name('editarProducto');
Route::put('/productos/{id}', [ProductosController::class, 'update'])->name('actualizarProducto');
Route::delete('/productos/{id}', [ProductosController::class, 'destroy'])->name('eliminarProducto');

// Proveedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('rutaProveedores');
Route::get('/proveedores/crear', [ProveedoresController::class, 'create'])->name('nuevoProveedor');
Route::post('/proveedores', [ProveedoresController::class, 'store'])->name('guardarProveedor');
Route::get('/proveedores/{id}/editar', [ProveedoresController::class, 'edit'])->name('editarProveedor');
Route::put('/proveedores/{id}', [ProveedoresController::class, 'update'])->name('actualizarProveedor');
Route::delete('/proveedores/{id}', [ProveedoresController::class, 'destroy'])->name('eliminarProveedor');

// Categorías
Route::get('/categorias', [CategoriasController::class, 'index'])->name('rutaCategorias');
Route::get('/categorias/crear', [CategoriasController::class, 'create'])->name('rutaNewcategoria');
Route::post('/categorias', [CategoriasController::class, 'store'])->name('guardarCategoria');
Route::get('/categorias/{id}/editar', [CategoriasController::class, 'edit'])->name('editarCategoria');
Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('actualizarCategoria');
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('eliminarCategoria');

// Ventas
Route::get('/ventas', [VentasController::class, 'index'])->name('rutaVentas');
Route::get('/ventas/nueva', [VentasController::class, 'create'])->name('rutaNuevaVenta');
Route::post('/ventas', [VentasController::class, 'store'])->name('guardarVenta');
Route::delete('/ventas/{id}', [VentasController::class, 'destroy'])->name('eliminarVenta');

// Existencias
Route::get('/entrada', [ExistenciasController::class, 'index'])->name('rutaEntrada');
Route::get('/entrada/crear', [ExistenciasController::class, 'create'])->name('rutaNuevaExistencia');
Route::post('/entrada', [ExistenciasController::class, 'store'])->name('guardarExistencia');
Route::get('/entrada/{id}/editar', [ExistenciasController::class, 'edit'])->name('rutaEditarExistencia');
Route::put('/entrada/{id}', [ExistenciasController::class, 'update'])->name('actualizarExistencia');
Route::patch('/entrada/{id}/ajustar', [ExistenciasController::class, 'ajustar'])->name('ajustarExistencia');
Route::delete('/entrada/{id}', [ExistenciasController::class, 'destroy'])->name('eliminarExistencia');

// Usuarios
Route::get('usuarios', [UsersController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/create', [UsersController::class, 'create'])->name('usuarios.create');
Route::post('usuarios', [UsersController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit', [UsersController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}', [UsersController::class, 'update'])->name('usuarios.update');
Route::delete('usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
?>
