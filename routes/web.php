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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::get('/accounts/netflix', 'AccountsController@netflix');
Route::get('/accounts/spotify', 'AccountsController@spotify');
Route::get('/accounts/cards', 'AccountsController@cards');
Route::resource('accounts', 'AccountsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
