<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="fullcalendar.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <link href="../css/User.css" rel="stylesheet">

    
  <title>les resultats de recherches  </title>
</head>
<body>
@extends('layout.app')

@section('content')
<h1>le resultat de recherche pour ...</h1>
<div class="container">

<h2 class="q"> "{{ $query }}"</h2>
    @if($vetos->isEmpty())
        <p class="psearch">Désolé, il n'existe pas de vétérinaires correspondant à cette localisation.</p>
        <img class="search" src="../images/search.gif" alt="">
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro de téléphone</th>
                    <th>Nom du cabinet</th>
                    <th>Heures de travail</th>
                    <th>Frais de consultation</th>
                    <th>Localisation</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Voir le profil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vetos as $veto)
                <tr>
                    <td>{{ $veto->id }}</td>
                    <td>{{ $veto->nom }}</td>
                    <td>{{ $veto->prenom }}</td>
                    <td>{{ $veto->numtel }}</td>
                    <td>{{ $veto->nom_cabinet }}</td>
                    <td>{{ $veto->heure_travail }}</td>
                    <td>{{ $veto->frais_consultation }}</td>
                    <td>{{ $veto->localisation }}</td>
                    <td>{{ $veto->description }}</td>
                    <td>
                        @if($veto->image)
                            <img src="{{ asset('uploads/Vetos/'.$veto->image) }}" alt="Image du vétérinaire">
                        @endif
                    </td>
                    <td><a href="{{ route('veto.showProfile', $veto->id) }}" class="profil">Voir profil</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

<style>
  .table-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(100vh - 100px);
    padding: 20px;
    margin-top: 120px;
    margin-left: 200px;
  }

  
  th,
  td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #8d5e63;
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

  .profil {
    background-color: green;
    border-radius: 15px;
    height: 40px;
    width: 100px;
    color: white;
    text-align: center;
    line-height: 40px;
    text-decoration: none;
  }

  td img {
    max-width: 100px;
    max-height: 100px;
  }
  .psearch{
    margin-left: 150px;
    color: #8d5e63; /* Couleur du texte */
           
            font-family: 'Arial', sans-serif; /* Police du texte */
            font-size: 18px; /* Taille du texte */
            font-weight: bold; /* Poids du texte */
            letter-spacing: 1px; /* Espacement entre les lettres */
  }
  .q{
    margin-left: 400px;
    color: #8d5e63; /* Couleur du texte */
           
            font-family: 'Arial', sans-serif; /* Police du texte */
            font-size: 36px; /* Taille du texte */
            font-weight: bold; /* Poids du texte */
            letter-spacing: 1px; /* Espacement entre les lettres */
  }
  .search{

    position:center;
    width: 400px;
    height: 400px;
     margin-left: 400px;
  }
</style>
</style>
</html>