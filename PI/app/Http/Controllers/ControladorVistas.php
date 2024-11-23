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
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('rutaInicio')->with('success', 'Sesión iniciada correctamente');
        }

        return back()->withErrors(['login' => 'Credenciales incorrectas'])->withInput();
    }

    // Otras vistas
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