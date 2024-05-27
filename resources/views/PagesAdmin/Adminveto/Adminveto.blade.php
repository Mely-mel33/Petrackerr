<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">


    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="../css/User.css" rel="stylesheet">
    <title>Gestion veterinaire</title>
</head>

<body>


    @extends('layout.appadmin')

    @section('contenu')
        <div id="content-container" class="container">
            <div class="content">
                <div class="vet-table">
                    <h2>Demandes d'inscription des vétérinaires</h2>

                    @if (Session::has('success'))
                        <div class="alert alert-success" style="color: green">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <table class="vetable" id="vetbl">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>prenom</th>
                                <th>Numéro de téléphone</th>
                                <th>Nom du cabinet</th>
                                <th>Heures de travail</th>
                                <th>Frais de consultation</th>
                                <th>Localisation</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Vetos as $veto)
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
                                        @if ($veto->image)
                                            <img src="{{ asset('uploads/Vetos/' . $veto->image) }}"
                                                alt="Image du vétérinaire">
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.veto.approve', $veto->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approuver</button>
                                        </form>
                                        <form action="{{ route('admin.veto.destroy', $veto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') <!-- Ajoutez cette ligne pour utiliser la méthode DELETE -->
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Êtes-vous sûr de vouloir Supprimer cette inscription ?');">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            // Supposons que chaque bouton d'approbation a une classe 'approve-btn' et chaque ligne de tableau a un attribut 'data-id'
            document.querySelectorAll('.approve-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let rowId = this.getAttribute('data-id');
                    let row = document.querySelector(`tr[data-id="${rowId}"]`);
                    if (row) {
                        row.remove(); // Cela supprimera la ligne du tableau
                    }
                });
            });
        </script>
    @endsection




    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
