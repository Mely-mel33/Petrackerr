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
  <title>prendre rdv</title>
</head>
<body>
@extends('layout.appsveto')

@section('content')
<div class="container">
    <h1>Prendre Rendez-vous pour ton animal</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('Prendrdv.store') }}" method="POST">
        @csrf
        <input type="hidden" name="pet_id" value="{{ $pet->id }}">

        
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required value="{{ Auth::user()->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required value="{{ Auth::user()->email }}" readonly>
        </div>
        @if(isset($pet))
        <div class="form-group">
            <label for="Nom">Nom de l'animal :</label>
            <input type="text" id="pet_Nom" name="pet_Nom" value="{{ $pet->Nom }}" readonly>
        </div>
        <div class="form-group">
            <label for="Espèce">Espèce :</label>
            <input type="text" id="pet_Espèce" name="animal_espece" value="{{ $pet->Espèce }}" readonly>
        </div>
        <div class="form-group">
            <label for="Age">Âge :</label>
            <input type="text" id="pet_Age" name="animal_age" value="{{ $pet->Age }} ans" readonly>
        </div>
        @endif
        <div class="form-group">
            <label for="date">Date de rendez-vous :</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="heure">Heure de rendez-vous :</label>
            <input type="time" id="heure" name="heure" required>
        </div>
       
        <div class="form-group">
            <label for="veterinaire_location">Localisation du Cabinet :</label>
            <input type="text" id="veterinaire_location" name="veterinaire_location" required placeholder="Location du cabinet">
        </div>

        <div class="form-group">
            <label for="veterinaire_nom">Nom du Vétérinaire :</label>
            <input type="text" id="veterinaire_nom" name="veterinaire_nom" required placeholder="Nom du vétérinaire">
        </div>


        <button type="submit" class="btn btn-primary">Prendre Rendez-vous</button>
        <a href="{{ route('ListeRDVs', ['petId' => $pet->id]) }}" class="">Consulter ma liste de rdv</a>
    </form>
</div>
@endsection

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 500px;
    margin: 50px auto;
    margin-top: 150px;
    background: #fffa;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h2, h1 {
    color: #8d5e63;
    text-align: center;
    margin-bottom: 20px;
}
.form-group {
    margin-bottom: 15px;
}
.form-group label {
    display: block;
    margin-bottom: 5px;
}
.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
.form-group textarea {
    resize: vertical;
}
.form-group button {
    width: 100%;
    padding: 10px;
    background-color: #8d5e63;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.form-group button:hover {
    background-color: #7b4f53;
}
</style>
</body>
</html>


