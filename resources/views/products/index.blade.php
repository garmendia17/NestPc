@extends('layouts.app')

@section('title', 'Home Product')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Stock</th>
                <th>Precio $</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count() > 0)
                @foreach($products as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nombre }}</td>
                        <td class="align-middle">{{ $rs->modelo }}</td>
                        <td class="align-middle">{{ $rs->estado }}</td>
                        <td class="align-middle">{{ $rs->stock }}</td>
                        <td class="align-middle">{{ $rs->precio }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('products.show', $rs->id) }}" class="btn btn-secondary" type="button">Detalles</a>
                                <a href="{{ route('products.edit', $rs->id)  }}" class="btn btn-warning" type="button">Editar</a>
                                <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
