<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:4|max:50',
            'correo' => 'required|email|max:50',
            'rol' => 'required|in:Superadministrador,Administrador,Usuario',
        ]);
        $user = new User();
        $user->nombre = $validated['nombre'];
        $user->correo = $validated['correo'];
        $user->rol = $validated['rol'];
        $user->save();
        return redirect()->back()->with('exito', 'Usuario creado exitosamente.');
    }
}
