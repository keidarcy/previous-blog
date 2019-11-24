<?php

use Illuminate\Database\Seeder;
use App\XModels\Post;
use App\XModels\Topic;
use App\XModels\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 5)->create()
        ->each(function ($post) {
            $post->tags()->save(factory(Tag::class)->make());
        })
        ->each(function ($post) {
            $post->topic()->save(factory(Topic::class)->make());
        });
    }
}
