<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Post;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'Ronny PA', 'email' => 'ronny.polloqueri@gmail.com', 'password' => Hash::make('Demo_Laravel')]);
    	factory(App\User::class)->times(10)->create();
    }
}
