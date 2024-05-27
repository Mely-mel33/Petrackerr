<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/User.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
</head>
<body>
    @extends('layout.app')

    @section('content')
    <div id="content-container" class="container">
        <div class="content">
            <h1 style="text-align: center">Dashboard</h1>
            <div class="Dashboard">
                <canvas id="signalementsChart"></canvas>
                <canvas id="animauxAjoutesChart"></canvas>
            </div>
        </div>
    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/api/signalements-par-semaine')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('signalementsChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.weeks,
                            datasets: [{
                                label: 'Nombre de Signalements',
                                data: data.totals,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });

               
        fetch('/api/getAnimauxAjoutesParMois')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('animauxAjoutesChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Animaux Ajoutés',
                            data: data.totals,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    });
        
    </script>
</body>
</html>
