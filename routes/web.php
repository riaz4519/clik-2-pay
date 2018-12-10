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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/user-group','UserGroupController@index')->name('user_group.index');

Route::get('/users','UsersController@index')->name('users.index');

Route::get('/admin','AdminController@index')->name('admin.index');

Auth::routes();


