<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
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

    public function agregarAlCarrito(Request $request)
    {
    $carrito = session()->get('carrito', []);

    $producto = [
        'nombre' => $request->nombre,
        'precio' => $request->precio,
        'cantidad' => 1,
        'subtotal' => $request->precio,
    ];

    // Si el producto ya está en el carrito, incrementa la cantidad
    if (isset($carrito[$request->nombre])) {
        $carrito[$request->nombre]['cantidad']++;
        $carrito[$request->nombre]['subtotal'] = $carrito[$request->nombre]['precio'] * $carrito[$request->nombre]['cantidad'];
    } else {
        $carrito[$request->nombre] = $producto;
    }

    session()->put('carrito', $carrito);

    return redirect()->route('rutaVentas')->with('exito', 'Producto agregado al carrito.');
}


public function eliminarDelCarrito(Request $request)
{
    $carrito = session()->get('carrito', []);

    if (isset($carrito[$request->nombre])) {
        unset($carrito[$request->nombre]);
        session()->put('carrito', $carrito);
    }

    return redirect()->route('rutaVentas')->with('exito', 'Producto eliminado del carrito.');
}

    public function cancelarVenta()
    {
    session()->forget('carrito');
    return redirect()->route('rutaVentas')->with('advertencia', 'La venta ha sido cancelada.');
    }

    public function finalizarVenta()
    {
    $carrito = session()->get('carrito', []);
    $total = collect($carrito)->sum('subtotal');
    session()->forget('carrito');
    return redirect()->route('rutaVentas')->with('exito', 'La venta se ha completado. Total: $' . number_format($total, 2));
    }
}
