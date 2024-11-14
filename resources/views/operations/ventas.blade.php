@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="container mt-4">
    <div class="row">
        <!-- Card para Registrar Venta -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Registrar Venta</h5>
                </div>
                <div class="card-body">
                    <p>Utiliza este formulario para registrar una nueva venta en el sistema.</p>

                    <a href="{{ route('ventas.registrar') }}" class="btn btn-primary">
                        Registrar Nueva Venta
                    </a>
                </div>
            </div>
        </div>

        <!-- Card para Listar Ventas -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5>Listar Ventas</h5>
                </div>
                <div class="card-body">
                    <p>Consulta las ventas realizadas. Aquí podrás ver todos los detalles de cada venta registrada en el sistema.</p>
                    <a href="{{ route('ventas.listar') }}" class="btn btn-success">
                        Ver Listado de Ventas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
