<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('create', compact('roles'));
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

        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
            'status' => $request->input('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');

    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $roles = DB::table('roles')->get();
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

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'status' => $request->input('status'),
            'updated_at' => now(),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');

    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');

    }
}

