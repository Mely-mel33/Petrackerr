<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/User.css" rel="stylesheet">
    <title>Planning</title>
</head>

<body>

    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container ">
            <div class="content">
                <div class="Agenda">
                    <div id="event-form" class="p-4 shadow rounded">
                        <h2>Ajouter une note
                            <img src="../images/icons/planning.gif" alt="Planning" style="width: 85px;">
                        </h2>
                        @csrf
                        <div class="form-group">
                            <label for="pet-select">Choisir l'animal</label>
                            <select id="pet-select" class="form-control" required>
                                <option value="" disabled selected>Choisir l'animal</option>
                                @foreach ($pets as $pet)
                                    <option value="{{ $pet->id }}">{{ $pet->Nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="event-title">Titre</label>
                            <input type="text" id="event-title" class="form-control" placeholder="Titre" required>
                        </div>
                        <div class="form-group">
                            <label for="event-date">Date de l'événement</label>
                            <input type="date" id="event-date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="event-time">Heure de l'événement</label>
                            <input type="time" id="event-time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="event-description">Description</label>
                            <textarea id="event-description" class="form-control" placeholder="Description"></textarea>
                        </div>
                        <button id="add-event" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-event').on('click', function(e) {
                e.preventDefault(); // Empêcher le comportement par défaut du bouton

                // Récupérer les valeurs des champs du formulaire
                var petId = $('#pet-select').val();
                var title = $('#event-title').val();
                var date = $('#event-date').val();
                var time = $('#event-time').val();
                var description = $('#event-description').val();

                // Vérifier si tous les champs requis sont remplis
                if (!petId || !title || !date || !time) {
                    alert('Veuillez remplir tous les champs obligatoires.');
                    return;
                }

                // Envoyer une requête POST pour ajouter la note
                $.ajax({
                    url: '{{ route('add-note-to-pet') }}',
                    method: 'POST',
                    data: {
                        pet_id: petId,
                        title: title,
                        date: date,
                        time: time,
                        description: description,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Afficher un message de succès
                        alert(response.message);
                        // Redirection vers la page de profil de l'animal
                        window.location.href = '/pet/' + petId;
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Une erreur est survenue. Veuillez réessayer.');
                    }
                });
            });
        });
    </script>

</body>

</html>
