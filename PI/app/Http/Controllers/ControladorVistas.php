<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importar Auth
use App\Http\Requests\ValidadorSesion;

class ControladorVistas extends Controller
{
    public function sesion()
    {
        return view('sesion');
    }
    public function login(ValidadorSesion $request)
{
    if ($request->username === 'admin' && $request->password === 'admin123') {
        return redirect()->route('rutaInicio')->with('exito', 'Sesión iniciada correctamente');
    }
    return back()->withErrors(['login' => 'Credenciales incorrectas'])->withInput();
}


    public function inicio()
    {
        return view('inicio');
    }

    public function inventario()
    {
        return view('inventario');
    }

    public function usuario()
    {
        return view('usuario');
    }
    
    public function categoria()
    {
        return view('categorias');
    }

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

    public function ValidadorSesion( ValidadorSesion $peticion)
    {

    $usuario = $peticion->input('username');
    session()->flash('exito','Vienvenido de nuevo'. $usuario);

      return to_route('rutaInicio');
    }
    

}
