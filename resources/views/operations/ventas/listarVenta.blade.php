@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Ventas</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->nombre_cliente }}</td>
                <td>{{ $venta->producto->nombre }}</td>
                <td>{{ $venta->cantidad }}</td>
                <td>{{ $venta->total }}</td>
                <td>{{ $venta->created_at }}</td>
                <td>
                    <!-- Botón para editar -->
                    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-primary btn-sm">Editar</a>

                    <!-- Formulario para eliminar -->
                    <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta venta?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
