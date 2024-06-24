<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusion des bibliothèques externes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css"
        crossorigin="anonymous">

    <!-- Inclusion de votre propre feuille de style -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!-- Inclusion de vos scripts JavaScript -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/adminvt.js') }}"></script>

    <title>Gestion des Publications</title>
</head>

<body>
    @extends('layout.appadmin')

    @section('contenu')
        <main class="main container" id="main">
            <h1>Gestion des Publications</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom de l'utilisateur</th>
                        <th>Contenu de la publication</th>
                        <th>Raison du signalement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->post->user->name }}</td>
                            <td>{{ $report->post->content }}</td>
                            <td>{{ $report->reason }}</td>
                            <td>
                                <form id="delete-alert-form-{{ $report->id }}" action="{{ route('reports.delete', $report->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteAlert({{ $report->id }})">Supprimer</button>
                                </form>

                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    @endsection

    <script>
        function deleteAlert(id) {
            if (confirm("Etes-vous sûr de bien vouloir supprimer cette publication et ce signalement ?")) {
                document.getElementById('delete-alert-form-' + id).submit();
            }
        }
    </script>
</body>

</html>
