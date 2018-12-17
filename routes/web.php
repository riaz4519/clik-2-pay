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


/*invoice*/

    Route::get('/invoice/paid','InvoiceController@paid')->name('invoice.paid')->middleware('show_all_invoice');

    Route::get('/invoice/pending','InvoiceController@pending')->name('invoice.pending')->middleware('show_all_invoice');





    Route::post('/invoice/delete/{invoice_id}','InvoiceController@delete')->name('invoice.delete');
    Route::post('/invoice/edit/{invoice_id}','InvoiceController@update')->name('invoice.update');

    Route::get('/invoice/edit/{invoice_id}','InvoiceController@edit')->name('invoice.edit')->middleware('edit_invoice');

    Route::post('/invoice/create/{client_id}','InvoiceController@store')->name('invoice.store');

    Route::get('/invoice/create/{client_id}','InvoiceController@create')->name('invoice.create')->middleware('create_invoice');

    Route::get('/invoice/show-all-invoice','InvoiceController@index')->name('invoice.index')->middleware('show_all_invoice');

/*end invoice*/

/*client*/

    Route::get('/all-client','ShowClientController@index')->name('client.show')->middleware('show_all_client');

    Route::post('/create-client','CreateClientController@create')->name('client.store')->middleware('create_client');

    Route::get('/create-client','CreateClientController@index')->name('client.create')->middleware('create_client');

/*end client*/

/*user group*/

    Route::post('/user-group/edit/{role_id}','UserGroupController@editStore')->name('user_group.edit_store');
    Route::get('/user-group/edit/{role_id}','UserGroupController@edit')->name('user_group.edit');

    Route::post('/user-group/create','CreateGroupController@create')->name('user_group.create');

    Route::get('/user-group','UserGroupController@index')->name('user_group.index')->middleware('user_group');

/*end user group*/

Route::get('/users','UsersController@index')->name('users.index');

Route::get('/rm','RmController@index')->name('rm.index');
Route::get('/admin','AdminController@index')->name('admin.index');

Auth::routes();


