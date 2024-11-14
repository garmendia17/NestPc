<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class OperationController extends Controller
{
    public function indexAction(){
        return view('operations.operacion');
    }

    public function crearVenta(){
        $productos = Product::all();

        return view('operations.ventas', compact('productos'));
    }

    // public function storeVenta(Request $request)
    // {
    //     // Validar y almacenar la venta
    //     $request->validate([
    //         'producto_id' => 'required|exists:productos,id',
    //         'cantidad' => 'required|integer|min:1',
    //     ]);

    //     // Aquí puedes guardar la venta en tu base de datos
    //     $venta = new Venta();
    //     $venta->producto_id = $request->producto_id;
    //     $venta->cantidad = $request->cantidad;
    //     $venta->fecha = now(); // Guarda la fecha actual automáticamente
    //     $venta->save();

    //     return redirect()->route('ventas.create')->with('success', 'Venta registrada exitosamente.');
    // }
}
