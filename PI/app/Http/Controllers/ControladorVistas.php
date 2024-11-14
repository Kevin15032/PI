<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorVenta; 
use  App\Http\Requests\ValidadorSesion;


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

    public function ValidadorSesion( ValidadorSesion $peticion)
    {

    $usuario = $peticion->input('username');
    session()->flash('exito','Vienvenido de nuevo'. $usuario);

      return to_route('rutaInicio');
    }
    

}
