<?php


/*
|--------------------------------------------------------------------------
| Welcome Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for authentication.
| 
|
*/

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


/*
|--------------------------------------------------------------------------
| User Action Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for user actions.
| 
|
*/

Route::get('/home', [
    'uses'      => 'HomeController@index',
    'as'        => 'user.home',
    'middleware'=> ['auth']
]);


Route::get('/about', [
    'uses' => 'PagesController@about',
    'as'   => 'about'
]);

Route::post('/messages/units', [
    'uses'          => 'UserController@makePayment',
    'as'            => 'payments.request',
    'middleware'    => ['auth']
]);

Route::get('/messages',[
    'uses'          => 'PagesController@history',
    'as'            => 'messages.page',
    'middleware'    => ['auth']
]);

Route::get('/history/{id}',[
    'uses'          => 'UserController@deleteHistory',
    'as'            => 'history.delete',
    'middleware'    => ['auth']
]);

Route::post('/message/send', [
    'uses'          => 'MessagesController@send',
    'as'            => 'message.send',
    'middleware'    => ['auth']
]);

Route::get('/messages/schedule', [
    'uses'          => 'MessagesController@loadSchedulePage',
    'as'            => 'schedule.loadPage',
    'middleware'    => ['auth']
]);

Route::post('/messages/schedule', [
    'uses'          => 'MessagesController@scheduleSms',
    'as'            => 'message.schedule',
    'middleware'    => ['auth']
]);


/*
|--------------------------------------------------------------------------
| Admin Action Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an admin.
| 
*/


Route::get('/admin/users', [
    'uses'          => 'AdminController@listUsers',
    'as'            => 'list.users',
    'middleware'    => ['admin']
]);

Route::get('/payments', [
    'uses'          => 'AdminController@listUserPayments',
    'as'            => 'user.payments',
    'middleware'    => ['admin']
]);

Route::get('/pricing', [
    'uses'          => 'AdminController@showPricing',
    'as'            => 'admin.pricing',
    'middleware'    => ['admin']
]);

Route::post('/pricing/{id}', [
    'uses'          => 'AdminController@adjustPrice',
    'as'            => 'pricing.adjust',
    'middlware'     => ['admin']
]);

Route::post('/payment/confirm/{id}',[
    'uses'          => 'AdminController@confirmPayment',
    'as'            => 'payment.confirm',
    'middleware'    => ['admin']
]);