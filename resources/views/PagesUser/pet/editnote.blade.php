<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link href="../css/User.css" rel="stylesheet">
    <title>Modifier une note</title>
</head>

<body>
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div id="event-form">
                    <h1>Modifier la note</h1>
                    <form action="{{ route('pet.updatenote', ['pet' => $pet->id, 'note' => $note->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ $note->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date :</label>
                            <input type="date" id="date" name="date" class="form-control"
                                value="{{ $note->date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="time">Heure :</label>
                            <input type="time" id="time" name="time" class="form-control"
                                value="{{ $note->time }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea id="description" name="description" class="form-control" rows="5">{{ $note->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>
