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

Route::get('/', 'SubscribersController@index')->name('index');
Route::post('/subscribe', 'SubscribersController@subscribe')->name('subscribe');
Route::get('/subscribe/{id?}/{key?}', 'SubscribersController@management')->name('subscriber-link');
Route::get('/subscribe-toggle/{id?}/{key?}', 'SubscribersController@subscribeToggle')->name('subscribe-toggle');

//Auth::routes();
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::any('admin/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'Admin\SubscribersController@index')->middleware(['auth', 'admin']);
