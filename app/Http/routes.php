<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::Model('tasks', 'App\Models\Task');
Route::Model('projects', 'App\Models\Project');

Route::bind('tasks', function($value, $route) {
    return App\Models\Task::whereSlug($value)->first();
});
Route::bind('projects', function($value, $route) {
    return App\Models\Project::whereSlug($value)->first();
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('projects', 'ProjectsController');
    Route::resource('projects.tasks', 'TasksController');
});
