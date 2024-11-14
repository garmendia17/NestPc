@extends('layouts.app')

@section('title', 'Create Products')

@section('content')
    <h1 class="mb-0">Add Product</h1>
    <hr>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del equipo" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="modelo" class="form-control" placeholder="Modelo del equipo" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <input type="text" name="estado" class="form-control" placeholder="Estado" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="number" name="stock" class="form-control" placeholder="Stock" required min="0">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <input type="text" name="precio" class="form-control" placeholder="Precio" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-grid">
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </div>
        </div>
    </form>
@endsection
