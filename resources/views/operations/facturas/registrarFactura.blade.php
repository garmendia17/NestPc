@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Factura</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('facturas.guardar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($ventas as $venta)
                    <option value="{{ $venta->id }}">
                        {{ $venta->nombre_cliente }} <!-- Asegúrate de que este campo existe en tu tabla de ventas -->
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" name="monto" id="monto" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Factura</button>
    </form>
</div>
@endsection
