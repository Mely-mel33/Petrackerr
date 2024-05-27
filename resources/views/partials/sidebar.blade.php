<!-- resources/views/partials/sidebar.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sidebar</title>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="menu-list">
            <ul>
                <li><a href="{{ route('accueil') }}"><img src="../images/icons/Dashboard.png">  Dashboared</a></li>
                <li><a href="{{ route('publi.index') }}"><img src="../images/icons/post.png"> Espace publication</a></li>
                <li>
                    <a href="{{ route('messagerie') }}">
                        <img src="{{ asset('images/icons/messages.png') }}" alt="Espace messagerie">
                        Espace messagerie
                    </a>
                </li>                <li><a href="{{ route('pet.create') }}"><img src="../images/icons/paww.png">  Ajouter un animal</a></li>
                <li><a href="{{ route('pet.index') }}"><img src="../images/icons/petlist.png">  Liste de mes Animaux</a></li>
                <li><a href="{{ route('pet.planning') }}"><img src="../images/icons/calendrier.png">  Mon Planning</a></li>
                <li><a href=""><img src="../images/icons/rdv.png"> Mes RDVs</a></li>
                <li><a href="{{ route('alerte') }}"><img src="../images/icons/alarme.png"> Espace alertes</a></li>
                <li><a href="{{ route('monprofil') }}"><img src="../images/icons/profil.png">  Mon Profil </a></li>
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
</body>

</html>
