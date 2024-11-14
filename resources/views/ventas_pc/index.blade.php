@extends('layouts.app')

@section('title', 'index')

@section('content')

    <h1>Listado de Ventas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Cliente</th>
                <th>Producto ID</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí deberías iterar sobre las ventas -->
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->nombre_cliente }}</td>
                    <td>{{ $venta->producto_id }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->total }}</td>
                    <td>
                        <!-- Acciones, como editar o eliminar -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
