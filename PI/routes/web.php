<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UsersController;

// Route::view('/','sesion')->name('rutaSesion');
// Route::view('/inicio','inicio')->name('rutaInicio');
// Route::view('/ventas','ventas')->name('rutaVentas');
// Route::view('/inventario','inventario')->name('rutaInventario');
// Route::view('/reporte','reporte')->name('rutaReportes');
// Route::view('/usuarios','usuarios')->name('rutaUsuarios');

Route::get('/',[ControladorVistas::class,'sesion'])->name('rutaSesion');
Route::get('/inicio',[ControladorVistas::class,'inicio'])->name('rutaInicio');

// ventas
Route::get('/ventas',[ControladorVistas::class,'ventas'])->name('rutaVentas');
Route::post('/buscar-producto', [VentasController::class, 'buscarProducto'])->name('buscarProducto');
Route::post('/agregar-al-carrito', [VentasController::class, 'agregarAlCarrito'])->name('agregarAlCarrito');
Route::post('/eliminar-del-carrito', [VentasController::class, 'eliminarDelCarrito'])->name('eliminarDelCarrito');
Route::post('/cancelar-venta', [VentasController::class, 'cancelarVenta'])->name('cancelarVenta');
Route::post('/finalizar-venta', [VentasController::class, 'finalizarVenta'])->name('finalizarVenta');
// validador de sesion
Route::post('/sesion',[ControladorVistas::class,'ValidadorSesion']);

Route::get('/inventario',[ControladorVistas::class,'inventario'])->name('rutaInventario');
Route::get('/reporte',[ControladorVistas::class,'reporte'])->name('rutaReportes');

// usuarios
Route::get('/usuarios', [UsersController::class,'usuario'])->name('rutaUsuarios');
Route::get('/usuarios/crear', [UsersController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsersController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/editar', [UsersController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsersController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
