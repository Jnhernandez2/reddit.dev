<?php

use App\Post;
use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Laravel Main Page
Route::get('/', 'HomeController@showWelcome');

// Route::get('/sayhello/{name}', function ($name) {
// 	return "HEY $name! GO FUCK YOURSELF!";
// });

Route::get('/roll-dice/{guess}', 'HomeController@rollDice');

Route::get('/uppercase/{word}', 'HomeController@upperCase');

Route::get('/increment/{number}', 'HomeController@increment');

Route::get('/add/{number1}/{number2}', function ($number1, $number2) {
	return $number1 + $number2;
});

Route::get('/sayhello/{firstName}/{lastName}', function($firstName, $lastName)
{
    if ($firstName == "Chris") {
        return Redirect::to('/');
    }

    $data = [

    	'firstName' => $firstName,
    	'lastName' => $lastName

    ];

    return view('my-first-view', $data);
});

Route::get('/rolldice/{guess}', 'HomeController@rollDice');

// Route::get('/posts', 'PostsController@index');
// Route::get('/posts/create', 'PostsController@create');
// Route::post('/posts', 'PostsController@store');
// Route::get('/posts/{post}', 'PostsController@show');
// Route::get('/posts/{post}/edit', 'PostsController@edit');
// Route::put('/posts/{post}', 'PostsController@update');
// Route::delete('/posts/{post}', "PostsController@destroy");

//This one line does the same thing as ALL OF THAT^^^^^
//Routes for ALL posts.
Route::resource('posts', 'PostsController');
Route::get('/search', 'PostsController@searchByPostOrUser');


//Test Route
Route::get('orm-test', function() {

	$post1 = new Post();
	$post1->title = 'Eloquent is awesome!';
	$post1->url='https://laravel.com/docs/5.1/eloquent';
	$post1->content  = 'It is super easy to create a new post.';
	$post1->created_by = 1;
	$post1->save();

	$post2 = new Post();
	$post2->title = 'Eloquent is really easy!';
	$post2->url='https://laravel.com/docs/5.1/eloquent';
	$post2->content = 'It is super easy to create a new post.';
	$post2->created_by = 1;
	$post2->save();

});

//Authentication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Again, this line does all that ^^^^ and below.
//Route::resource('auth', 'AuthController');


//Registration Routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::put('users/password/{id}', 'UsersController@updatePassword');
Route::get('users/password/{id}', 'UsersController@editPassword');
Route::resource('users', 'UsersController');

