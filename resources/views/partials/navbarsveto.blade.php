
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@400;700&family=Single+Day&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
            <form method="GET" action="{{ route('search.veto') }}">
                <div class="form-group">
                    <input type="text" name="localisation" class="form-control" placeholder="&#xf002; localisation" value="{{ request()->input('localisation') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="nav-list">
            <ul>
                <li><a href="{{ route('home') }}"><img src="../images/icons/house.png"></a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <img src="../images/icons/bell.png">
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </button>
                        <div class="dropdown-content">
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                @if ($notification->type == 'App\Notifications\AdoptionRequest')
                                    <a href="{{ url('/request') }}">
                                        {{ $notification->data['message'] }}
                                    </a>
                                @elseif ($notification->type == 'App\Notifications\AdoptionResponse')
                                    <a href="{{ url('/adoption-requests') }}">
                                        {{ $notification->data['message'] }}
                                    </a>
                                @elseif ($notification->type == 'App\Notifications\CommentResponse') 
                                    <a href="{{ url('/comments/' . $notification->data['comment_id']) }}">
                                        Vous avez une nouvelle réponse à votre commentaire.
                                    </a>
                                @endif
                                <!-- Marquer la notification comme lue -->
                                {{ $notification->markAsRead() }}
                            @endforeach
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <div class="profile-photo-container">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="profile-photo">
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
