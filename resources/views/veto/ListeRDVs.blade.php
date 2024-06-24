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
<body>
   
@extends('Layout.app')

@section('content')
<div class="container">
    <h1 class="text-center">Ma liste des rendez-vous</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Nom Animal</th>
                <th>Age</th>
                <th>Espèce</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Status</th>
                <th>Remarque</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rendezVs as $rendezV)
            <tr>
                <td>{{ $rendezV->id }}</td>
                <td>{{ $rendezV->user ? $rendezV->user->name : 'Utilisateur non trouvé' }}</td>
                <td>{{ $rendezV->pet ? $rendezV->pet->Nom : 'Animal non trouvé' }}</td>
                <td>{{ $rendezV->pet ? $rendezV->pet->Age : 'Animal non trouvé' }}</td>
                <td>{{ $rendezV->pet ? $rendezV->pet->Espèce : 'Animal non trouvé' }}</td>
                <td>{{ $rendezV->date }}</td>
                <td>{{ $rendezV->heure }}</td>
                <td>{{ $rendezV->status }}</td>
                <td>{{ $rendezV->remarque }}</td>
                <td>
                    <form action="{{ route('RDVs.reject', $rendezV->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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

form {
    display: inline;
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
