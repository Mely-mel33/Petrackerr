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
                <table class="table">
                    <h2 class="txttt" style="text-align: center; padding: 20px;">Ma liste de signalement</h2>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Message</th>
                            <th>Créé le</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alertes as $alerte)
                        <tr>
                            <td>{{ $alerte->id }}</td>
                            <td>{{ $alerte->type }}</td>
                            <td>{{ $alerte->message }}</td>
                            <td>{{ $alerte->created_at }}</td>
                            <td>{{ $alerte->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</body>

</html>
