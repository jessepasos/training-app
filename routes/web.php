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

Route::get('/', 'WelcomeController@index');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
Route::get('/the-black-perl', 'ShipController@theBlackPerl');

//Pirate stuff
Route::get('/pirate/{id}', 'PirateController@index');
Route::post('/update-pirate', 'PirateController@update');
Route::post('/new-pirate', 'PirateController@new');


// The first ship the user gets
Route::get('/commandeer', 'ShipController@commandeer');
Route::post('/commandeer', 'ShipController@saveShip');
// Future ships will use this creation
Route::post('/ship-new', 'ShipController@saveShip');
Route::post('/ship-level-up', 'ShipController@shipLevelUp');
//Store to hire extra crew and buy cannons
Route::post('ship-store', 'ShipController@shipStore');

//Attacking
Route::get('/attack-home', 'AttackController@index');
Route::post('/attack', 'AttackController@attack');


