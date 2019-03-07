<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Jurica Šeparović',
            'email' => 'jurica.separovic@gmail.com'
        ]);

        factory(\App\User::class)->create([
            'name' => 'Đoni Rogošić',
            'email' => 'doni@revengertours.com'
        ]);
    }
}
