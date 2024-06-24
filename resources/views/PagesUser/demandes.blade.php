
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="fullcalendar.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href="../css/User.css" rel="stylesheet">
</head>
<body></body>

@extends('layout.appveto')

@section('content')
    <div class="container">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Demandes de Rendez-vous</div>

                    <div class="card-body">
                        @if ($demandes->isEmpty())
                            <p>Aucune demande de rendez-vous pour le moment.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Utilisateur</th>
                                        <th>Animal</th>
                                        <th>Âge</th>
                                        <th>Sexe</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Actions</th>
                                        <th>note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $demande)
                                        <tr>
                                            <td>{{ $demande->user->name }}</td>
                                            <td>{{ $demande->pet->Nom }}</td>
                                            <td>{{ $demande->pet->Age }}</td>
                                            <td>{{ $demande->pet->Sexe }}</td>
                                            <td>{{ $demande->date }}</td>
                                            <td>{{ $demande->heure }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('rdv.accept', $demande->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Accepter</button>
                                                </form>
                                                <form method="POST" action="{{ route('rdv.refuse', $demande->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Refuser</button>
                                                </form>
                                            </td>
                                            <td>
                            <form action="{{ route('demandes.remarque', $demande->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="remarque" rows="3" placeholder="Ajouter une remarque"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter Remarque</button>
                        </form>
                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    th, td {
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
