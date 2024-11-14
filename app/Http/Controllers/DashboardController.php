<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\models\Factura;
use App\models\Venta;

class DashboardController extends Controller
{
    public function index(){
        $equiposPorMarca=Equipo::selectRaw('nombre as marca, SUM(stock) as cantidad')
        ->groupBy('nombre')
        ->get();

        $marcas=$equiposPorMarca->pluck('marca')->toArray();
        $cantidades=$equiposPorMarca->pluck('cantidad')->toArray();

        
        $ventasPorMes=venta::selectRaw('MONTH(created_at) as mes, SUM(total) as ganancias')
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();

        $meses=$ventasPorMes->pluck('mes')->toArray();
        $ganancias=$ventasPorMes->pluck('ganancias')->toArray();
        

        return view('auth.dashboard', compact('marcas', 'cantidades', 'meses', 'ganancias'));	
    }
}
