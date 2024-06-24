<?php

namespace App\Livewire\Components;

use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class CreatePost extends Component
{
    use WithFileUploads;
    public $content;
    public $images;
    public $video;

    public function render()
    {
        return view('livewire.components.create-post');
    }

    public function createpost()
    {
        $this->validate([
            "content" => "required|string",
            /*"images.*" => "image|mimes:jpeg,png,jpg,gif|max:10240", 
            "video" => "mimes:mp4,avi,mov,wmv|max:20480",*/
        ]);

        DB::beginTransaction();
        try {
            // Création de la publication
            $post = Post::create([
                "uuid" => Str::uuid(),
                "user_id" => auth()->id(),
                "content" => $this->content,
            ]);

            $images = [];
            // if post his media
            if ($this->images) {
                foreach ($this->images as $image) {
                    $images[] = $image->store("posts/images", "public");
                }
                PostMedia::create([
                    "post_id" => $post->id,
                    "file_type" => "image",
                    "file" => json_encode($images),
                    "position" => "general",
                ]);
            }


            $video_file_name = "";
            if ($this->video) {
                $video_file_name = $this->video->store("posts/video", "public");
                PostMedia::create([
                    "post_id" => $post->id,
                    "file_type" => "video",
                    "file" => $video_file_name,
                    "position" => "general",
                ]);
            }


            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        // Réinitialisation du champ content et des images
        unset($this->content);
        unset($this->images);
        unset($this->video);
        session()->flash('message', 'Votre publication a bien été publiée.');
    }
}
