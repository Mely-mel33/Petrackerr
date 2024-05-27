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
        <div class="search-bar">
            <input type="text" name="search-bar" placeholder="&#xf002; Rechercher...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>

        <div class="nav-list">
            <ul>
                <li><a href="{{ asset('#') }}"><img src="../images/icons/house.png"></li>
                <li><a href="{{ asset('#') }}">
                        <div class="dropdown">
                            <button class="dropbtn">
                                <img src="../images/icons/bell.png">
                            </button>
                            <div class="dropdown-content">
                                <a href="{{ route('profile.show') }}">Paramètres</a>
                                <a href="#">Params </a>
                            </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <div class="profile-photo"> <img
                                    src="{{ auth()->user()->profile ? asset('storage') . '/' . auth()->user()->profile : '../images/icons/user.png' }} "
                                    alt="User Profile">
                            </div>
                        </button>
                        <div class="dropdown-content">
                            <a href="{{ route('profile.show') }}">Paramètres</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
