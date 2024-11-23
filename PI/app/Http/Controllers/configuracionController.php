<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;


class configuracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $consultaEmpresas = DB::table('empresas')->get();
        return view('configuracion', compact('consultaEmpresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Configuracion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $empresa = DB::select('select * from empresas where id =' . $id);
        return view('actualizarEmpresa', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validadorEmpresa $request, string $id)
    {
        DB::table('empresa')->where('id', $id)->update([
            "nombreEmpresa" => $request->input('nombreEmpresa'),
            "telefonoEmpresa" => $request->input('telefonoEmpresa'),
            "direccionEmpresa" => $request->input('direccionEmpresa'),
            "updated_at" => Carbon::now(),
        ]);
        $empresa = $request->input('nombreEmpresa');
        session()->flash('Exito', 'Se actualizó la empresa: ' . $empresa);
        return redirect()->route('rutaEmpresas'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
