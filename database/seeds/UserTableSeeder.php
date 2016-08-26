<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(App\User::class, 50)->create();
    	$user = new User();
    	$user->name = 'John Hernandez';
    	$user->email = 'john@john.com';
    	$user->password = Hash::make("123");
    	$user->save();
    }
}
