<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Demande d'accès à l'espace véterinaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/InscripVéto.css" />
    
</head>

<body>
    <style>
        .invalid-feedback {
            color: red;
            font-size: 0.875em;
        }

        .has-error input {
            border-color: red;
        }
    </style>
    <div class="container">
        <h1 class="form-title">Demande d'ouverture d'un compte vétérinaire </h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form enctype="multipart/form-data" id="addPetForm" method="POST" action="{{ route('veto.store') }}">
            @csrf
            <div class="main-user-info">

                <div class="user-input-box">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" value="{{ old('nom') }}"
                        class="@error('nom') has-error @enderror" />
                    @error('nom')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" value="{{ old('prenom') }}"
                        class="@error('prenom') has-error @enderror" />
                    @error('prenom')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="numtel">Numéro du téléphone</label>
                    <input type="number" id="numtel" name="numtel" placeholder="Numéro du téléphone"
                        value="{{ old('numtel') }}" class="@error('numtel') has-error @enderror" />
                    @error('numtel')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="nom_cabinet">Nom du cabinet</label>
                    <input type="text" id="nom_cabinet" name="nom_cabinet" placeholder="Nom du cabinet"
                        value="{{ old('nom_cabinet') }}" class="@error('nom_cabinet') has-error @enderror" />
                    @error('nom_cabinet')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="heure_travail">Horraire de travail</label>
                    <input type="hour" id="heure_travail" name="heure_travail" placeholder="Horraire de travail"
                        value="{{ old('heure_travail') }}" class="@error('heure_travail') has-error @enderror" />
                    @error('heure_travail')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="frais_consultation">Frais de la consultation</label>
                    <input type="number" id="frais_consultation" name="frais_consultation"
                        placeholder="Frais de la consultation en DA" value="{{ old('frais_consultation') }}"
                        class="@error('frais_consultation') has-error @enderror" />
                    @error('frais_consultation')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="localisation">Localisation</label>
                    <input type="text" id="localisation" name="localisation" placeholder="Localisation"
                        value="{{ old('localisation') }}" class="@error('localisation') has-error @enderror" />
                    @error('localisation')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="user-input-box">
                    <label for="description">Description</label>
                    <input type="textarea" id="description" name="description" placeholder="Ajoutez une description ici..."
                        value="{{ old('description') }}" class="@error('description') has-error @enderror" />
                    @error('description')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div>
                <label for="petPhoto">Photo:</label>
                <input type="file" id="Image" name="Image" accept="image/*"
                    class="@error('Image') has-error @enderror">
                @error('Image')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-submit-btn">
                <input type="submit" value="Envoyer">
            </div>

        </form>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout" style="padding: 15px; width:200px; Background-color:rgb(104, 71, 71); border:none; border-radius:8px;
            font-size:18px; color:#fff; margin-top: 5px"
                id="log">
                <i class="fas fa-sign-out-alt"></i> Se déconnecter
            </button>
        </form>
    </div>
</body>

</html>
