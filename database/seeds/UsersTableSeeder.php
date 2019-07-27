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
        $u = User::create(['name'=>'Luis', 'email' => 'luis@luis.com', 'password' => 'assdfd']);

        for($i = 0; $i < 20; $i++){
        	Post::create(['titulo' => 'lorem ipsum '.$i,
        				  'post' => 'loremo adflmo dfalorem lore',
        				  'user_id' => $u->id ]);
        }
    }
}
