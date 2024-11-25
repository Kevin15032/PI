<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = DB::table('productos')->get();
        return view('Productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = DB::table('categorias')->get(); 
        return view('nuevoProducto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255|unique:productos,nombre',
            'detalles' => 'required|string|max:500',
        ]);

        DB::table('productos')->insert([
            'categoria_id' => $request->input('categoria_id'),
            'nombre' => $request->input('nombre'),
            'detalles' => $request->input('detalles'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        session()->flash('exito', 'Se guardó el producto: ' . $request->input('nombre'));
        return to_route('rutaProductos');
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
        $producto = DB::table('productos')->where('id', $id)->first();
        $categorias = DB::table('categorias')->get();
        return view('EditarProducto', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255|unique:productos,nombre,' . $id,
            'detalles' => 'required|string|max:500',
        ]);

        DB::table('productos')->where('id', $id)->update([
            'categoria_id' => $request->input('categoria_id'),
            'nombre' => $request->input('nombre'),
            'detalles' => $request->input('detalles'),
            'updated_at' => Carbon::now(),
        ]);

        session()->flash('exito', 'El producto ' . $request->input('nombre') . ' fue actualizado correctamente.');
        return to_route('rutaProductos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('productos')->where('id', $id)->delete();
        session()->flash('exito', 'El producto fue eliminado correctamente.');
        return to_route('rutaProductos');
    }
}

