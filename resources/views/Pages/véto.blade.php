<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@400;700&family=Single+Day&display=swap"
        rel="stylesheet">

    <link href="css/User.css" rel="stylesheet">
    <title>Espace vétérinaire</title>
    <style>
        /* CSS pour le blur et la popup */
        .single-day-regular {
            font-family: "Single Day", cursive;
            font-weight: 400;
            font-style: normal;
        }


        .amita-bold {
            font-family: "Amita", serif;
            font-weight: 400;
            font-style: normal;
        }

        .blur.active {
            filter: blur(5px);
        }

        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.8);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #popup.active {
            display: block;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        .popup-content {
            text-align: center;
        }

        .popup-content h2,
        strong {
            margin: 0;
            padding-top: 20px;
            font-size: 1.5em;
            font-family: "Amita", serif;
            font-weight: 400;
        }

        .popup-content img {
            margin-top: 20px;
            width: 180px;
        }

        .close-popup {
            margin-top: 20px;
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    @extends('layout.appveto')

@section('content')
<div id="content-container" class="container blur">
    <div class="content">
        <div class="welcomeUser">
            <!-- Le contenu est ici, mais il sera flouté lorsque la popup est active -->
        </div>
    </div>
</div>

<!-- Popup HTML -->
<div id="popup" class="popup">
    <div class="popup-content">

        <h2>Bienvenue dans votre espace vétérinaire <br> <strong>{{ Auth::user()->name }}</strong></h2>
        <img src="../images/nurce.gif">
        <div class="close-popup" onclick="toggle()"><img style="width: 64px"
                src="{{ asset('images/icons/annuler.png') }}"></div>
    </div>
</div>

<!-- Ajoutez un élément audio pour l'effet sonore -->
<audio id="popupSound" src="{{ asset('sounds/hh.mp3') }}" preload="auto"></audio>
@endsection

@section('scripts')
<script>
    function toggle() {
        var contentContainer = document.getElementById("content-container");
        var popup = document.getElementById("popup");
        var popupSound = document.getElementById("popupSound");

        if (popup.classList.contains("active")) {
            popup.classList.remove("active");
            contentContainer.classList.remove("blur");
            setTimeout(function() {
                popup.style.display = 'none';
            }, 300); // Correspond à la durée de la transition
        } else {
            popup.style.display = 'block';
            setTimeout(function() {
                popup.classList.add("active");
                contentContainer.classList.add("blur");
                // Jouer le son lorsque la popup devient active
                popupSound.play();
            }, 10); // Petit délai pour permettre l'application du display
        }
    }

    // Afficher la popup lors du chargement de la page
    window.onload = function() {
        toggle();
    }
</script>
@endsection

    

    <script src="./js/links.js"></script>
</body>

</html>
