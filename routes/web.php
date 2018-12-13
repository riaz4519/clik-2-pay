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



Route::get('/invoice/create/{client_id}','InvoiceController@create')->name('invoice.create')->middleware('create_invoice');

Route::get('/invoice/show-all-invoice','InvoiceController@index')->name('invoice.index')->middleware('show_all_invoice');

Route::get('/all-client','ShowClientController@index')->name('client.show')->middleware('show_all_client');

Route::post('/create-client','CreateClientController@create')->name('client.store')->middleware('create_client');

Route::get('/create-client','CreateClientController@index')->name('client.create')->middleware('create_client');

Route::post('/user-group/create','CreateGroupController@create')->name('user_group.create');

Route::get('/user-group','UserGroupController@index')->name('user_group.index');

Route::get('/users','UsersController@index')->name('users.index');

Route::get('/admin','AdminController@index')->name('admin.index');

Auth::routes();


