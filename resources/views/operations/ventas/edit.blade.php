@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Venta</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar -->

        <!-- Nombre del cliente -->
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" value="{{ $venta->nombre_cliente }}" required>
        </div>

        <!-- Selección de producto -->
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" {{ $venta->producto_id == $producto->id ? 'selected' : '' }}>
                        {{ $producto->nombre }} - Precio: ${{ $producto->precio }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Cantidad de productos -->
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $venta->cantidad }}" required>
        </div>

        <!-- Precio total (se calculará automáticamente) -->
        <div class="form-group">
            <label for="total">Precio Total</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ $venta->total }}" readonly>
        </div>

        <!-- Botón para calcular el precio total -->
        <div class="form-group">
            <button type="button" id="calcularTotal" class="btn btn-primary">Calcular Precio Total</button>
        </div>

        <!-- Botón para actualizar la venta -->
        <button type="submit" class="btn btn-success">Actualizar Venta</button>
    </form>
</div>

<script>
    document.getElementById('calcularTotal').addEventListener('click', function() {
        // Obtener el precio del producto seleccionado
        var productoSelect = document.getElementById('producto_id');
        var precioProducto = productoSelect.options[productoSelect.selectedIndex].text.split('Precio: $')[1];

        // Obtener la cantidad de productos
        var cantidad = document.getElementById('cantidad').value;

        // Calcular el total
        var total = parseFloat(precioProducto) * parseInt(cantidad);

        // Asignar el total al campo de precio total
        document.getElementById('total').value = total;
    });
</script>
@endsection
