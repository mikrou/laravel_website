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
Route::get('login', function() {
	return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function() {
	return view('auth.register');
});

Route::get('blog', function() {
	return view('blog');
});

Route::get('portfolio', function() {
	return view('portfolio');
});

Route::get('techsites', function() {
	return view('techsites');
});

Route::get('contact', function() {
	return view('contact');
});

Route::get('profile', function() {
	return view('auth.profile');
});

Route::get('password/reset', function() {
	return view('auth.passwords.email');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::auth();

Route::get('/home', 'HomeController@index');

