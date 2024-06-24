<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../css/User.css" rel="stylesheet">
</head>

<body>

    @extends('Layout.app')

    @section('content')

        <div id="content-container" class="container">
            <div class="content">
                <h1 class="text-center">Liste des adoptions</h1>

                @if ($adoptions->isEmpty())
                    <p>Aucune demande d'adoption.</p>
                @else
                    @if (session('success'))
                        <div class="alert alert-success text-center custom-alert">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger text-center custom-alert">{{ session('error') }}</div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom de l'animal</th>
                                <th>Nom de l'utilisateur</th>
                                <th>l'email de l'utilisateur</th>
                                <th>Nom complet</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Action</th>
                                <th>Remarque</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adoptions as $adoption)
                                @if ($adoption->status == 'en_attente')
                                    <!-- Affichez uniquement les adoptions en attente -->
                                    <tr data-id="{{ $adoption->id }}">
                                        <td>{{ $adoption->pet->Nom }}</td>
                                        <td>{{ $adoption->user->name }}</td>
                                        <td>{{ $adoption->user->email }}</td>
                                        <td>{{ $adoption->full_name }}</td>
                                        <td>{{ $adoption->phone }}</td>
                                        <td>{{ $adoption->address }}</td>
                                        <td class="actions-column">
                                            <div class="action-buttons">
                                                <button class="btn btn-success btn-sm approve-btn"
                                                    data-id="{{ $adoption->id }}">Approuver</button>
                                                <button class="btn btn-danger btn-sm reject-btn"
                                                    data-id="{{ $adoption->id }}">Rejeter</button>
                                            </div>
                                        </td>
                                        <td>
                                            <form class="remarque-form" data-id="{{ $adoption->id }}">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea class="form-control" name="remarque" rows="3" placeholder="Ajouter une remarque"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Ajouter Remarque</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        @endsection

            <script>
                $(document).ready(function() {
                    $('.approve-btn').click(function() {
                        const id = $(this).data('id');
                        $.post('{{ url('/adoption') }}/' + id + '/approve', {
                            _token: '{{ csrf_token() }}'
                        }, function(response) {
                            if (response.success) {
                                showSuccessMessage('La demande a été acceptée avec succès.');
                                setTimeout(function() {
                                    location.reload();
                                }, 2000); // Recharger la page après 2 secondes
                            } else {
                                alert('Erreur lors de l\'approbation.');
                            }
                        });
                    });

                    $('.reject-btn').click(function() {
                        const id = $(this).data('id');
                        $.post('{{ url('/adoption') }}/' + id + '/reject', {
                            _token: '{{ csrf_token() }}'
                        }, function(response) {
                            if (response.success) {
                                showErrorMessage('La demande a été refusée.');
                                setTimeout(function() {
                                    location.reload();
                                }, 2000); // Recharger la page après 2 secondes
                            } else {
                                alert('Erreur lors du rejet.');
                            }
                        });
                    });

                    $('.remarque-form').submit(function(event) {
                        event.preventDefault();
                        const id = $(this).data('id');
                        const remarque = $(this).find('textarea[name="remarque"]').val();
                        $.post('{{ url('/adoption') }}/' + id + '/remarque', {
                            _token: '{{ csrf_token() }}',
                            remarque: remarque
                        }, function(response) {
                            if (response.success) {
                                alert('Remarque ajoutée.');
                            } else {
                                alert('Erreur lors de l\'ajout de la remarque.');
                            }
                        });
                    });

                    function showSuccessMessage(message) {
                        const alertBox = $('<div class="alert alert-success text-center custom-alert"></div>').text(
                        message);
                        $('.container').prepend(alertBox);
                        setTimeout(function() {
                            alertBox.remove();
                        }, 2000);
                    }

                    function showErrorMessage(message) {
                        const alertBox = $('<div class="alert alert-danger text-center custom-alert"></div>').text(message);
                        $('.container').prepend(alertBox);
                        setTimeout(function() {
                            alertBox.remove();
                        }, 2000);
                    }
                });
            </script>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        margin-top: 110px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
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

    th:first-child {
        border-top-left-radius: 8px;
    }

    th:last-child {
        border-top-right-radius: 8px;
    }

    tr:last-child td:first-child {
        border-bottom-left-radius: 8px;
    }

    tr:last-child td:last-child {
        border-bottom-right-radius: 8px;
    }

    .btn {
        padding: 5px 10px;
        font-size: 14px;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .alert-dismissible .close {
        position: relative;
        top: 20px;
        right: 21px;
        color: inherit;
    }
</style>

</html>
