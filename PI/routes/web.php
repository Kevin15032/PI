<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\configuracionController;

// Route::view('/','sesion')->name('rutaSesion');
// Route::view('/inicio','inicio')->name('rutaInicio');
// Route::view('/ventas','ventas')->name('rutaVentas');
// Route::view('/inventario','inventario')->name('rutaInventario');
// Route::view('/reporte','reporte')->name('rutaReportes');
// Route::view('/usuarios','usuarios')->name('rutaUsuarios');

Route::get('/', [ControladorVistas::class, 'sesion'])->name('sesion');
Route::post('/login', [ControladorVistas::class, 'login'])->name('login');
Route::get('/inicio', [ControladorVistas::class, 'inicio'])->name('rutaInicio')->middleware('auth');
Route::get('/ventas',[ControladorVistas::class,'ventas'])->name('rutaVentas');
Route::get('/inventario',[ControladorVistas::class,'inventario'])->name('rutaInventario');
// Route::get('/reporte',[ControladorVistas::class,'reporte'])->name('rutaReportes');
Route::get('/usuarios', [ControladorVistas::class, 'usuario'])->name('rutaUsuarios');

Route::get('/categoria', [ControladorVistas::class, 'categoria'])->name('rutaCategorias');
Route::get('/productos', [ControladorVistas::class, 'productos'])->name('rutaProductos');

Route::get('/proveedores', [ControladorVistas::class, 'proveedores'])->name('rutaProveedores');

Route::get('/perfil', [ControladorVistas::class, 'perfil'])->name('rutaPerfil');
Route::get('/configure', [configuracionController::class, 'index'])->name('rutaConfigure');


// Route::get('/createU', [ControladorVistas::class, 'crearusuario'])->name('usuarios.create');
// Route::get('/edit/{id}', [ControladorVistas::class, 'editarusuario'])->name('usuarios.edit');


//Ruta Reportes

// sesion
// Route::post('/sesion',[ControladorVistas::class,'ValidadorSesion'])->name('rutaReportes'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
