<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/User.css" rel="stylesheet">

    <title>Pet Profil</title>
    <style>
       
    
        .note:nth-child(1) {
            background-color: #f7d2ef;
        }
    
        .note:nth-child(2) {
            background-color: #d5caf0;
        }
    
        .note:nth-child(3) {
            background-color: #e1f3c4;
        }
    
        .note:nth-child(4) {
            background-color: #f7dcdb;
        }
    
        .note:nth-child(5) {
            background-color: #c7d3e9;
        }
    
        .note:nth-child(6) {
            background-color: #978787;
        }
    
    </style>
</head>

<body>
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="petcontainer">
                    <h1>Profil de {{ $pet->Nom }}</h1>
                    <div class="pet-profile">
                        <img src="{{ asset('uploads/Pets/' . $pet->Image) }}" alt="{{ $pet->Nom }}">
                    </div>
                    <div class="pet-info">
                        <p><span>Nom :</span> {{ $pet->Nom }}</p>
                        <p><span>Espèce :</span> {{ $pet->Espèce }}</p>
                        <p><span>Race :</span> {{ $pet->Race }}</p>
                        <p><span>Âge :</span> {{ $pet->Age }}</p>
                        <p><span>Sexe :</span> {{ $pet->Sexe }}</p>
                        <p><span>Description :</span> {{ $pet->Description }}</p>
                    </div>
                    <div class="pet-actions">
                        <a href="{{ route('pet.edit', ['pet' => $pet->id]) }}" class="modifier">Modifier</a>
                        <a href="{{ route('pet.destroy', ['pet' => $pet->id]) }}"
                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                            class="supprimer">Supprimer</a>
                        <form id="delete-form" action="{{ route('pet.destroy', ['pet' => $pet->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>

                <div class="containerNote">
                    <h2>Notes de {{ $pet->Nom }}</h2>
                    <a href="{{ route('pet.planning', ['pet' => $pet->id]) }}" style="align-items: center;">
                        <img src="../images/icons/addn.png" alt="Ajouter une note">
                    </a>
                    <ul id="notes-list">
                        @foreach ($notes as $index => $note)
                            <li class="note note-{{ $index % 6 }}">
                                <div class="note-header">
                                    <strong>{{ $note->title }}</strong>
                                    <div class="note-actions">
                                        <a href="{{ route('pet.editnote', ['pet' => $pet->id, 'note' => $note->id]) }}">
                                            <img src="../images/icons/edit.png" alt="Editer">
                                        </a>
                                        <a href="{{ route('pet.destroynote', ['pet' => $pet->id, 'note' => $note->id]) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-note-form-{{ $note->id }}').submit();">
                                            <img src="../images/icons/supprimer.png" alt="Supprimer">
                                        </a>
                                        <form id="delete-note-form-{{ $note->id }}"
                                            action="{{ route('pet.destroynote', ['pet' => $pet->id, 'note' => $note->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                                <p>Date: {{ $note->date }}</p>
                                @if ($note->time)
                                    <p>Heure: {{ $note->time }}</p>
                                @endif
                                <p>Description: {{ $note->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
