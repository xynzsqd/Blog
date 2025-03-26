<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(5)->create();

        User::factory()->count(10)->create()->each(function ($user) {
            $posts = Post::factory()->count(3)->create([
                'user_id' => $user->id,
            ]);
            $posts->each(function ($post) {
                $categories = Category::inRandomOrder()->limit(rand(1,3))->get();
                $post->categories()->attach($categories);
                Comment::factory(5)->create([
                    'user_id' => User::inRandomOrder()->value('id'),
                    'post_id' => $post->id,
                ]);
            });
        });
    }
}
