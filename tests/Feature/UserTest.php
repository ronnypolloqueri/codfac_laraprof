<?php

namespace Tests\Feature;

use Tests\BrowserTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use \App\User;
use \App\Post;

class UserTest extends BrowserTest
{
	use RefreshDatabase;
    /**
     * @test
     */
    public function login(){
	    $user = create(\App\User::class, [
		    'password' => Hash::make('passwdtest')
	    ]);

	    $this->visit('login')
	        ->type($user->email, 'email')
	    	->type('passwdtest', 'password')
	    	->press('Login')
	    	->seePageIs('/home');

    }

     /**
     * @test
     */
    public function login_fails(){
	    $user = create(\App\User::class,[
		    'password' => Hash::make('passwdtest')
	    ]);

	    $this->visit('login')
	        ->type($user->email, 'email')
	    	->type('passwdtest2', 'password')
	    	->press('Login')
	    	->seePageIs('/login')
	    	->see('These credentials do not match our records');
    }


     /**
     * @test
     */
    public function register(){

    	$res = \App\User::get();
    	//dd($res);
    	$this->assertEquals(0, User::count());
    	$data = [
    		'name' => 'Test name',
    		'email' => 'test@test.com',
    		'password' => 'passwdtest'
    	];

	    $this->visit('register')
	        ->type($data['name'], 'name')
	        ->type($data['email'], 'email')
	    	->type($data['password'], 'password')
	    	->type($data['password'], 'password_confirmation')
	    	->press('Register');

    	$this->assertEquals(1, User::count());

    	/**
    	* Usar User::find(1), falla porque el registro
    	* se crea con id 3, a pesar de no tener otros 
    	* registros y cambia dependiendo
    	* de cuantas veces se usó factory antes
    	*/ 
	    $user = User::get()->first();
	    $this->assertEquals($data['name'], $user->name);
    }

    /**
    * @test
    */
    public function adds_post(){
    	$this->assertEquals(0, Post::count());

    	$user = create(\App\User::class);

    	$this->actingAs($user);

    	$data = [
    		'titulo' => 'Post title',
    		'contenido' => 'Lorem ipsm dolor sit amet'
    	];

    	$this->visit('/posts/create')
    		->type($data['titulo'], 'titulo')
    		->type($data['contenido'], 'contenido')
    		->press('Crear');

    	$this->assertEquals(1, Post::count());
    }
}
