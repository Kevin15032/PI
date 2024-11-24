<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon; 
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
        session()->flash('exito','Se guardo el usuario: '.$usuario);
        return to_route('rutaAgregar');
    }

}
