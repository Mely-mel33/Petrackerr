

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <div class="navbar" id="navbar">
      <div class="navbar-header">
        <a class="logo" href="#">
          <img src="../images/logo.png" alt="Logo">
        </a>
      </div>
      <form action="{{ route('searchveto') }}" method="GET" class="search-bar">
            <input type="text" name="localisation" placeholder="Rechercher un vétérinaire par localisation...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      <div class="nav-list">
        <ul>
          <li><span class="status">En ligne</span></li>
          <li><a href="{{ asset('#') }}"><i class="fas fa-bell"></i></a>
          </li>
          <li><a href="{{ asset('#') }}"><i class="fas fa-user"></i></a></li>
        </ul>
      </div>
    </div>
  </body>
  </html>