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
        return view('usuarios');
    }

    public function ventas()
    {
        return view('ventas');
    }
}