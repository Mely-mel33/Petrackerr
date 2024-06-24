<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/User.css" rel="stylesheet">
    <title>Publication</title>
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .post-content {
            margin-bottom: 10px;
        }

        .post-content p {
            margin-bottom: 10px;
        }

        .post-content img {
            max-width: auto;
            height: 300px;
        }

        .post-actions {
            display: flex;
            justify-content: space-between;
        }

        .likes,
        .comments {
            display: flex;
            align-items: center;
        }

        .likes img,
        .comments img {
            width: 25px;
            height: 25px;
            margin-right: 5px;
        }


        .user-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .comment {
            margin-top: 15px;
            padding: 0 5px;
            border: 1px solid #caccce;
            border-left: 4px solid #6786b6;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .comment .user-profile {
            display: flex;
            align-items: center;
        }

        .comment .user-profile img {
            width: 50px;
            height: 50px;
            margin-right: 5px;
        }

        .comment .user-profile h4 {
            margin: 0;
            font-size: 14px;
        }

        .comment p {
            margin: 5px 0 0 20px;
            font-size: 14px;
        }

        .comments-section {
            margin-top: 10px;
            margin-left: 10px;
            display: none;
        }

        .comment-form {
            position: relative;
            margin-top: 10px;
        }

        .comment-form textarea {
            resize: none;
            height: 45px;
            margin-bottom: 10px;
            border-radius: 18px;
            padding-right: 50px;
        }

        .comment-form button {
            position: absolute;
            right: 10px;
            bottom: 15px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .placeholder-image {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #e0e0e0;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            font-size: 14px;
            color: #999;
        }

        /* Styles for Popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            transition: opacity 0.3s ease;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            width: 100%;
        }

        .popup h2 {
            margin-bottom: 20px;
        }

        .popup textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        .popup button {
            margin-top: 10px;
            cursor: pointer;
        }

        .report-btn {
            background-color: transparent;
            color: red;
            font-size: bold 18px;
            border: none;
        }

        .like-container {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .like-container img {
            width: 25px;
            height: 25px;
        }

        .like-container .liked {
            display: none;
        }

        .like-container.liked .default {
            display: none;
        }

        .like-container.liked .liked {
            display: inline;
        }
    </style>
</head>

<body>
    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="publi">
                    <!-- Formulaire pour ajouter une publication -->
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="create-post">
                            <div class="user-profile">
                                @if (auth()->user()->profile_photo_path)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                                        alt="Photo de profil">
                                @else
                                    <div class="placeholder-image"><img src="/images/icons/user.png"></div>
                                @endif
                                <h3>{{ auth()->user()->name }}</h3>
                            </div>
                            <div class="post-input">
                                <div class="form-group">
                                    <textarea name="content" class="form-control" placeholder="Exprimez-vous..."></textarea>
                                </div>
                                <div class="post-comb" style="display: flex; font-size:18px">
                                    <div class="form-group upload-btn-wrapper">
                                        <img src="../images/icons/photo.png">Image
                                        <input type="file" name="images[]" accept="image/*" multiple>
                                    </div>
                                    <div class="form-group upload-btn-wrapper">
                                        <img src="../images/icons/video.png">Vidéo
                                        <input type="file" name="video" accept="video/*">
                                    </div>
                                    <button type="submit" class="btn"
                                        style="margin-left: 60%; display:flex; padding:0px 10px">
                                        <img src="../images/icons/send.png">Publier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Affichage des publications -->
                    <div class="posts">
                        @foreach ($posts as $post)
                            <div class="post">
                                <div class="post-content">
                                    <div class="user-profile" style="display: flex">
                                        @if ($post->user->profile_photo_path)
                                            <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}"
                                                alt="Photo de profil">
                                        @else
                                            <div class="placeholder-image"><img src="/images/icons/user.png"></div>
                                        @endif
                                        <div>
                                            <h3>{{ $post->user->name }}</h3>
                                            <p style="width: 150px;">{{ $post->created_at }}</p>
                                        </div>
                                        <!-- Bouton de signalement -->
                                        <button type="button" class="btn btn-sm  report-btn"
                                            data-post-id="{{ $post->id }}" style="margin-left: 60%;">
                                            Signaler
                                        </button>
                                        @if ($post->user_id == auth()->id())
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette publication ?')">Supprimer</button>
                                            </form>
                                        @endif
                                    </div>
                                    <p>{{ $post->content }}</p>
                                    @if ($post->images)
                                        @foreach (json_decode($post->images) as $image)
                                            <img src="{{ asset('images/' . $image) }}" alt="Post Image">
                                        @endforeach
                                    @endif
                                    @if ($post->video)
                                        <video controls>
                                            <source src="{{ asset('videos/' . $post->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                                <hr class="separator">
                                <div class="post-actions">
                                    <!-- Section pour les likes -->
                                    <div class="likes like-container" id="likeButton-{{ $post->id }}">
                                        <img src="../images/icons/like.png" alt="Like Icon" class="like-icon default"
                                            data-post-id="{{ $post->id }}">
                                        <img src="../images/icons/likeB.png" alt="Liked Icon" class="like-icon liked"
                                            data-post-id="{{ $post->id }}">
                                        <span id="likeCount-{{ $post->id }}">{{ $post->likes_count }}</span>
                                    </div>
                                    <!-- Section pour les commentaires -->
                                    <div class="comments">
                                        <img src="../images/icons/comment.png" alt="Comment Icon" class="comment-icon"
                                            data-post-id="{{ $post->id }}">
                                        <span>{{ $post->comments->count() }} commentaires</span>
                                    </div>
                                </div>
                                <!-- Formulaire pour ajouter un commentaire -->
                                <form action="{{ route('comments.store', $post) }}" method="post" class="comment-form">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" placeholder="Ajoutez un commentaire..."></textarea>
                                        <button type="submit" class="btn">
                                            <img src="../images/icons/send.png" alt="Envoyer" width="35px">
                                        </button>
                                    </div>
                                </form>
                                <!-- Affichage des commentaires -->
                                <div class="comments-section" id="commentsSection-{{ $post->id }}">
                                    @foreach ($post->comments as $comment)
                                        <div class="comment">
                                            <div class="user-profile">
                                                @if ($comment->user->profile_photo_path)
                                                    <img src="{{ asset('storage/' . $comment->user->profile_photo_path) }}"
                                                        alt="Photo de profil">
                                                @else
                                                    <div class="placeholder-image"><img src="../images/icons/user.png">
                                                    </div>
                                                @endif
                                                <h4>{{ $comment->user->name }}</h4>
                                                <button class="btn" onclick="deleteComment({{ $comment->id }})"
                                                    style="margin-left: 85%">
                                                    <img src="../images/icons/supprimer.png" alt="Supprimer"
                                                        style="width: 30px; height:30px">
                                                </button>
                                            </div>
                                            <form id="delete-Comment-form-{{ $comment->id }}"
                                                action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Popup pour le signalement -->
        <div id="report-popup" class="popup">
            <div class="popup-content">
                <h2>Signaler un contenu</h2>
                <form id="report-form" action="#" method="POST" class="report-form" novalidate>
                    @csrf
                    <input type="hidden" name="post_id" id="reportPostId">
                    <div class="mb-3">
                        <label for="reportMessage" class="form-label">Raison du signalement</label>
                        <textarea class="form-control" id="reportMessage" name="reason" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Envoyer</button>
                    <button type="button" class="btn btn-secondary close-popup">Annuler</button>
                </form>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-wUpZxXVFXJk2raTQu5r9IyS8o0njoa3zQy82k6t/84vId+REaFS4D2pR1NHUkCzF" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-ZeOk6w5g1v7e9jcrBfuqij7wk3XJ5FfEWf2sgJLOZBm9zg1Mg5q8G7xwOGt6flW1" crossorigin="anonymous">
        </script>
        <script>
            function deleteComment(id) {
                if (confirm("Êtes-vous sûr de bien vouloir supprimer ce commentaire ?")) {
                    document.getElementById('delete-Comment-form-' + id).submit();
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                // Ajout d'un événement sur les boutons de signalement
                document.querySelectorAll('.report-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const postId = this.getAttribute('data-post-id');
                        document.getElementById('reportPostId').value = postId;
                        document.getElementById('report-form').action = `/posts/${postId}/report`;
                        togglePopup('report-popup');
                    });
                });

                // Ajout d'un événement sur les boutons de fermeture de popup
                document.querySelectorAll('.close-popup').forEach(button => {
                    button.addEventListener('click', function() {
                        togglePopup('report-popup', true);
                    });
                });

                // Fonction pour basculer l'affichage d'un popup et appliquer l'effet sombre sur body
                function togglePopup(popupId, forceClose = false) {
                    const popup = document.getElementById(popupId);
                    const body = document.querySelector('body');

                    if (forceClose) {
                        popup.style.opacity = 0;
                        setTimeout(() => {
                            popup.style.display = 'none';
                            body.classList.remove('popup-open');
                        }, 300);
                    } else {
                        if (popup.style.display === 'flex') {
                            popup.style.opacity = 0;
                            setTimeout(() => {
                                popup.style.display = 'none';
                                body.classList.remove('popup-open');
                            }, 300);
                        } else {
                            popup.style.display = 'flex';
                            setTimeout(() => {
                                popup.style.opacity = 1;
                                body.classList.add('popup-open');
                            }, 10);
                        }
                    }
                }

                // Soumission du formulaire de signalement
                document.getElementById('report-form').addEventListener('submit', function(event) {
                    event.preventDefault();

                    const postId = document.getElementById('reportPostId').value;
                    const reportMessage = document.getElementById('reportMessage').value;

                    fetch(`/posts/${postId}/report`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            reason: reportMessage
                        })
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            alert('Votre signalement a été envoyé avec succès');
                            togglePopup('report-popup', true);
                        } else {
                            alert('Une erreur est survenue. Veuillez réessayer.');
                        }
                    }).catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
                });
            });

            // JavaScript pour la gestion des likes et commentaires
            document.addEventListener('DOMContentLoaded', function() {
                var likeIcons = document.querySelectorAll('.like-icon');
                var commentIcons = document.querySelectorAll('.comment-icon');

                likeIcons.forEach(function(icon) {
                    icon.addEventListener('click', function() {
                        var postId = icon.dataset.postId;
                        var likeContainer = document.getElementById('likeButton-' + postId);
                        var likeCount = document.getElementById('likeCount-' + postId);
                        var isActive = likeContainer.classList.contains('liked');
                        var url = '/posts/' + postId + '/like';
                        var method = isActive ? 'DELETE' : 'POST';

                        fetch(url, {
                            method: method,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        }).then(function(response) {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error('Network response was not ok.');
                        }).then(function(data) {
                            likeContainer.classList.toggle('liked');
                            likeCount.textContent = data.likesCount;
                        }).catch(function(error) {
                            console.error('There was a problem with the fetch operation:',
                                error);
                        });
                    });
                });

                // Gestion de l'affichage des commentaires
                commentIcons.forEach(function(icon) {
                    icon.addEventListener('click', function() {
                        var postId = icon.dataset.postId;
                        var commentsSection = document.getElementById('commentsSection-' + postId);
                        if (commentsSection.style.display === 'none' || commentsSection.style
                            .display === '') {
                            commentsSection.style.display = 'block';
                        } else {
                            commentsSection.style.display = 'none';
                        }
                    });
                });

                // Popup de confirmation avant envoi du formulaire de signalement
                var reportForms = document.querySelectorAll('.report-form');
                reportForms.forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        var confirmation = confirm(
                            'Êtes-vous sûr de vouloir envoyer ce message de signalement ?');
                        if (!confirmation) {
                            event.preventDefault();
                        }
                    });
                });
            });
        </script>
    </body>

    </html>
