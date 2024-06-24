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

<body></body>

@extends('layout.app')

@section('content')
    <div id="content-container" class="container">
        <div class="content">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Demandes de Rendez-vous</div>

                        <div class="card-body">

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
                                            <td>{{ $demande->status }}</td>
                                            <td>{{ $demande->remarque }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    </body>
    <style>


    </style>

</html>
