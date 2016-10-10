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

Auth::routes();

Route::resource('/profile', 'ProfileController');

Route::get('/home', 'HomeController@index');

Route::get('/protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);
