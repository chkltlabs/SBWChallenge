<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'EmployeeController@index');
Route::get('new', 'EmployeeController@create');
Route::post('new', 'EmployeeController@store');
Route::get('{id}', 'EmployeeController@view');
Route::get('{id}/edit', 'EmployeeController@edit');
Route::post('{id}/edit', 'EmployeeController@update');
Route::post('{id}/delete', 'EmployeeController@delete');

/*
|--------------------------------------------------------------------------
| Department Routes
|--------------------------------------------------------------------------
|
*/

Route::get('department', 'DepartmentController@index');
Route::get('department/new', 'DepartmentController@create');
Route::post('department/new', 'DepartmentController@store');
Route::get('department/{id}', 'DepartmentController@view');
Route::get('department/{id}/edit', 'DepartmentController@edit');
Route::post('department/{id}/edit', 'DepartmentController@update');
Route::post('department/{id}/delete', 'DepartmentController@delete');
