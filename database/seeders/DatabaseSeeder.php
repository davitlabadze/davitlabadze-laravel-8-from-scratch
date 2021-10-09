<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Post::truncate();
        Category::truncate();


        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
  

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => '<p>Loream ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi sint deleniti vel eligendi minima mollitia. Necessitatibus hic corporis numquam voluptatum animi. Consectetur perspiciatis, molestiae non unde ratione cum tenetur a.</p>',
        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => '<p>Loream ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi sint deleniti vel eligendi minima mollitia. Necessitatibus hic corporis numquam voluptatum animi. Consectetur perspiciatis, molestiae non unde ratione cum tenetur a.</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Loream ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi sint deleniti vel eligendi minima mollitia. Necessitatibus hic corporis numquam voluptatum animi. Consectetur perspiciatis, molestiae non unde ratione cum tenetur a.</p>',
        ]);

    }    
}
