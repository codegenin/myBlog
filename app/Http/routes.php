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

// Blog Pages
get('/', function () {
    return redirect('/blog');
});
get('/blog/', 'BlogController@index');
get('/blog/{slug}', 'BlogController@showPost');

// Admin Pages
$router->group(['namespace' => 'Admin', 'middleware' => 'auth'], function() {
    get('admin', 'DashboardController@index');
    resource('admin/post', 'PostController');
    resource('admin/tag', 'TagController', [
        'except' => 'show' // Do not include this method
    ]);
    get('admin/upload', 'UploadController@index');
});

// Logging in and out
get('/auth/login',  'Auth\AuthController@getLogin');
post('/auth/login',  'Auth\AuthController@postLogin');
get('/auth/logout',  'Auth\AuthController@getLogout');