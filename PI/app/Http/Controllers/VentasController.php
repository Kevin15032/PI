<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = DB::table('ventas')
            ->join('productos', 'ventas.producto_id', '=', 'productos.id')
            ->select('ventas.*', 'productos.nombre as producto_nombre')
            ->get();

        return view('ventas', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = DB::table('categorias')->get();
        $productos = DB::table('productos')->get();

        return view('nuevaventa', compact('categorias', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'monto_total' => 'required|numeric|min:0',
        ]);

        DB::table('ventas')->insert([
            'fecha' => $request->input('fecha'),
            'producto_id' => $request->input('producto'),
            'cantidad' => $request->input('cantidad'),
            'monto_total' => $request->input('monto_total'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('rutaVentas')->with('success', 'Venta registrada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ventas')->where('id', $id)->delete();

        return redirect()->route('rutaVentas')->with('success', 'Venta eliminada con éxito.');
    }
}