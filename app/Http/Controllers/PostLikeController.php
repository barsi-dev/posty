<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function store(Post $post, Request $req)
    {
        if ($post->likedBy($req->user())) {
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id' => $req->user()->id
        ]);

        return back();
    }

    public function destroy(Post $post, Request $req)
    {
        $req->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
