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

Route::get('/', function () { return view('login'); });

Route::get('login', function () { return view('login'); });

Route::get('dashboard', function (){ return view('admin'); });

//Role Routes
Route::resource('roles','RoleController', ['except' => ['destroy','show','update']]);
Route::get('roles/activate/{id}',['uses' => 'RoleController@activate']);
Route::get('roles/inactivate/{id}',['uses' => 'RoleController@inactivate']);
Route::post('roles/update',['uses' => 'RoleController@update']);