<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['id' => 1, 'title' => 'post one', 'description' => 'description one', 'status' => '1'],
            ['id' => 2, 'title' => 'post two', 'description' => 'description two', 'status' => '0'],
            ['id' => 3, 'title' => 'post three', 'description' => 'description three', 'status' => '6'],
            ['id' => 4, 'title' => 'post four', 'description' => 'description four', 'status' => '3'],
            ['id' => 5, 'title' => 'post five', 'description' => 'description five', 'status' => '4'],
        ];
        Post::insert($posts);
    }
}
