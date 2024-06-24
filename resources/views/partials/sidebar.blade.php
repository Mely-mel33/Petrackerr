<!-- resources/views/partials/sidebar.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@400;700&family=Single+Day&display=swap"
        rel="stylesheet">
    <title>sidebar</title>
    <style>
        .submenu {
            display: none;
        }
        .submenu-active {
            display: block;
            transition: top 0.3s ease;
        }
        .dropdown-toggle {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="menu-list">
            <ul>
                <li><a href="{{ route('accueil') }}"><img src="../images/icons/Dashboard.png"> Dashboard</a></li>
                <li><a href="{{ route('pet.create') }}"><img src="../images/icons/paww.png"> Ajouter un animal</a></li>
                <li><a href="{{ route('pet.index') }}"><img src="../images/icons/petlist.png"> Liste de mes Animaux</a></li>
                
                <!-- Espace Adoption with Submenu -->
                <li>
                    <a class="dropdown-toggle"><img src="../images/icons/adoption.png" style="width: 40px"> Espace adoption</a>
                    <ul class="submenu">
                        <li><a href="{{ route('adopt.index') }}"><img src="../images/icons/adoption.png" style="width: 40px"> Adopter un animal</a></li>
                        <li><a href="{{ route('adoption.requests') }}"><img src="../images/icons/adoption.png" style="width: 40px">Mes animaux en adoption</a></li>
                        <li><a href="{{ route('adopdes') }}"><img src="../images/icons/adoption.png" style="width: 40px"> Decision adoption</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('posts.index') }}"><img src="../images/icons/post.png" style="width: 40px"> Espace Publication</a></li>
                <li><a href="{{ route('alerte') }}"><img src="../images/icons/alarme.png"> Espace alertes</a></li>
                <li><a href="{{ route('messagerie') }}"><img src="{{ asset('images/icons/messages.png') }}" alt="Espace messagerie"> Espace messagerie</a></li>
                
                <!-- Espace Rendez-vous with Submenu -->
                <li>
                    <a class="dropdown-toggle"><img src="../images/icons/rdv.png" style="width: 40px"> Espace Rendez-vous</a>
                    <ul class="submenu">
                        <li><a href="{{ route('listesveto') }}"><img src="../images/veterinarian.png"> Prendre un RDV</a></li>
                        <li><a href="{{ route('rdv.listesrdv') }}"><img src="../images/icons/rdv.png"> Mes rendez-vous</a></li>

                    </ul>
                </li>
                
                <li><a href="{{ route('pet.planning') }}"><img src="../images/icons/calendrier.png"> Mon Agenda</a></li>
                <li><a href="{{ route('monprofil') }}"><img src="../images/icons/profil.png"> Mon Profil</a></li>
                <hr class="separator">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout" id="log">
                        <img src="../images/icons/logout.png"> Se déconnecter
                    </button>
                </form>
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggles = document.querySelectorAll('.dropdown-toggle');
            toggles.forEach(function(toggle) {
                toggle.addEventListener('click', function(event) {
                    event.preventDefault();
                    var submenu = this.nextElementSibling;
                    submenu.classList.toggle('submenu-active');
                });
            });
        });
    </script>
</body>

</html>
