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
   
@extends('Layout.appveto')

@section('content')
<h1 class="text-center">Liste des Rendez-vous</h1>
@if(session('success'))
    <div class="alert alert-success text-center custom-alert">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger text-center custom-alert">{{ session('error') }}</div>
@endif
<div class="container">

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
                <th>Actions</th>
                <th>Remarque</th>
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
                    <td class="actions-column">
                        <div class="action-buttons">
                            <form action="{{ route('RDVs.approve', $rendezV->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                            </form>
                            <form action="{{ route('RDVs.reject', $rendezV->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                            </form>
                        </div>
                    </td>
                            <td>
                            <form action="{{ route('RDVs.remarque', $rendezV->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="remarque" rows="3" placeholder="Ajouter une remarque"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter Remarque</button>
                        </form>
                        </td>
                        </div>
                    
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



/*.table {
    border-collapse: collapse;
    width: 90%; /* Augmente la largeur du tableau */
   /* min-width: 800px;   /* Définit une largeur minimale pour le tableau */
    /*background-color: #f9f9f9;
    border-radius: 10px;
    overflow: hidden;
  
   
    table-layout: auto; /* Les cellules s'ajustent à leur contenu */


th, td {
    border: 1px solid #ccc;
    padding: 10px; /* Augmente le padding pour plus d'espace */
    text-align: left;
    word-wrap: break-word; /* Permet de gérer les mots longs */
}

th {
    background-color: #8d5e63;
    color: white;
}

th:first-child {
    border-top-left-radius: 12px;
}

th:last-child {
    border-top-right-radius: 12px;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 12px;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 12px;
}

td img {
    max-width: 200px;
    max-height: 200px;
}

form {
    display: inline;
}

.alert {
    margin-top: 20px; /* Ajoute un espace entre le message de succès et le contenu au-dessus */
}

.custom-alert {
    width: 50%; /* Ajustez la largeur selon vos besoins */
    margin: 80px auto; /* Centre le message de succès horizontalement et ajoute un espace en haut */
}

.action-buttons {
    display: flex;
    justify-content: space-around;
}

.action-buttons form {
    margin: 0;
}
</style>
</html>