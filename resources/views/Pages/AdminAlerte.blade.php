<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/adminvt.js') }}"></script>


    <title>Document</title>
</head>

<body>
    @extends('layout.appadmin')

    @section('contenu')
        <main class="main container" id="main">
            <h1>Gestion des Alertes</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alertes as $alerte)
                        <tr>
                            <td>{{ $alerte->id }}</td>
                            <td>{{ $alerte->user->name }}</td>
                            <td>{{ $alerte->type }}</td>
                            <td>{{ $alerte->message }}</td>
                            <td>{{ $alerte->status }}</td>
                            <td>
                                @if ($alerte->status == 'en_attente')
                                    <form action="{{ route('alertes.accepter', $alerte) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Accepter</button>
                                    </form>
                                    <form action="{{ route('alertes.refuser', $alerte) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Refuser</button>
                                    </form>
                                @endif 
                                <button class="btn btn-danger" onclick="deletealert({{ $alerte->id }})">Supprimer</button>
                                <form id="delete-alert-form-{{ $alerte->id }}"
                                    action="{{ route('alertes.destroy', $alerte->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    @endsection
    <script>
        function deletealert(id) {
            if (confirm("Etes-vous sur de bien vouloir supprimer cette alerte ?")) {
                document.getElementById('delete-alert-form-' + id).submit();
    
            }
        }
    </script>
</body>

</html>
