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

Route::get('blog/post', ['middleware' => ['auth', 'admin'], function() {
	return view('blogform');
}]);
Route::post('blog/post', 'BlogController@createpost');

Route::get('blog/{id}', 'BlogController@blogarticle');
Route::get('blog/{id}/edit', 'BlogController@editArticle');
Route::post('blog/{id}/edit', 'BlogController@updateArticle');
Route::get('blog/{id}/remove', 'BlogController@deleteArticle');
Route::get('portfolio', function() {
	return view('portfolio');
});
Route::get('game', function() {
	return view('game');
});

Route::get('artwork', function() {
	return view('artwork');
});

Route::get('capstone', function() {
	return view('capstone');
});

Route::get('techsites', function() {
	return view('techsites');
});

Route::get('contact', function() {
	return view('contact');
});

Route::post('contact', 'HomeController@submitContactForm');
