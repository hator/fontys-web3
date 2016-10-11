<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/download', 'ArticlesController@download');

Route::get('/', 'ArticlesController@index');

Route::resource('/articles', 'ArticlesController');

Route::group(['namespace' => 'Auth'], function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
    Route::post('/register', 'RegisterController@register');
    Route::get('/register', 'RegisterController@showRegistrationForm');
});

Route::resource('/profile', 'ProfileController');

Route::get('/home', 'HomeController@index');

Route::get('/adminpanel', 'ProfileController@showAdminPanel')->middleware('auth', 'admin');

Route::get('/search', 'ArticlesController@search');
