<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCommentsRequest;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(StorePostCommentsRequest $request, Post $post)
    {
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body
        ]);

        return back();
    }
}
