<?php

use Illuminate\Support\Facades\Route;


Route::view('/','sesion')->name('rutaSesion');
Route::view('/inicio','inicio')->name('rutaInicio');
Route::view('/ventas','ventas')->name('rutaVentas');
Route::view('/inventario','inventario')->name('rutaInventario');
Route::view('/reporte','reporte')->name('rutaReportes');
Route::view('/usuarios','usuarios')->name('rutaUsuarios');