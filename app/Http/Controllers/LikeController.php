<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    // Ajouter un like à une publication
    public function store(Request $request, Post $post)
    {
        $like = $post->likes()->where('user_id', auth()->id())->first();

        if (!$like) {
            $like = new Like();
            $like->user_id = auth()->id();
            $post->likes()->save($like);
        }

        return response()->json([
            'likesCount' => $post->likes()->count(),
            'userLiked' => true
        ]);
    }

    // Supprimer un like d'une publication
    public function destroy(Request $request, Post $post)
    {
        $like = $post->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
        }

        return response()->json([
            'likesCount' => $post->likes()->count(),
            'userLiked' => false
        ]);
    }
}

