<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/User.css" rel="stylesheet">

    <title>Mon profil</title>
</head>

<body>

    @extends('layout.app')
    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="petcontainer">
                    <h1>Profil de {{ Auth::user()->name }}</h1>
                    <div class="pet-profile">
                        @if (Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Photo de profil">
                        @else
                            <div class="placeholder-image">Aucune image</div>
                        @endif
                    </div>
                    <div class="pet-info">
                        <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                    </div>
                    <div class="pet-actions">
                        <a href="{{ route('profile.show') }}" class="modifier">Modifier mes
                            informations</a>
                    </div>
                </div>
                
            </div>
        </div>
    @endsection
</body>

</html>
