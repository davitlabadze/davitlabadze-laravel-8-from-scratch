<?php

namespace App\Http\Controllers;

# TODO: remove unused imports

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
  public function index()
  {
    return view('admin.posts.index',[
        'posts' => Post::paginate(50)
    ]);
  }

  # TODO
  # If you are returning only views, 
  # You can do this from the routes file like this:
  # Route::view('route', 'view');
  # @see https://laravel.com/docs/8.x/routing#view-routes
  public function create(){

    return view('admin.posts.create');
}

public function store()
{ # TODO: remove blank lines below
  
  
  Post::create(array_merge($this->validatePost(),[
    'user_id' => request()->user()->id,
    'thumbnail' => request()->file('thumbnail')->store('thumbnails')
  ]));

  return redirect('/');  
} 

  public function edit(Post $post)
  {
    return view('admin.posts.edit',['post' => $post]);
  }

  public function update(Post $post)
  {
    $attributes = $this->validatePost($post);

    if ($attributes['thumbnail'] ?? false) {
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }
    $post->update($attributes);
    return back()->with('success', 'Post Updated!');
  
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return back()->with('success', 'Post Deleted!'); # TODO: remove blank line below

  }

  protected function validatePost(?Post $post = null): array
  {
    # TODO 
    # validation logic should be extracted
    # Into custom request
    # @see https://laravel.com/docs/8.x/validation#form-request-validation

    $post ??= new Post();
  
    return request()->validate([
      'title' => 'required',
      'thumbnail' => $post->exists ? ['image'] : ['required','image'],
      'slug' => ['required', Rule::unique('posts','slug')->ignore('$post')],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories','id')],
      'published_at' => 'requred'
    ]); # TODO: remove blank line below
    
  }
}