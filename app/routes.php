<?php

Route::get('/', ['as' => 'root', function() {
  return View::make('pages.index');
}]);

Route::get('login', [
	'as'   => 'login',
	'uses' => 'UsersController@login'
]);

Route::post('login', [
	'as'   => 'login',
	'uses' => 'UsersController@handleLogin'
]);

Route::get('register', [
	'as'   => 'register',
	'uses' => 'UsersController@register'
]);

Route::get('logout', [
	'as'   => 'logout',
	'uses' => 'UsersController@logout'
]);

Route::resource('user', 'UsersController');

Route::group(array('before' => 'auth'), function()
{
	Route::resource('projects', 'ProjectsController');
	Route::resource('tasks', 'TasksController', ['except' => ['index', 'create']]);

	Route::get('project/{project_id}/tasks', [
		'as'   => 'tasks.index',
		'uses' => 'TasksController@index'
	]);

	Route::get('project/{project_id}/tasks/create', [
		'as'   => 'tasks.create',
		'uses' => 'TasksController@create'
	]);

	Route::resource('timestamps', 'TimestampsController');
	Route::get('/timestamp/{timestamp_id}/end', [
		'as'   => 'timestamps.end',
		'uses' => 'TimestampsController@end'
	]);
});


