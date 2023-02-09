<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        if (!$post->isLikedBy($request->user())) {
            $post->likes()->create([
                'user_id' => $request->user()->id,
            ]);
        }
        return back();
    }
    public function destroy(Request $request, Post $post)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
