<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'name' => 'First Post',
            'content' => '初投稿です',
            'user_id' => 1,
        ]);

        Comment::create([
            'author_name' => '山田',
            'content' => 'いいね',
            'post_id' => $post->id,
        ]);

        Comment::create([
            'author_name' => '田中',
            'content' => 'Good',
            'post_id' => $post->id,
        ]);
    }
}