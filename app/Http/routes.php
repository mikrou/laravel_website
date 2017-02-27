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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::auth();

Route::get('login', function() {
	return view('auth.login');
});

Route::get('register', function() {
	return view('auth.register');
});

Route::get('profile', function() {
	return view('auth.profile');
});

Route::get('password/reset', function() {
	return view('auth.passwords.email');
});

Route::get('changepassword', 'UserController@index');

Route::post('changepassword', 'UserController@change');

Route::get('changeEmail', 'UserController@updateemail');

Route::post('changeEmail', 'UserController@change');

Route::post('removeuser', 'UserController@removeuser');

Route::get('/home', 'HomeController@index');


Route::get('blog', 'BlogController@index');

Route::get('portfolio', function() {
	return view('portfolio');
});

Route::get('techsites', function() {
	return view('techsites');
});

Route::get('contact', function() {
	return view('contact');
});



