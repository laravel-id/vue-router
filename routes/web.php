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

Route::post('/user', 'UserController@store');
Route::get('/user/paginate', 'UserController@paginate');
Route::get('/user/{id}', 'UserController@show');
Route::get('/user', 'UserController@view');
