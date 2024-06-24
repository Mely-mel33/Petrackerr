<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="fullcalendar.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <link href="../css/User.css" rel="stylesheet">

    <title>Publication veto</title>
</head>
<body>
  @extends('layout.appveto')

  @section('content')
  
  <div id="content-container" class="container">
    <div class="create-post">
      <div class="user-profile">
        <img src="user-profile.jpg" alt="User Profile">
      </div>
      <div class="post-input">
        <textarea placeholder=" Qu'est-ce qui vous passe par la tête ?"></textarea>
        <div class="post-options">
          <button><i class="fas fa-image"></i> Ajouter une photo</button>
          <button><i class="fas fa-video"></i> Ajouter une vidéo</button>
        </div>
        <button class="post-btn">Publier</button>
      </div>
    </div>
     <!-- Espace pour les publications créées -->
<div class="posts">
  <!-- Publication 1 -->
  <div class="post">
    <div class="user-profile">
      <img src="user-profile.jpg" alt="User Profile">
    </div>
    <div class="post-content">
      <p>Contenu de la publication</p>
      <div class="reactions">
        <!-- Boutons de réactions (J'aime, Commenter, Partager) -->
        <button><i class="far fa-thumbs-up"></i> J'aime</button>
        <button><i class="far fa-comment"></i> Commenter</button>
        <button><i class="far fa-share-square"></i> Partager</button>
      </div>
      <!-- Section des commentaires -->
      <div class="comments">
        <!-- Commentaire 1 -->
        <div class="comment">
          <div class="user-profile">
            <img src="user-profile.jpg" alt="User Profile">
          </div>
          <p>Nom de l'utilisateur : Commentaire</p>
        </div>
        <!-- Commentaire 2 -->
        <div class="comment">
          <div class="user-profile">
            <img src="user-profile.jpg" alt="User Profile">
          </div>
          <p>Nom de l'utilisateur : Commentaire</p>
        </div>
        <!-- Ajouter un commentaire -->
        <div class="add-comment">
          <input type="text" placeholder="Ajouter un commentaire...">
          <button>Commenter</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection
  
    
</body>
</html>