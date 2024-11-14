@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Resultados de la búsqueda</h2>

    @if($equipos->isEmpty())
        <p>No se encontraron equipos que coincidan con tu búsqueda.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cantidad Disponible</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->marca }}</td>
                        <td>{{ $equipo->modelo }}</td>
                        <td>{{ $equipo->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
