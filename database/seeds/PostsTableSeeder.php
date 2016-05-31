<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        factory(Post::class)->times(20)->make()->each(function($post) use ($users){
            $post->author_id = $users->random()->id;
            $post->save();
        });

    }
}
