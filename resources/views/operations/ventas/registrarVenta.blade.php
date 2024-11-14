@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Registrar Venta de Equipo
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('ventas.guardar') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre_cliente">Nombre del Cliente</label>
                    <input type="text" name="nombre_cliente" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="producto_id">Equipo de Cómputo</label>
                    <select name="producto_id" id="producto_id" class="form-control" required>
                        <option value="">Selecciona un equipo</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                                {{ $producto->nombre }} - ${{ $producto->precio }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" name="total" id="total" class="form-control" readonly>
                </div>

                <button type="button" id="calcularTotal" class="btn btn-primary">Calcular Total</button>

                <button type="submit" class="btn btn-success">Registrar Venta</button>
            </form>

        </div>
    </div>
</div>
<script>
    document.getElementById('calcularTotal').addEventListener('click', function () {
        // Obtener el precio del equipo seleccionado
        const productoSelect = document.getElementById('producto_id');
        const productoSeleccionado = productoSelect.options[productoSelect.selectedIndex];
        const precio = productoSeleccionado.getAttribute('data-precio');

        // Obtener la cantidad
        const cantidad = document.getElementById('cantidad').value;

        // Calcular el total
        const total = precio * cantidad;

        // Mostrar el total en el campo correspondiente
        document.getElementById('total').value = total ? total.toFixed(2) : 0;
    });
</script>

@endsection
