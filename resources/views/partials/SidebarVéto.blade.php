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

    
    <title>Document</title>
</head>
<body>
<div class="sidebar" id="sidebar">
      <div class="menu-list">
        <ul >
        <li><a href="{{ route('accueil') }}"><img src="../images/icons/Dashboard.png"> Dashboared</a></li>
        <li><a href="{{ route('home') }}"><img src="../images/icons/house.png"> Home</li>
          <li><a href="{{ route('Monprofil') }}"><img src="../images/doctor.png"> Mon profil</a></li>
          <li><a href="{{route('rdv.demandes')}}"><img src="../images/appointment.png"> Liste des rendes-vous</a></li>
          <li><a href="{{ route('posts.index') }}"><img src="../images/icons/post.png"> Espace publication</a></li>
          <li><a href="{{ route('messagerieV') }}">  <img src="../images/icons/messages.png"> Espace Messagerie</a></li>
          <li><a href=""> <img src="../images/manual (1).png">Guide</a></li>
      
        </ul>
        
          
        <hr class="separator">
          

          <form action="{{ route('logout') }}" method="POST">
            @csrf 
            <button type="submit" class="logout" id="log">
            <img src="../images/icons/logout.png">  Se déconnecter
            </button>
          </form>

        
      </div>
    </div>
</body>
</html>