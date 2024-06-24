<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Afficher toutes les publications
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('PagesUser.posts.index', compact('posts'));
    }

    // Afficher le formulaire de création de publication
    public function create()
    {
        return view('posts.create');
    }

    // Enregistrer une nouvelle publication
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'mimes:mp4,mov,ogg|max:20000'
        ]);

        $post = new Post();
        $post->content = $request->content;

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName;
            }
            $post->images = json_encode($imageNames); 
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos'), $videoName);
            $post->video = $videoName;
        }

        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Publication ajoutée avec succès!');
    }

    // Supprimer une publication
    public function destroy(Post $post)
    {
        // Vérifier si l'utilisateur est autorisé à supprimer cette publication
        if ($post->user_id != auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette publication.');
        }

        // Supprimer les fichiers associés à la publication
        if ($post->images) {
            foreach (json_decode($post->images) as $image) {
                $imagePath = public_path('images/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        if ($post->video) {
            $videoPath = public_path('videos/' . $post->video);
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
        }

        // Supprimer la publication
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publication supprimée avec succès!');
    }
}
