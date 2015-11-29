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

Route::get('/login/{provider}',[
    'uses'  => 'Auth\AuthController@doSocial',
    'as'    => 'social.login',
]);

Route::get('/register', [
    'uses'      => 'Auth\AuthController@getRegister',
    'as'        => 'register.page',
    'middleware'=> ['guest']
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


Route::get('/about', [
    'uses' => 'PagesController@about',
    'as'   => 'about'
]);

Route::get('/message', [
    'uses'       => 'PagesController@messages',
    'as'         => 'messages.page',
    'middleware' => ['auth']
]);

Route::get('/messages/units',[
   'uses'       => 'PagesController@getMessageUnits',
    'as'        => 'messages.get.units',
    'middleware'=> ['auth']
]);

Route::get('messages/history', [
    'uses'      => 'UserController@history',
    'as'        => 'messages.history',
    'middleware'=> ['auth']
]);

Route::get('/history/{{id}}',[
    'uses'          => 'UserController@deleteHistory',
    'as'            => 'history.delete',
    'middleware'    => ['auth']
]);

Route::post('/message/send', [
    'uses'      => 'MessagesController@send',
    'as'        => 'message.send',
    'middleware'=> ['auth']
]);
