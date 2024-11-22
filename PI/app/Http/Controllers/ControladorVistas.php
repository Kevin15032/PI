<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorVenta; 
use  App\Http\Requests\ValidadorSesion;


class ControladorVistas extends Controller
{
    public function loginForm()
    {
    return view('sesion');
    }   
    public function registerForm() {
    return view('registro'); 
    }
    public function register(ValidadorSesion $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }
    public function login(ValidadorSesion $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('home')->with('success', 'Sesión iniciada correctamente');
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

    public function reporte()
    {
        // return view('reporte');
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