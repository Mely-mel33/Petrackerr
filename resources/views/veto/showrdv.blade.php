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

<h1 class="text-center">Liste des Rendez-vous</h1>
@
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
</body>