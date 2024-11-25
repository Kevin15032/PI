<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = DB::table('categorias')->get();
        return view('categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nuevacategoria');
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtnombreCategoria' => 'required|string|max:255|unique:categorias,nombre',
        ]);

        DB::table('categorias')->insert([
            'nombre' => $request->input('txtnombreCategoria'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $categoria = $request->input('txtnombreCategoria');
        session()->flash('exito', 'Se guardó la categoría: ' . $categoria);

        return to_route('rutaCategorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = DB::table('categorias')->where('id', $id)->first();
        return view('EditarCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'txtnombreCategoria' => 'required|string|max:255|unique:categorias,nombre,' . $id,
        ]);

        DB::table('categorias')->where('id', $id)->update([
            'nombre' => $request->input('txtnombreCategoria'),
            'updated_at' => Carbon::now(),
        ]);

        $categoria = $request->input('txtnombreCategoria');
        session()->flash('exito', 'La categoría ' . $categoria . ' fue actualizada correctamente.');

        return to_route('rutaCategorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categorias')->where('id', $id)->delete();
        session()->flash('exito', 'La categoría fue eliminada correctamente.');

        return to_route('rutaCategorias');
    }
}
