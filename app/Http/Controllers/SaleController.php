<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Venta; 
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Método para mostrar la página de ventas
    public function ventas()
    {
        // Este método debe retornar la vista de ventas
        return view('operations.ventas'); // Ajusta la ruta de la vista según corresponda
    }

    // Método para mostrar el formulario de registrar venta
    public function create()
    {
        $productos = Product::all(); // Obtener todos los productos
        return view('operations.ventas.registrarVenta', compact('productos'));
    }
    

    // Método para almacenar la venta
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'producto_id' => 'required|exists:products,id',
            'cantidad' => 'required|integer',
            'total' => 'required|numeric',
        ]);

        // Crear la venta en la base de datos
        Venta::create([
            'nombre_cliente' => $validatedData['nombre_cliente'],
            'producto_id' => $validatedData['producto_id'],
            'cantidad' => $validatedData['cantidad'],
            'total' => $validatedData['total'],
        ]);

        // Redirigir a la página de listado de ventas con un mensaje de éxito
        return redirect()->route('ventas.listar')->with('success', 'Venta registrada con éxito.');
    }

    // Método para listar las ventas
    public function index()
    {
        $ventas = Venta::all(); // Obtén todas las ventas

        return view('operations.ventas.listarVenta', compact('ventas')); // Ruta ajustada para la vista
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id); // Buscar la venta por ID
        $productos = Product::all(); // Obtener los productos para mostrarlos en el formulario

        return view('operations.ventas.edit', compact('venta', 'productos'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'producto_id' => 'required|exists:products,id',
            'cantidad' => 'required|integer',
            'total' => 'required|numeric',
        ]);
    
        // Encontrar la venta por su ID
        $venta = Venta::findOrFail($id);
    
        // Actualizar la venta con los nuevos datos
        $venta->update($validatedData);
    
        // Redireccionar a la lista de ventas con un mensaje de éxito
        return redirect()->route('ventas.listar')->with('success', 'Venta actualizada con éxito.');
    }
    

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.listar')->with('success', 'Venta eliminada con éxito.');
    }


}
