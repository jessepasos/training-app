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

//new routes for admin start
Route::group(['middleware' => ['web']], function () {
    Route::auth();

    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::get('/admin', 'AdminController@index');

});
//new routes for admin end



Route::get('/', 'WelcomeController@index');



//Route::get('/the-black-perl', 'ShipController@theBlackPerl');


//pirates
Route::get('/pirate-new', 'PirateController@create');
Route::post('/pirate-new', 'PirateController@store');
Route::get('/pirate', 'PirateController@index');
Route::get('/pirate/{id}', 'PirateController@show');
Route::post('/pirate/{id}', 'PirateController@update');
Route::post('/pirate-remove/{id}', 'PirateController@removeFromShip');


//seaports
Route::get('/seaport-new',  'SeaportController@create');
Route::post('/seaport-new',  'SeaportController@store');

Route::get('/seaport',  'SeaportController@index');

Route::get('/seaport/{id}',  'SeaportController@show');
Route::post('/seaport/{id}', 'SeaportController@update');
Route::post('/seaport/{id}/attack', 'SeaportController@getAttacked');


//ships
Route::get('ship', 'ShipController@index');
Route::get('/ship/{id}',  'ShipController@show');
Route::post('/ship/{id}', 'ShipController@update');



Route::get('/home', 'HomeController@index');



//Authorization
Route::get('/user-not-admin', 'HomeController@userNotAdmin');


//test routes
Route::get('protected', [
    'middleware' => ['auth', 'admin'],
    function() {
        return "this page requires that you be logged in and an Admin";
    }
]);