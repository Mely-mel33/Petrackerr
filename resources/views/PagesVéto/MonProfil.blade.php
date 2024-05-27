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

    <link href="css/User.css" rel="stylesheet">
   

    @extends('Layout.appveto')

@section('content')
    
    <title>Profil veto</title>
</head>
<body>
<div class="profile-container">
<div class="profile-header">
        <div class="profile-info">
            <h1>{{ $veto->nom }} {{ $veto->prenom }}</h1>
        </div>
        <div class="profile-img">
            <img src="{{ asset('uploads/Vetos/'.$veto->image) }}" alt="Profile Picture">
        </div>
    </div>
    <div class="profile-body">
        <div class="profile-details">
            <h1>mes infos</h1>
            <ul>
              
                <li><strong>numero de telephone:</strong> {{ $veto->numtel }} </li>
                <li><strong>nom de la clinique:</strong>{{$veto->nom_cabinet}}  </li>
                <li><strong>l'heure de travail:</strong> {{ $veto->heure_travail}}</li>
                <li><strong>Localisation:</strong> {{$veto->localisation }}</li></li>
            </ul>
            <a href="{{ route('veto.edit', ['id' => $veto->id]) }}" class="modifier">modifier profil</a>
        </div>
        <div class="profile-footer">
            <h2> la description</h2>
            <p>{{$veto->description}}</p>
        </div>
    </div>
</div>
    

@endsection  
  
</body>
<style>
.profile-container {
    max-width: 800px;
    height: 550px;
    margin: auto;
    margin-top: 160px;
    background: #d1d0;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    background-color:  #dddd;
    color: black;
    text-align: center;
  
}

.profile-header {
    display: flex;
    flex-direction: column; /* Pour empiler les éléments verticalement */
    align-items: center; /* Pour centrer les éléments horizontalement */
    border-bottom: 1px solid #eaeaea;
    padding-bottom: 20px;
    padding-top: 20px; /* Ajout de padding en haut pour séparer du contenu précédent */
    border-radius: 30px;
    background-color: #8d5e63;
}


.profile-info {
    margin-bottom: 10px; /* Espace entre le nom/prénom et l'image */
}
.profile-img img {
    max-width: 200px;
    max-height: 200px;
    border-radius: 50%;
}


.profile-info p {
    margin: 5px 0 0;
    font-size: 16px;
    color: #000;
}
.modifier{
background-color: green;
border-radius: 15px;
height: 120px;
width: 120px;

   


}

.profile-body {
    width: 100%;
}

.profile-details {
    width: 100%;
}

.profile-details h2 {
    margin-top: 0;
    font-size: 20px;
    color: #333;
}

.profile-details ul {
    list-style: none;
    padding: 0;
}

.profile-details ul li {
    margin-bottom: 10px;
    font-size: 16px;
    color: #555;
    position: center;
}

.profile-details ul li strong {
    font-weight: 600;
}
.profile-footer {
    width: 100%;
    border-top: 1px solid #eaeaea;
    padding-top: 20px;
    margin-top: 20px;
    text-align: center;
    background-color:black ;
    border-radius: 20px;
    height: 100px;
}

.profile-footer h2 {
    font-size: 20px;
    color: white;
}

.profile-footer p {
    font-size: 16px;
    color: white;
    line-height: 1.5;
}

</style>
 


</html>