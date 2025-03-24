<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $posts = Post::factory(3)->create([
                'user_id' => $user->id,
            ]);

            $posts->each(function ($post) {
                Comment::factory(5)->create([
                    'user_id' => User::inRandomOrder()->value('id'),
                    'post_id' => $post->id,
                ]);
            });
        });
    }
}
