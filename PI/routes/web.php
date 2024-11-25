<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ExistenciasController;
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

Route::get('/inventario',[ControladorVistas::class,'inventario'])->name('rutaInventario');
// Route::get('/reporte',[ControladorVistas::class,'reporte'])->name('rutaReportes');
Route::get('/usuarios', [ControladorVistas::class, 'usuario'])->name('rutaUsuarios');


//gestion de productos
// Route::get('/categoria', [CategoriasController::class, 'create'])->name('rutaCategorias');



// Route::get('/newcategoria', [ControladorVistas::class, 'nuevacategoria'])->name('rutaNewcategoria');






Route::get('/perfil', [ControladorVistas::class, 'perfil'])->name('rutaPerfil');
Route::get('/configure', [ControladorVistas::class, 'configure'])->name('rutaConfigure');


// Route::get('/createU', [ControladorVistas::class, 'crearusuario'])->name('usuarios.create');
// Route::get('/edit/{id}', [ControladorVistas::class, 'editarusuario'])->name('usuarios.edit');


//Ruta Reportes

// sesion
Route::post('/sesion',[ControladorVistas::class,'ValidadorSesion'])->name('rutaReportes'); 


 //Gestion de productos
//Productos
Route::get('/productos', [ProductosController::class, 'index'])->name('rutaProductos'); // Vista principal
Route::get('/productos/crear', [ProductosController::class, 'create'])->name('rutaNuevoProducto'); // Formulario para crear
Route::post('/productos', [ProductosController::class, 'store'])->name('guardarProducto'); // Guardar nuevo producto
Route::get('/productos/{id}/editar', [ProductosController::class, 'edit'])->name('editarProducto'); // Formulario de edición
Route::put('/productos/{id}', [ProductosController::class, 'update'])->name('actualizarProducto'); // Actualizar producto
Route::delete('/productos/{id}', [ProductosController::class, 'destroy'])->name('eliminarProducto'); // Eliminar product

//Provedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('rutaProveedores');
Route::get('/proveedores/crear', [ProveedoresController::class, 'create'])->name('nuevoProveedor');
Route::post('/proveedores', [ProveedoresController::class, 'store'])->name('guardarProveedor');
Route::get('/proveedores/{id}/editar', [ProveedoresController::class, 'edit'])->name('editarProveedor');
Route::put('/proveedores/{id}', [ProveedoresController::class, 'update'])->name('actualizarProveedor');
Route::delete('/proveedores/{id}', [ProveedoresController::class, 'destroy'])->name('eliminarProveedor');


// Categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('rutaCategorias'); // Vista principal
Route::get('/categorias/crear', [CategoriasController::class, 'create'])->name('rutaNewcategoria'); // Formulario para crear
Route::post('/categorias', [CategoriasController::class, 'store'])->name('guardarCategoria'); // Guardar nueva categoría
Route::get('/categorias/{id}/editar', [CategoriasController::class, 'edit'])->name('editarCategoria'); // Formulario de edición
Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('actualizarCategoria'); // Actualizar categoría
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('eliminarCategoria'); // Eliminar categoría

//gestion de productos

//Ventas
Route::get('/ventas', [VentasController::class, 'index'])->name('rutaVentas');
Route::get('/ventas/nueva', [VentasController::class, 'create'])->name('rutaNuevaVenta');
Route::post('/ventas', [VentasController::class, 'store'])->name('guardarVenta');
Route::delete('/ventas/{id}', [VentasController::class, 'destroy'])->name('eliminarVenta');


//Entrada
Route::get('/entrada', [ExistenciasController::class, 'index'])->name('rutaEntrada'); // Vista principal
Route::get('/entrada/crear', [ExistenciasController::class, 'create'])->name('rutaNuevaExistencia'); // Vista para nueva existencia
Route::post('/entrada', [ExistenciasController::class, 'store'])->name('guardarExistencia'); // Guardar nueva existencia
Route::get('/entrada/{id}/editar', [ExistenciasController::class, 'edit'])->name('rutaEditarExistencia'); // Vista de edición
Route::put('/entrada/{id}', [ExistenciasController::class, 'update'])->name('actualizarExistencia'); // Actualizar existencia
Route::patch('/entrada/{id}/ajustar', [ExistenciasController::class, 'ajustar'])->name('ajustarExistencia'); // Ajustar cantidad
Route::delete('/entrada/{id}', [ExistenciasController::class, 'destroy'])->name('eliminarExistencia'); // Eliminar existencia

//usuarios
Route::get('usuarios', [UsersController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/create', [UsersController::class, 'create'])->name('usuarios.create');
Route::post('usuarios', [UsersController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit', [UsersController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}', [UsersController::class, 'update'])->name('usuarios.update');
Route::delete('usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');