<?php


namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use App\Models\SavedPost;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{



    public $paginate_no = 9;
    public $comment;
    public $hide_user_list = [];

    public $listeners = [
        "load-more" => 'LoadMore'
    ];

    public function LoadMore()
    {
        $this->paginate_no = $this->paginate_no + 3;
    }

    public function saveComment($post_id)
    {
        $this->validate([
            "comment" => "required|string"
        ]);
        DB::beginTransaction();
        try {
            Comment::firstOrCreate([
                "post_id" => $post_id,
                "comment" => $this->comment,
                "user_id" => auth()->id()
            ]);
            $post = Post::findOrFail($post_id);
            $post->comments += 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        unset($this->comment);
    }

    public function like($id)
    {
        DB::beginTransaction();
        try {
            Like::firstOrCreate(["post_id" => $id, "user_id" => auth()->id()]);
            $post = Post::findOrFail($id);
            $post->likes += 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function dislike($id)
    {
        DB::beginTransaction();
        try {
            $like = Like::where(["post_id" => $id, "user_id" => auth()->id()])->first();
            $like->delete();
            $post = Post::findOrFail($id);
            $post->likes -= 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
        public function save($post_id)
    {
        SavedPost::firstOrCreate([
            "user_id" => auth()->id(),
            "post_id" => $post_id
        ]);

        $this->dispatchBrowserEvent('alert', [
            "type" => "success",
            "message" => "Item Saved"
        ]);
    }

    public function render()
    {
        



        $random_users = User::inRandomOrder()->take(100)->pluck("id");
        // whereIn("group_id", $my_groups)->orWhereIn("user_id", $random_users)->OrwhereIn("user_id", $filtered_friends_ids)->OrWhereIn("page_id", $my_pages)->with(["user","page","group"])->
        $posts = Post::where("status", "published")->latest()->paginate($this->paginate_no);


        return view('livewire.home', [
            'posts' => $posts,
        ])->extends("layouts.app");
    }
}

