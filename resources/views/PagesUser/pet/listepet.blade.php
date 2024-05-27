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
    <title>Liste de mes Animaux</title>
</head>

<body>
    <!-- PagesUser/pet/listepet.blade.php -->
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="containerP">
                    <h2>Mes Animaux Domestiques Enregistrés</h2>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Espèce</th>
                                <th>Race</th>
                                <th>Âge</th>
                                <th>Sexe</th>
                                <th>Description</th>
                                <th>Créé le</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $pet)
                                <tr>
                                    <td>{{ $pet->id }}</td>
                                    <td>{{ $pet->Nom }}</td>
                                    <td ><img src="{{ asset('uploads/Pets/' . $pet->Image) }}" alt="{{ $pet->Nom }}"></td>
                                    <td>{{ $pet->Espèce }}</td>
                                    <td>{{ $pet->Race }}</td>
                                    <td>{{ $pet->Age }}</td>
                                    <td>{{ $pet->Sexe }}</td>
                                    <td>{{ $pet->Description }}</td>
                                    <td>{{ $pet->created_at }}</td>
                                    <td>
                                        <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-success">Modifier</a>
                                        <button class="btn btn-danger"
                                            onclick="deletePet({{ $pet->id }})">Supprimer</button>
                                        <form id="delete-pet-form-{{ $pet->id }}"
                                            action="{{ route('pet.destroy', $pet->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="{{ route('pet.show', $pet->id) }}" class="btn btn-info">Voir le profil</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>

<script>
    function deletePet(id) {
        if (confirm("Etes-vous sur de bien vouloir supprimer cet animal?")) {
            document.getElementById('delete-pet-form-' + id).submit();

        }
    }
</script>
