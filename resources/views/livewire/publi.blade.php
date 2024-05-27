<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/User.css" rel="stylesheet">

    <title>Publication</title>
</head>

<body>
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                @livewire('components.create-post')
                <!-- Espace pour les publications créées -->
                <div class="posts">
                    @forelse($publications as $publication)
                        <div class="post">
                            <div class="user-profile">
                                <img src="{{ $publication->user->profile_photo_path }}" alt="User Profile">
                            </div>
                            <div class="post-content">
                                <p>{{ $publication->content }}</p>
                                <div class="post">
                                    <div class="user-profile">
                                        <img src="user-profile.jpg" alt="User Profile">
                                    </div>
                                    <div class="post-content">
                                        <div class="reactions">
                                            <button><img src="../images/icons/like.png"> J'aime</button>
                                            <button><img src="../images/icons/comment.png"> Commenter</button>
                                            <button><img src="../images/icons/share.png"> Partager</button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3 class="text-left text-danger">Aucune Publication Trouvée </h3>
                    @endforelse

                </div>
            </div>
        @endsection


</body>

</html>
