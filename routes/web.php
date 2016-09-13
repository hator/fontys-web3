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

Route::get('/', 'ArticlesController@index');

Route::resource('articles', 'ArticlesController', ['only' => [
    'index', 'show'
]]);

Auth::routes();

Route::get('/profile/{id}', 'ProfileController@show')->name('profile');

Route::get('/home', 'HomeController@index');
