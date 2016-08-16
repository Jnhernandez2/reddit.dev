<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/sayhello/{name}', function ($name) {
// 	return "HEY $name! GO FUCK YOURSELF!";
// });

Route::get('/uppercase/{word}', function ($word) {

	$upper = strtoupper("$word");
	$data = compact('upper', 'word');

	return view('uppercase', $data);
});

Route::get('/increment/{number}', function ($number) {
	
	$increment = $number + 1;
	$data = compact('increment');

	return view('increment', $data);
});

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

Route::get('/rolldice/{guess}', function($guess) {

	// $dice = [1, 2, 3, 4, 5, 6];

	$roll = mt_rand(1, 6);

	$data = compact('roll', 'guess');

	// $data = [
	// 	'roll' => $roll,
	// 	'guess' => $guess

	// ];

	return view('roll-dice', $data);
});