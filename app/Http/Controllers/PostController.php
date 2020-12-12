<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::with(['user', 'likes'])->latest()->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)

    {
        return view('posts.post', [
            'post' => $post
        ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'body' => 'required'
        ]);

        $req->user()->posts()->create($req->only('body'));

        return back();
    }

    public function destroy(Post $post, Request $req)
    {
        dd($post);
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}