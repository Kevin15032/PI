<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidadorUserManagement;


class UserController extends Controller
{
    public function index()
    {
        $consultausermanagement=DB::table('_user_management')->get();
        return view('usuario',compact('consultausermanagement'));
    }
    public function create()
    {
        return view('nuevousuario');
    }
    public function store(ValidadorUserManagement $request)
    {
        DB::table('_user_management')->insert([
        "nombre"=>$request->input('txtnombre'),
        "correo"=>$request->input('txtcorreo'),
        "rol"=>$request->rol,
        "created at"=>Carbon::now(),
        "updated at"=>Carbon::now(),
        ]);
        $usuario=$request->input('txtnombre');
        session()->flash('exito','Se guardo el usuario: ');
        return to_route('rutaAgregar');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $cliente = DB::table('_user_management')->find($id);
    return view('updateusuario', compact('usuario'));}

public function update(Request $request, $id){
    $validated = $request->validate([
        'txtnombre' => 'required|min:4|max:20',
        'txtcorreo' => 'required|email|max:50',
        'txtrol' => 'required|numeric|digits:10',
    ]);

    DB::table('_user_management')->where('id', $id)->update([
        'nombre' => $validated['txtnombre'],
        'apellido' => $validated['txtapellido'],
        'correo' => $validated['txtcorreo'],
        'rol' => $validated['txtrol'],
        'updated_at' => Carbon::now(),
    ]);
    return redirect()->route('rutaUsuarios')->with('exito', 'Usuario actualizado correctamente.');
}

    /**
     * Eliminar usuario
     */
    public function destroy(string $id)
    {
    DB::table('_user_management')->where('id', $id)->delete();

    session()->flash('exito', 'Se eliminó el usuario.');
    return redirect()->route('rutaUsuarios');
}

}