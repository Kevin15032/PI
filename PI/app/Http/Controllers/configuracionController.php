<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use App\Http\Requests\validardorEmpresa;


class configuracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $empresa = DB::table('empresas')->get();
        return view('Configuracion', compact('empresa'));
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
        return view('ActualizarConfig', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validardorEmpresa $request, string $id)
    {
        DB::table('empresas')->where('id', $id)->update([
            "nombreEmpresa" => $request->input('txtnombre'),
            "telefonoEmpresa" => $request->input('txttelefono'),
            "direccionEmpresa" => $request->input('txtdireccion'),
            "updated_at" => Carbon::now(),
        ]);
        $empresa = $request->input('txtnombre');
        session()->flash('Exito', 'Se actualizó la empresa: ' . $empresa);
        return to_route('rutaConfigure');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
