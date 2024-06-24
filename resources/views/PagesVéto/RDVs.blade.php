<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="fullcalendar.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <link href="../css/User.css" rel="stylesheet">





</head>

<body>

    @extends('Layout.appveto')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <h1 class="text-center">Liste des Rendez-vous</h1>
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Utilisateur</th>
                                <th>Animal</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rendezVs as $rendezV)
                                <tr>
                                    <td>{{ $rendezV->id }}</td>
                                    <td>{{ $rendezV->user ? $rendezV->user->name : 'Utilisateur non trouvé' }}</td>
                                    <td>{{ $rendezV->pet ? $rendezV->pet->Nom : 'Animal non trouvé' }}</td>
                                    <td>{{ $rendezV->date }}</td>
                                    <td>{{ $rendezV->heure }}</td>

                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <form action="{{ route('RDVs.approve', $rendezV->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approuver</button>
                                        </form>
                                        <form action="{{ route('RDVs.reject', $rendezV->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Rejeter</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
            @endsection
        </div>
    </div>
</body>
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
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        margin-top: 20px;
    }

    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 20px;
        margin-top: 80px;
        margin-left: 80px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        max-width: 1150px;
        background-color: #f9f9f9;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #8d5e63;
        color: white;
    }

    td {
        border-top: none;
    }

    th:first-child {
        border-top-left-radius: 12px;
    }

    th:last-child {
        border-top-right-radius: 12px;
    }

    tr:last-child td:first-child {
        border-bottom-left-radius: 12px;
    }

    tr:last-child td:last-child {
        border-bottom-right-radius: 12px;
    }

    td img {
        max-width: 200px;
        max-height: 200px;
    }

    form {
        display: inline;
    }
</style>

</html>
