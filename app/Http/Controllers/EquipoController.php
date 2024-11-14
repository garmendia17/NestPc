<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function search (Request $request){
        $query=$request->input('search');

        $equipos=Equipo::where('nombre', 'like', '%' .$query . '%')
        ->get(['nombre', 'modelo', 'stock']);

        return view('layouts.search_results', compact('equipos'));
    }
}
