<?php

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
    	// dd(factory(App\Post::class));
       factory(App\Post::class, 167)->create();
    }
}
