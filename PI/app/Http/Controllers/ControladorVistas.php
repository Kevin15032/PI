<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorVenta; 
use  App\Http\Requests\ValidadorSesion;
use App\Http\Requests\validadorEmpresa;



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
        // return view('reporte');
    }

    public function usuario()
    {
        return view('usuario');
    }
    
    // public function categoria()
    
    //     return view('categorias');
    // }

    public function productos()
    {
        
        return view('productos');
    }

    public function proveedores()
    {
        return view('provedores');
    }
    public function ventas()
    {
        return view('ventas');
    }

    public function perfil()
    {
        return view('perfil');
        
    }
    // public function configure()
    // {
    //     // return view('Configuracion');
    // }

    //Gestion de productos
    public function gestionP()
    {
        return view('gestionProductos');
    }

    public function nuevacategoria()
    {
        //return view('nuevacategoria');
    }

    public function EntradaProductos() {
        return view('Entrada');
    }

    public function ValidadorSesion( ValidadorSesion $peticion)
    {

    $usuario = $peticion->input('username');
    session()->flash('exito','Vienvenido de nuevo'. $usuario);

      return to_route('rutaInicio');
    }
    

}
