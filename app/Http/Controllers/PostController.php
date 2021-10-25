<?php

namespace App\Http\Controllers;

use App\Models\Post; # TODO: remove 1 blank line below


class PostController extends Controller
{
    public function index()
    { # TODO: remove blank lines below
     
        
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search','category','author'])
            )->simplePaginate(6)
          ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',['post' => $post]);
    } # TODO: remove blank lines below
    


}
