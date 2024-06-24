<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/User.css" rel="stylesheet">
    <title>Publication</title>
</head>

<body>

    @extends('layout.app')

    @section('content')
        <div id="content-container" class="container">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->body }}</h5>
                        <p class="card-text">{{ $post->media_type }}</p>
                        @if ($post->media_type === 'image')
                            <img src="{{ Storage::url($post->media_link) }}" alt="Image" class="img-fluid">
                        @elseif($post->media_type === 'video')
                            <video controls class="img-fluid">
                                <source src="{{ Storage::url($post->media_link) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <h3>Comments</h3>
                    <ul class="list-group mb-4">
                        @foreach ($post->comments as $comment)
                            <li class="list-group-item">
                                <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                            </li>
                        @endforeach
                    </ul>

                    @auth
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="content">Add a comment</label>
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endauth
                </div>

                <div class="mt-4">
                    <h3>Likes</h3>
                    <form method="POST" action="{{ route('likes.store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-primary">
                            @if ($post->likes->contains('user_id', auth()->id()))
                                Unlike
                            @else
                                Like
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
