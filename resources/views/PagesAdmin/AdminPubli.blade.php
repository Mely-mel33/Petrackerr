<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
   
    <title>  Gestion publis </title>
</head>
<body>
    @extends('layout.appadmin')

    @section('contenu')
    <main class="main container" id="main">
        <h1>admin</h1>
  
  
        <div id="content-container" class="container">
      
          <div class="create-post">
              <div class="user-profile">
                 <img  src="C:\Users\HP\Desktop\Petrackerr\assets\images\as.jpg" alt="User Profile">
              <h4 class="h6"> noura nour         </h4>  
              <p class="P"> a publie </p> 
              </div>
              <div class="post-input">
                <textarea placeholder=" Qu'est-ce qui vous passe par la tête ?"></textarea>
                <div class="post-options">
                  <button><i class="fas fa-image"></i>  photo</button>
                  <button><i class="fas fa-video"></i> vidéo</button>
                </div>
                <button class="post-btn-a">Approuver </button>
                <button class="post-btn-r">refuser  </button>
              </div>
            </div>
            </div>
           </div>
           <div id="content-container" class="container">
      
              <div class="create-post">
                  <div class="user-profile">
                     <img  src="C:\Users\HP\Desktop\Petrackerr\assets\images\as.jpg" alt="User Profile">
                  <h4 class="h6"> noura nour         </h4>  
                  <p class="P"> a publie </p> 
                  </div>
                  <div class="post-input">
                    <textarea placeholder=" Qu'est-ce qui vous passe par la tête ?"></textarea>
                    <div class="post-options">
                      <button><i class="fas fa-image"></i>  photo</button>
                      <button><i class="fas fa-video"></i> vidéo</button>
                    </div>
                    <button class="post-btn-a">Approuver </button>
                    <button class="post-btn-r">refuser  </button>
                  </div>
                </div>
                </div>
               </div>
               <div id="content-container" class="container">
      
                 <div class="create-post">
                     <div class="user-profile">
                        <img  src="C:\Users\HP\Desktop\Petrackerr\assets\images\as.jpg" alt="User Profile">
                     <h4 class="h6"> noura nour         </h4>  
                     <p class="P"> a publie </p> 
                     </div>
                     <div class="post-input">
                       <textarea placeholder=" Qu'est-ce qui vous passe par la tête ?"></textarea>
                       <div class="post-options">
                         <button><i class="fas fa-image"></i>  photo</button>
                         <button><i class="fas fa-video"></i> vidéo</button>
                       </div>
                       <button class="post-btn-a">Approuver </button>
                       <button class="post-btn-r">refuser  </button>
                     </div>
                   </div>
                   </div>
                  </div>
             
  
     </main>
     
    @endsection
   
   
   
   <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>