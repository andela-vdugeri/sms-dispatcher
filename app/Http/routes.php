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

Route::get('/login', [
    'uses'          => 'Auth\AuthController@getLogin',
    'as'            => 'login.page',
    'middleware'    => ['guest']
]);

Route::post('/login', [
    'uses'          => 'Auth\AuthController@postLogin',
    'as'            => 'user.login',
    'middleware'    => ['guest']
]);

Route::post('/register', [
    'uses'          => 'Auth\AuthController@postRegister',
    'as'            => 'user.register',
    'middleware'    => ['guest']
]);

Route::get('/logout', [
    'uses'      => 'Auth\AuthController@getLogout',
    'as'        => 'user.logout',
    'middleware'=> ['auth']
]);

Route::get('/home', [
    'uses'      => 'HomeController@index',
    'as'        => 'user.home',
    'middleware'=> ['auth']
]);