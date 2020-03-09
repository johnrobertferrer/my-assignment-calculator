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

Auth::routes();

Route::get('/', 'MainController@index');
Route::get('/export-pdf', 'MainController@exportPdf');
Route::post('/store-customer-info', 'CustomerController@store');
Route::get('/fetch-customer-settings', 'CustomerController@fetchCustomerSettings');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fetch-admin-settings', 'HomeController@fetch');
Route::post('/update-admin-settings', 'HomeController@update');
