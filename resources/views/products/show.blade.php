@extends('layouts.app')

@section('title', 'show Product')

@section('content')
    <h1 class="mb-0">Detail Product</h1>
    <hr>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $product->nombre }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="{{ $product->modelo }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control" placeholder="Estado" value="{{ $product->estado }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Stock</label>
            <input type="text" name="stock" class="form-control" placeholder="Stock" value="{{ $product->stock }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Precio</label>
            <input type="text" name="precio" class="form-control" placeholder="Precio" value="{{ $product->precio }}" readonly>
        </div>
        <!-- <div class="col mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" readonly>{{ $product->description }}>
        </div> -->
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Fecha de Creación</label>
            <input type="text" name="created_at" class="form-control" placeholder="Fecha de Creación" value="{{ $product->created_at->format('d-m-Y H:i:s') }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Fecha de Actualización</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Fecha de Actualización" value="{{ $product->updated_at->format('d-m-Y H:i:s') }}" readonly>
        </div>
    </div>
@endsection