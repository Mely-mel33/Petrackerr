<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        $post->comments()->save($comment);
        return back();
    }


    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function reply(Request $request, Comment $comment)
{
    \Log::info('Reply request received', ['request' => $request->all()]);

    $request->validate([
        'content' => 'required|string|max:500'

    ]);

    $reply = new Reply();
    $reply->content = $request->content;
    $reply->user_id = auth()->id();
    $comment->replies()->save($reply);
    \Log::info('Reply saved', ['reply' => $reply]);
    return back();
}
    // Supprimer une réponse
    public function destroyReply(Request $request, Reply $reply)
    {
        $reply->delete();
        return back();
    }
}
