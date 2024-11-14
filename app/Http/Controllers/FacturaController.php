<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use App\models\Venta;
use GuzzleHttp\Exception\ClientException;

class FacturaController extends Controller
{
    public function index()
    {
        return view('operations.facturas.registrar');
    }

    public function factura()
    {
        return view('operations.facturas');
    }    
    

    public function listar()
    {
        $facturas = Factura::with('cliente')->get();
        return view('operations.facturas.listarFacturas', compact('facturas'));
    }

    public function create() {
        $ventas=Venta::with('cliente')->get();

        return view('operations.facturas.registrarFactura', compact('ventas'));
    }

    public function registrarFactura()
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
    
        return view('operaciones.facturas.registrarFactura', compact('clientes'));
    }
    

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre_cliente' => 'required|date',
            'monto_total' => 'required|numeric',
        ]);
    
        // Crear la factura
        Factura::create($validatedData);
    
        return redirect()->route('facturas.listar')->with('success', 'Factura registrada con éxito.');
    }
    

}
