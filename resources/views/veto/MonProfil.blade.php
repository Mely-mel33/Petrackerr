<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="fullcalendar.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href="{{ asset('css/User.css') }}" rel="stylesheet">
    @extends('Layout.appveto')
    @section('content')
    <title>Profil veto</title>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-img">
                <img src="{{ asset('uploads/Vetos/'.$veto->image) }}" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h1>{{ $veto->nom }} {{ $veto->prenom }}</h1>
            </div>
        </div>
        <div class="profile-body">
            <div class="profile-details">
                <h1>mes infos</h1>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Nom:</strong> {{ $veto->nom }} {{ $veto->prenom }}</li>
                            <li><strong>Heure de travail:</strong> {{ $veto->heure_travail}}</li>
                            <li><strong>Localisation:</strong> {{$veto->localisation }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><strong>numero de telephone:</strong> {{ $veto->numtel }} </li>
                            <li><strong>l'email:</strong> {{ Auth::user()->email }} </li>
                            <li><strong>nom de cabinet:</strong> {{ $veto->nom_cabinet}} </li>

                        </ul>
                    </div>
                </div>
                <a href="{{ route('veto.edit', ['id' => $veto->id]) }}" class="modifier"> <img src="../images/user.png"> <stong>modifier informations</stong></a>
            </div>
            <div class="profile-footer">
                <h2>La description</h2>
                <p>{{$veto->description}}</p>
            </div>
        </div>
    </div>
@endsection  
</body>
<style>
        body {
        background-color: #f1f1f1;
        display: flex;
      
        min-height: 100vh;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .profile-container {
        width: 100%;
        max-width: 900px; /* Largeur du profil plus grande */
        max-height: 800px;
        margin: auto;
        background: #dddd;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        color: black;
        text-align: center;
        margin-top: 150px;
        margin-left: 400px;
    }

    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px 0;
        background-color: #8d5e63;
        border-radius: 10px 10px 0 0;
    }

    .profile-img img {
        max-width: 100px;
        max-height: 100px;
        border-radius: 50%;
    }

    .profile-info {
        margin-top: 10px;
    }

    .profile-info h1 {
        font-size: 1.5em;
        margin: 0;
    }

    

    .profile-body {
        padding: 10px;
    }

    .profile-details {
        width: 100%;
        margin: auto;
    }

    .profile-details h1 {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .profile-details ul {
        list-style: none;
        padding: 0;
        margin: 10px 0;
    }

    .profile-details ul li {
        margin-bottom: 5px;
        font-size: 1.1em; /* Taille de la police plus grande */
        color: #555;
    }

    .profile-details ul li strong {
        font-weight: 600;
    }

    .profile-footer {
        padding: 10px;
        background-color: black;
        border-radius: 0 0 10px 10px;
        margin-top: 20px; /* Ajout de marge supérieure */
    }

    .profile-footer h2 {
        font-size: 1.2em;
        color: white;
        margin: 0;
    }

    .profile-footer p {
        font-size: 1.1em; /* Taille de la police plus grande */
        color: white;
        line-height: 1.5;
    }
</style>
</html>
