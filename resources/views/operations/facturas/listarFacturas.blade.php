@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Facturas</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ $factura->cliente->nombre ?? 'Cliente no encontrado' }}</td> <!-- Ajusta 'nombre' según el campo en tu tabla de clientes -->
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->monto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
