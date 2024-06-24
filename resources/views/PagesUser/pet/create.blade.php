<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{ asset('css/User.css') }}" rel="stylesheet">
    <title>Ajouter un Pet Profil</title>
</head>

<body>
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="pet-profiles">
                    <div id="petProfileForm">
                        <h2>Ajouter un Nouvel Animal Domestique </h2>
                        <div class="image-container text-center">
                        <img src="../images/icons/cat.gif" >
                        </div>
                        <form enctype="multipart/form-data" id="addPetForm" method="POST"
                            action="{{ route('pet.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="Nom">Nom de l'animal:</label>
                                <input type="text" class="@error('Nom') is-invalid @enderror" id="Nom"
                                    name="Nom" value="{{ old('Nom') }}" required>
                                @error('Nom')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Espèce">Espèce:</label>
                                <select id="Espèce" name="Espèce" required>
                                    <option value="">Sélectionner une espèce</option>
                                    <option value="chien" {{ old('Espèce') == 'chien' ? 'selected' : '' }}>Chien</option>
                                    <option value="chat" {{ old('Espèce') == 'chat' ? 'selected' : '' }}>Chat</option>
                                    <option value="autre" {{ old('Espèce') == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>

                                @error('Espèce')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Race">Race:</label>
                                <input value="{{ old('Race') }}" type="text"
                                    class="@error('Race') is-invalid @enderror" id="Race" name="Race" required>
                                @error('Race')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Age">Âge:</label>
                                <input type="number" class="@error('Age') is-invalid @enderror" id="Age"
                                    name="Age" min="0" max="100" value="{{ old('Age') }}">
                                @error('Age')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Age">Sexe:</label><br>
                                <input class="@error('Sexe') is-invalid @enderror" type="radio" id="male"
                                    name="Sexe" value="male" required {{ old('Sexe') == 'male' ? 'checked' : '' }}>
                                <label for="male">Mâle</label>
                                <input class="@error('Sexe') is-invalid @enderror" type="radio" id="female"
                                    name="Sexe" value="female" required {{ old('Sexe') == 'female' ? 'checked' : '' }}>
                                <label for="female">Femelle</label>

                                @error('Sexe')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Description">Description:</label>
                                <textarea id="Description" name="Description">{{ old('Description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="petPhoto">Photo:</label>
                                <input type="file" id="Image" name="Image" accept="image/*">
                            </div>
                            <button type="submit" class="btn_2">Ajouter</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endsection
</body>

</html>
