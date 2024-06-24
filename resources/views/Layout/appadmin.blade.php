
<!DOCTYPE html>
<html lang="fr">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Votre Application')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        /* Style pour le loader GIF */
        #loader {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none; /* Caché par défaut */
        }

        /* Assurez-vous que le contenu principal est caché pendant le chargement */
        body.loading #content {
            display: none;
        }

        body.loading #loader {
            display: block;
        }
    </style>

</head>
<body>
<div id="navbar" class="navbar">
        @include('partials.navbarAdmin')
    </div>
    <div id="sidebar" class="sidebar">
        @include('partials.sidebarAdmin')
    </div>
    <div id="content">
        @yield('content')
    </div>

    <audio id="clickSound" src="{{ asset('sounds/button.mp3') }}" preload="auto"></audio>
    <div id="loader">
        <img src="{{ asset('images/icons/chargement.gif') }}" alt="Loading...">
       
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        // Fonction pour jouer le son
        function playClickSound() {
            var clickSound = document.getElementById("clickSound");
            clickSound.play();
        }

        // Ajouter un gestionnaire d'événements à tous les éléments cliquables
        document.addEventListener('click', function (event) {
            // Vérifier si l'élément cliqué est un bouton ou un lien
            if (event.target.tagName === 'BUTTON' || event.target.tagName === 'A') {
                // Jouer le son
                playClickSound();
            }
        });

        // Afficher le loader pendant le chargement des pages
        document.addEventListener('DOMContentLoaded', function () {
            document.body.classList.add('loading');
        });

        window.addEventListener('load', function () {
            document.body.classList.remove('loading');
        });
    </script>
    <script>
        function toggle() {
            var navbar = document.getElementById("navbar");
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content-container");
            var popup = document.getElementById("popup");
            var popupSound = document.getElementById("popupSound");

            if (popup.classList.contains("active")) {
                popup.classList.remove("active");
                navbar.classList.remove("blur");
                sidebar.classList.remove("blur");
                content.classList.remove("blur");
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 300); // Correspond à la durée de la transition
            } else {
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.classList.add("active");
                    navbar.classList.add("blur");
                    sidebar.classList.add("blur");
                    content.classList.add("blur");
                    // Jouer le son lorsque la popup devient active
                    popupSound.play();
                }, 10); // Petit délai pour permettre l'application du display
            }
        }

        // Afficher la popup lors du chargement de la page
        window.onload = function () {
            toggle();
        }
    </script>
   <!-- @include('partials.navbarAdmin')

    @include('partials.sidebarAdmin')

    @yield('contenu')-->
</body>
</html>
