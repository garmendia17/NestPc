@extends('layouts.app')

@section('title', 'create')

@section('content')

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="producto_id">ID del Producto</label>
            <input type="number" name="producto_id" id="producto_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" name="total" id="total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>

@endsection
