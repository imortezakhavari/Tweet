<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->with(['user', 'likes'])->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);
        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
