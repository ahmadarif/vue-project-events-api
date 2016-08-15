<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $app->get('/', function() use ($app) {
// 	return $app->version();
// });

$app->group(['prefix' => 'api/v1', 'namespace' => 'App\Http\Controllers'], function($app) {
	$app->get('event', 'EventController@index');
	$app->get('event/{id}', 'EventController@getEvent');
	$app->post('event', 'EventController@saveEvent');
	$app->put('event/{id}', 'EventController@updateEvent');	
	$app->delete('event/{id}', 'EventController@deleteEvent');
});