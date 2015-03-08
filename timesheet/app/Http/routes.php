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

Route::get('home', 'HomeController@index');

Route::resource('companies', 'CompaniesController');
Route::resource('projects', 'ProjectsController');
Route::resource('projects.tickets', 'TicketsController');


Route::get('projects/tickets/times/{id}/stop', [
    'as' => 'projects.tickets.times.stop', 
    'uses' => 'TimesController@stop'
]);

Route::get('projects/tickets/{id}/times/start', [
    'as' => 'projects.tickets.times.start', 
    'uses' => 'TimesController@start'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
