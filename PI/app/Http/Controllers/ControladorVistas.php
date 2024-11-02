<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorVenta; 

class ControladorVistas extends Controller
{
    public function sesion()
    {
        return view('sesion');
    }

    public function inicio()
    {
        return view('inicio');
    }

    public function inventario()
    {
        return view('inventario');
    }

    public function reporte()
    {
        return view('reporte');
    }

    public function usuario()
    {
        return view('usuarios');
    }

    public function ventas()
    {
        return view('ventas');
    }

    public function buscarProducto(Request $request)
    {
        $request->validate([
            'busqueda' => 'required|string|max:255',
        ]);

        $productos = [
            (object) ['nombre' => 'Producto 1', 'precio' => 10, 'stock' => 5],
            (object) ['nombre' => 'Producto 2', 'precio' => 20, 'stock' => 3],
            (object) ['nombre' => 'Producto 3', 'precio' => 30, 'stock' => 10],
        ];

        $resultados = collect($productos)->filter(function($producto) use ($request) {
            return stripos($producto->nombre, $request->busqueda) !== false;
        });

        if ($resultados->isEmpty()) {
            return redirect()->route('rutaVentas')->with('advertencia', 'No se encontraron resultados.');
        }

        return view('ventas', compact('resultados'));
    }
}
