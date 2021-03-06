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

//Login Routes
Route::get('/', function () { return view('login'); })->middleware('ValidateNoSession');
Route::get('login', function () { return view('login'); })->middleware('ValidateNoSession');

//Dashboard Routes
Route::get('dashboard', function (){ return view('admin'); })->middleware('ValidateSession');

//Role Routes
Route::resource('roles','RoleController', ['except' => ['destroy','show','update']]);
Route::get('roles/activate/{id}',['uses' => 'RoleController@activate']);
Route::get('roles/inactivate/{id}',['uses' => 'RoleController@inactivate']);
Route::post('roles/update',['uses' => 'RoleController@update']);

//Service Routes
Route::resource('services','ServiceController', ['except' => ['destroy','show','update']]);
Route::get('services/activate/{id}', ['uses' => 'ServiceController@activate']);
Route::get('services/inactivate/{id}', ['uses' => 'ServiceController@inactivate']);
Route::post('services/update', ['uses' => 'ServiceController@update']);

//Countries Routes
Route::resource('countries','CountryController',['except' => ['destroy','show','update']]);
Route::get('countries/activate/{id}',['uses' => 'CountryController@activate']);
Route::get('countries/inactivate/{id}',['uses' => 'CountryController@inactivate']);
Route::post('countries/update',['uses' => 'CountryController@update']);

//Users Routes
Route::resource('users','UserController',['except' => ['destroy','show','update']]);
Route::get('users/activate/{id}',['uses' => 'UserController@activate']);
Route::get('users/inactivate/{id}',['uses' => 'UserController@inactivate']);
Route::post('users/update',['uses' => 'UserController@update']);
Route::post('users/auth',['uses' => 'UserController@auth']);
Route::get('users/logout',['uses' => 'UserController@logout']);