<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



    <link href="css/User.css" rel="stylesheet">


    <title>Espace User</title>
</head>

<body>


    @extends('layout.app')
    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="welcomeUser">
                    <h2>Bienvenue dans votre espace utilisateur <strong>{{ Auth::user()->name }}</strong></h2>
                </div>
            </div>
        </div>
    @endsection


    <script src=./js/links.js></script>

</body>

</html>
