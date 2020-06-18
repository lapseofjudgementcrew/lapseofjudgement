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


Route::get('home', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);

Route::resource('session', 'SessionController',['only' => ['create', 'store','destroy']]);

Route::get('login', [
  'uses' => 'SessionController@create',
  'as' => 'session.create'
]);

Route::post('login', [
  'uses' => 'SessionController@store',
  'as' => 'session.store'
]);

Route::get('logout', [
  'uses' => 'SessionController@destroy',
  'as' => 'session.destroy'
]);

Route::get('change-password', [
  'uses' => 'SessionController@getchangepassword',
  'as' => 'change-password'
]);

Route::post('change-password', 'SessionController@postchangepassword');

Route::get('whirlpool',[
  'uses' => 'WhirlpoolController@show',
  'as' => 'whirlpool'
]);
Route::get('whirlpool/{rowid}/{colid}/{orientation}','WhirlpoolController@show');
Route::post('whirlpool/{rowid}/{colid}/{orientation}',[
  'uses'=>'WhirlpoolController@submit',
  'as' => 'whirlpool.submit'
]);

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'

]);

Route::get('krakenhunt', [
	'as' => 'krakenhunt',
	'uses' => 'PagesController@krakenhunt'

]);
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
