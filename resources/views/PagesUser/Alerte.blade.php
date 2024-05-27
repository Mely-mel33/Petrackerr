<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/User.css" rel="stylesheet">
    <title>Alerte d'urgence</title>
</head>

<body>
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="alert">
                    <h1><img src="../images/icons/alert.gif" style="width: 60px;"> Alerte d'urgence <img
                            src="../images/icons/alert.gif" style="width: 60px;"></h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="alerteForm" action="{{ route('envoyer_alerte') }}" method="POST" class="custom-form"
                        novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="type">Type de signalement</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">Sélectionner le type de signalement</option>
                                <option value="perte">Perte d'animal</option>
                                <option value="trouvé">Animal trouvé</option>
                                <option value="urgence">Besoin urgent</option>
                            </select>
                            <div class="invalid-feedback">Veuillez sélectionner le type de signalement.</div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                            <div class="invalid-feedback">Veuillez saisir votre message.</div>
                        </div>
                        <div class="alertbtn" style="display: flex">
                            <button type="submit" class="btn">Envoyer</button>
                            <a href="{{route('listalert')}}" class="Alertlist" style="margin-left:52%">Consulter ma liste de signalement</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('alerteForm');
            form.addEventListener('submit', function(event) {
                var confirmation = confirm('Êtes-vous sûr de vouloir envoyer ce message d\'alerte ?');
                if (!confirmation) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
