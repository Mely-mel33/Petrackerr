<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/User.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/adminvt.js') }}"></script>
    
    <title>Document</title>
</head>
<body>
<div class="sidebar" id="sidebar">
      <nav class="sidebar__container">
         <div class="sidebar__logo">
            
            <h1>Espace Admin</h1>
           
         </div>

         <div class="sidebar__content">
            <div class="sidebar__list">
               <a href="{{ route('admin') }}" class="sidebar__link active-link">
                <i class="fas fa-home"></i>
                <span class="sidebar__link-name">Home</span>
                <span class="sidebar__link-floating">Home</span>
            </a>
            
            <a href="{{ route('adminuser') }}" class="sidebar__link">
                <i class="fas fa-user"></i>
                <span class="sidebar__link-name">Gestion des Users </span>
                <span class="sidebar__link-floating">Gestion user </span>
            </a>

            <a href="{{route('adminpubli') }}" class="sidebar__link">
            <i class="fas fa-newspaper"></i>
                <span class="sidebar__link-name">Gestion Publications</span>
                <span class="sidebar__link-floating">Gestion Publications</span>
            </a>

            <a href="{{route('Adminveto') }}" class="sidebar__link">
            <i class="fas fa-paw"></i>
                <span class="sidebar__link-name">Gestion véterinaires </span>
                <span class="sidebar__link-floating">Gestion véterinaires</span>
            </a>
            <a href="{{route('alertes_admin') }}" class="sidebar__link">
                <i class="fas fa-paw"></i>
                    <span class="sidebar__link-name">Gestion Alertes </span>
                    <span class="sidebar__link-floating">Gestion Alertes</span>
                </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf 
                <button type="submit" class="logout" id="log">
                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                </button>
            </form>

        
            </div>

            <h3 class="sidebar__title">
               <span>Library</span>
            </h3>

            <div class="sidebar__list">
               <a href="#" class="sidebar__link">
                <i class="fas fa-cog"></i>
                  <span class="sidebar__link-name">Paramètres </span>
                  <span class="sidebar__link-floating">Paramètres </span>
               </a>

               <a href="#" class="sidebar__link">
                <i class="fas fa-question-circle"></i> 
                  <span class="sidebar__link-name">Aide et support</span>
                  <span class="sidebar__link-floating">Aide et support </span>
               </a>

            
            </div>
        </div>
        <div class="sidebar__account">
            <img src="images\as.jpg" alt="sidebar image" class="sidebar__perfil">

            <div class="sidebar__names">
                <h3 class="sidebar__name">Username</h3>
                <span class="sidebar__email">Username@gmail.com</span>
            </div>

            <i class="ri-arrow-right-s-line"></i>
        </div>
    </nav>
</div>

</body>
</html>--> 

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
        <ul class="ul1">
        
        <li><a href="{{ route('home') }}"><img src="../images/icons/house.png">homme</li>
          <li><a href="{{ route('adminpubli') }}"><img src="../images/icons/post.png"> Gestion Publications</a></li>
          <li><a href="{{ route('Adminveto') }}"><img src="../images/icons/paww.png">Gestion véterinaires</a></li>
          <li><a href={{route('alertes_admin') }}><img src="../images/icons/alarme.png"> Gestion des alrertes </a></li>
          <li><a href=""> <img src="../images/guide.png">  guide</a></li>
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