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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'todos', 'as' => 'todos.'], function() {
  Route::get('',             ['as' => 'index',   'uses' => 'TodoController@index']);
  Route::get('create',       ['as' => 'create',  'uses' => 'TodoController@create']);
  Route::post('store',       ['as' => 'store',   'uses' => 'TodoController@store']);
  Route::get('show/{id}',    ['as' => 'show',    'uses' => 'TodoController@show']);
  Route::get('edit/{id}',    ['as' => 'edit',    'uses' => 'TodoController@edit']);
  Route::post('update/{id}', ['as' => 'update',  'uses' => 'TodoController@update']);
  Route::get('delete/{id}',  ['as' => 'delete',  'uses' => 'TodoController@delete']);
  Route::post('destroy/{id}',['as' => 'destroy', 'uses' => 'TodoController@destroy']);
});

Route::group(['prefix' => 'admin/combos', 'as' => 'combos.'], function() {
  Route::get('',             ['as' => 'index',   'uses' => 'ComboController@index']);
  Route::get('create',       ['as' => 'create',  'uses' => 'ComboController@create']);
  Route::post('store',       ['as' => 'store',   'uses' => 'ComboController@store']);
  Route::get('show/{id}',    ['as' => 'show',    'uses' => 'ComboController@show']);
  Route::get('edit/{id}',    ['as' => 'edit',    'uses' => 'ComboController@edit']);
  Route::post('update/{id}', ['as' => 'update',  'uses' => 'ComboController@update']);
  Route::get('delete/{id}',  ['as' => 'delete',  'uses' => 'ComboController@delete']);
  Route::post('destroy/{id}',['as' => 'destroy', 'uses' => 'ComboController@destroy']);
});
