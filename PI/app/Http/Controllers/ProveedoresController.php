<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = DB::table('proveedores')->get();
        return view('provedores', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nuevoProvedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedores,email',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
        ]);

        DB::table('proveedores')->insert([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('rutaProveedores')->with('exito', 'Proveedor creado con éxito.');
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
    public function edit(string $id)
    {
        $proveedor = DB::table('proveedores')->where('id', $id)->first();
        return view('EditarProvedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedores,email,' . $id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
        ]);

        DB::table('proveedores')->where('id', $id)->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('rutaProveedores')->with('exito', 'Proveedor actualizado con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('proveedores')->where('id', $id)->delete();

        return redirect()->route('rutaProveedores')->with('exito', 'Proveedor eliminado con éxito.');
    }
}
