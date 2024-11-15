<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function usuario()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $roles = Roles::all();
        return view('usuarios.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:0,1',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status,
        ]);

        return redirect()->route('rutaUsuarios')->with('success', 'Usuario creado con éxito.');
    }


    public function edit($id)
    {
        $roles = Roles::all();
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:0,1',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'status' => $request->status,
            // Only update the password if a new one is provided
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('rutaUsuarios')->with('success', 'Usuario actualizado con éxito.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('rutaUsuarios')->with('success', 'Usuario eliminado con éxito.');
    }
}
