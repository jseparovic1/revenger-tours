<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class)
            ->times(5)
            ->create();

        factory(Post::class)->create([
            'slug' => 'blue-lagoon-diary'
        ]);
    }
}
