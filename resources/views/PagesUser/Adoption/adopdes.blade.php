<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="fullcalendar.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href="../css/User.css" rel="stylesheet">
</head>

<body>

    @extends('Layout.app')

    @section('content')
        <div class="container">
            <div class="content">
                <h1 class="text-center">Liste des adoption</h1>

                @if ($adoptions->isEmpty())
                    <p>Aucune demande d'adoption.</p>
                @else
                    @if (session('success'))
                        <div class="alert alert-success text-center custom-alert">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger text-center custom-alert">{{ session('error') }}</div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom de l'animal</th>
                                <th>Nom complet</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>decision</th>
                                <th>note</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adoptions as $adoption)
                                <tr>
                                    <td>{{ $adoption->pet->Nom }}</td>
                                    <td>{{ $adoption->full_name }}</td>
                                    <td>{{ $adoption->phone }}</td>
                                    <td>{{ $adoption->address }}</td>

                                    <td>{{ $adoption->status }}</td>
                                    <td>{{ $adoption->remarque }}</td>





                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        @endif
    @endsection

</body>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        margin-top: 20px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #8d5e63;
        color: white;
    }

    th:first-child {
        border-top-left-radius: 8px;
    }

    th:last-child {
        border-top-right-radius: 8px;
    }

    tr:last-child td:first-child {
        border-bottom-left-radius: 8px;
    }

    tr:last-child td:last-child {
        border-bottom-right-radius: 8px;
    }

    .btn {
        padding: 5px 10px;
        font-size: 14px;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>

</html>
