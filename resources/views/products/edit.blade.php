@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <h1 class="mb-0">Edit Product</h1>
    <hr>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $product->nombre }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="{{ $product->modelo }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" placeholder="Estado" value="{{ $product->estado }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" placeholder="Stock" value="{{ $product->stock }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control" placeholder="Precio" value="{{ $product->precio }}">
            </div>
        </div>
        <div class="row pa-10">
            <div class="d-grid">
                <button class="btn btn-warning">Actualizar registro</button>
            </div>
        </div>
    </form>
@endsection
