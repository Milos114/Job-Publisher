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

Route::auth();

Route::get('/home', 'HomeController@index');

// Jobs
Route::get('job-submission', 'JobController@create');
Route::post('job-submission', 'JobController@store');

// Admin
Route::get('admin/job-approve/{id}', 'AdminController@approve');
