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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/masuk/', 'LoginController@masuk');
Route::post('/akses/', 'LoginController@akses');
Route::get('/hasil/', 'LoginController@hasil');
Route::get('data/', 'LoginController@data');
Route::get('keluar/', 'LoginController@keluar');