
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="../css/User.css" rel="stylesheet">
    <title>Liste des vétérinaires approuvés</title>
</head>

<body>
    @extends('layout.appsveto')

    @section('content')
       <!-- resources/views/PagesUser/listveto.blade.php -->


    <div id="content-container" class="container">
        <div class="content">
            <div class="containerP">
            
                <h2>Liste des Vétérinaires </h2>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                
            @if ($vetos->isEmpty())
            <h2 class="q"> "{{ $query }}"</h2>
                    <div class="alert alert-warning mt-3">
                        Désolé, il n'existe pas un vétérinaire avec ces informations.
                        
                    </div>
                    <img class="search" src="../images/search.gif" alt="">
                    @else
                
                    
                
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Numéro de téléphone</th>
                                <th>Nom du cabinet</th>
                                <th>Heures de travail</th>
                        
                                <th>Localisation</th>
                                <th>Description</th>
                                <th>Prendre rendez-vous</th>
                                <th>Voir le profil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vetos as $veto)
                                <tr>
                                   
                                    <td>{{ $veto->nom }}</td>
                                    <td>{{ $veto->prenom }}</td>
                                    <td>{{ $veto->numtel }}</td>
                                    <td>{{ $veto->nom_cabinet }}</td>
                                    <td>{{ $veto->heure_travail }}</td>
                                    
                                    <td>{{ $veto->localisation }}</td>
                                    <td>{{ $veto->description }}</td>
                                    <td>
                                        @if($veto->image)
                                        <a href="{{ route('veto.showProfile', $veto->id) }}" class="">   <img src="{{ asset('uploads/Vetos/' . $veto->image) }}" alt="Image du vétérinaire"></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('rdv.prrdv', ['veto_id' => $veto->id]) }}">Prendre rendez-vous</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
</body>
<style>
.search{

position:center;
width: 400px;
height: 400px;
 margin-left: 400px;
}
</style>
</html>

