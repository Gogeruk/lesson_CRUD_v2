<?php

namespace Database\Seeders;

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
        /*
        */
        $users = \App\Models\User::factory(10)->create();
        $categories = \App\Models\Category::factory(25)->create();
        $post = \App\Models\Post::factory(1000)->make(['category_id' => null, 'user_id' => null])->each(function ($post) use ($users, $categories) {
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->save();
        });

        $tags = \App\Models\Tag::factory(100)->create();
        $posts = \App\Models\Post::all();
        foreach ($posts as $key => $value) {
            $value->tags()->attach($tags->random(rand(5, 10))->pluck('id'));
        }
    }
}
