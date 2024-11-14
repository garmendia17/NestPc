@extends('layouts.app') {{-- Asegúrate de que 'app' sea tu layout principal --}}

@section('content')
<div class="container">
    <div class="row">
        <!-- Card de Facturación -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Facturación</h4>
                </div>
                <div class="card-body">
                    <p>Aquí puedes gestionar el proceso de facturación de las ventas registradas en el sistema.</p>
                    <a href="{{ route('facturas.registrar') }}" class="btn btn-primary">Ir a Facturación</a> <!-- Enlace para ir al módulo de facturación -->
                </div>
            </div>
        </div>

        <!-- Card de Listado de Facturas -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Listado de Facturas</h4>
                </div>
                <div class="card-body">
                    <p>Utiliza esta opción para ver todas las facturas registradas en el sistema.</p>
                    <a href="{{ route('facturas.listar') }}" class="btn btn-success">Ver Facturas</a> <!-- Enlace para ver la lista de facturas -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
