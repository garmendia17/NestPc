
@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Dashboard</h1>
        </div>

        <!-- Tarjeta para el total de equipos -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Distribución de Equipos de Cómputo por Marca</h4>
                </div>
                <div class="card-body">
                    <canvas id="equiposPorMarcaChart"></canvas> <!-- Contenedor del gráfico de pastel -->
                </div>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('equiposPorMarcaChart').getContext('2d');
            const equiposPorMarcaChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($marcas),
                    datasets: [{
                        data: @json($cantidades),
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });
        });
    </script>

        <!-- Gráfico de barras para las ganancias -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Ganancias Totales por Mes</h4>
                </div>
                <div class="card-body">
                    <canvas id="gananciasChart"></canvas> <!-- Contenedor del gráfico -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtener los datos de ganancias y meses desde PHP
    const meses = @json($meses);
    const ganancias = @json($ganancias);

    // Crear el gráfico de barras
    const ctx = document.getElementById('gananciasChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: meses.map(mes => new Date(0, mes - 1).toLocaleString('es', { month: 'long' })), // Convertir números de mes a nombres
            datasets: [{
                label: 'Ganancias Totales ($)',
                data: ganancias,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Ganancias en USD'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Mes'
                    }
                }
            }
        }
    });
</script>
@endsection
