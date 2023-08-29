<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $frontend = Category::factory()->create(['name' => 'frontend', 'slug' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend', 'slug' => 'backend']);
        $dean = User::factory()->create(['name' => 'Dean', 'username' => 'dean']);
        $zoro = User::factory()->create(['name' => 'Zoro', 'username' => 'zoro']);

        Blog::factory(2)->create(['category_id' => $frontend->id, 'user_id' => $dean->id]);
        Blog::factory(2)->create(['category_id' => $backend->id, 'user_id' => $zoro->id]);

        Comment::factory(1)->create(['user_id' =>$dean->id, 'blog_id' => 4]);   
        Comment::factory(1)->create(['user_id' =>$zoro->id, 'blog_id' => 4]);   
    }
}
