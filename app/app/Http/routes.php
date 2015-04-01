<?php

Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => 'auth'], function() {
  Route::resource('companies', 'CompaniesController');
  Route::resource('projects', 'ProjectsController');
  Route::resource('projects.tickets', 'TicketsController');

  Route::get('last30days/{project_id}', [
    'as'   => 'last30days', 
    'uses' => 'DashboardController@last30days'
  ]);

  Route::get('dashboard', [
     'as'    => 'dashboard.index', 
      'uses' => 'DashboardController@index'
  ]);

  Route::get('projects/tickets/times/{id}/stop', [
      'as' => 'projects.tickets.times.stop', 
      'uses' => 'TimesController@stop'
  ]);

  Route::get('projects/tickets/{id}/times/start', [
      'as' => 'projects.tickets.times.start', 
      'uses' => 'TimesController@start'
  ]);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Event::listen('illuminate.query', function($sql) {
//   var_dump($sql);
// }); 

Blade::extend(function($value) {
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});
