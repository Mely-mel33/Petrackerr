<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{ asset('css/User.css') }}" rel="stylesheet">
    <title>prendre un rendez vous</title>
</head>

<body>



@extends('layout.app')

@section('content')
    <div class="container">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Prendre rendez-vous avec {{ $veto->nom }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('rdv.store') }}">
                            @csrf
    
                            <input type="hidden" name="veterinaire_id" value="{{ $veto->id }}">
    
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Date du rendez-vous</label>
    
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="heure" class="col-md-4 col-form-label text-md-right">Heure du rendez-vous</label>
    
                                <div class="col-md-6">
                                    <input id="heure" type="time" class="form-control" name="heure" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="animaux" class="col-md-4 col-form-label text-md-right">Liste des animaux</label>
    
                                <div class="col-md-6">
                                    <select id="animaux" class="form-control" name="pet_id" required>
                                        @foreach ($animaux as $animal)
                                            <option value="{{ $animal->id }}">{{ $animal->Nom }} - {{ $animal->Espèce }} - {{ $animal->Sexe }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Envoyer la demande de rendez-vous</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>