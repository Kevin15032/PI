<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $existencias = DB::table('existencias')
            ->join('categorias', 'existencias.categoria_id', '=', 'categorias.id')
            ->join('productos', 'existencias.producto_id', '=', 'productos.id')
            ->join('proveedores', 'existencias.proveedor_id', '=', 'proveedores.id')
            ->select('existencias.*', 'categorias.nombre as categoria', 'productos.nombre as producto', 'proveedores.nombre as proveedor')
            ->get();

        return view('entrada', compact('existencias'));
    }

    public function create()
    {
        $categorias = DB::table('categorias')->get();
        $productos = DB::table('productos')->get();
        $proveedores = DB::table('proveedores')->get();

        return view('nuevaExistencia', compact('categorias', 'productos', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'proveedor_id' => 'required|integer',
            'existencia' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        DB::table('existencias')->insert([
            'categoria_id' => $request->input('categoria_id'),
            'producto_id' => $request->input('producto_id'),
            'proveedor_id' => $request->input('proveedor_id'),
            'existencia' => $request->input('existencia'),
            'precio_venta' => $request->input('precio_venta'),
            'fecha_entrada' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

       
    session()->flash('exito', "Se creó la existencia exitosamente.");

    return to_route('rutaEntrada');
    }

    public function edit($id)
    {
        $existencia = DB::table('existencias')->where('id', $id)->first();
        $categorias = DB::table('categorias')->get();
        $productos = DB::table('productos')->get();
        $proveedores = DB::table('proveedores')->get();

        return view('editarExistencias', compact('existencia', 'categorias', 'productos', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'proveedor_id' => 'required|integer',
            'existencia' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        DB::table('existencias')->where('id', $id)->update([
            'categoria_id' => $request->input('categoria_id'),
            'producto_id' => $request->input('producto_id'),
            'proveedor_id' => $request->input('proveedor_id'),
            'existencia' => $request->input('existencia'),
            'precio_venta' => $request->input('precio_venta'),
            'updated_at' => Carbon::now(),
        ]);

        session()->flash('exito', "Se actualizó la existencia exitosamente.");

        return to_route('rutaEntrada');
    }

    public function ajustar(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer',
            'accion' => 'required|string|in:agregar,quitar',
        ]);

        $existencia = DB::table('existencias')->where('id', $id)->first();

        $nuevaCantidad = $request->accion === 'agregar'
            ? $existencia->existencia + $request->cantidad
            : $existencia->existencia - $request->cantidad;

        DB::table('existencias')->where('id', $id)->update([
            'existencia' => max(0, $nuevaCantidad),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('rutaEntrada')->with('mensaje', 'Existencia ajustada correctamente.');
    }

    public function destroy($id)
    {
        DB::table('existencias')->where('id', $id)->delete();

        return redirect()->route('rutaEntrada')->with('mensaje', 'Existencia eliminada correctamente.');
    }
}
