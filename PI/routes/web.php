<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;

// Route::view('/','sesion')->name('rutaSesion');
// Route::view('/inicio','inicio')->name('rutaInicio');
// Route::view('/ventas','ventas')->name('rutaVentas');
// Route::view('/inventario','inventario')->name('rutaInventario');
// Route::view('/reporte','reporte')->name('rutaReportes');
// Route::view('/usuarios','usuarios')->name('rutaUsuarios');

Route::get('/', [ControladorVistas::class, 'sesion'])->name('sesion');
Route::post('/login', [ControladorVistas::class, 'login'])->name('login.submit');
Route::get('/inicio',[ControladorVistas::class,'inicio'])->name('rutaInicio');
Route::get('/ventas',[ControladorVistas::class,'ventas'])->name('rutaVentas');
Route::get('/inventario',[ControladorVistas::class,'inventario'])->name('rutaInventario');
// Route::get('/reporte',[ControladorVistas::class,'reporte'])->name('rutaReportes');
Route::get('/usuarios',[ControladorVistas::class,'usuario'])->name('rutaUsuarios');

//Ruta Reportes
Route::get('/reporte/create',[reporteController::class,'create'])->name('rutaReportes');
// sesion
// Route::post('/sesion',[ControladorVistas::class,'ValidadorSesion'])->name('rutaReportes'); 
