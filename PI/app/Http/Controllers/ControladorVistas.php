<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorVenta; 

class ControladorVistas extends Controller
{
    public function sesion()
    {
        return view('sesion');
    }

    public function inicio()
    {
        return view('inicio');
    }

    public function inventario()
    {
        return view('inventario');
       
    }
    public function reporte()
    {
        return view('reporte');
    }
    public function usuario()
    {
        return view('usuarios');
    }
    public function ventas()
    {
        return view('ventas');
    }
    public function buscarProducto(validadorVenta $request)
    {
    $busqueda = $request->input('busqueda');

    $resultados = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
    return view('ventas', compact('resultados'))->with('message', 'Búsqueda realizada con éxito.');}
}