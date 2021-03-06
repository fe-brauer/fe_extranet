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

Route::get('/', 'HomeController@index')->name('albums');

Route::resource('albums', 'AlbumController');
Route::get('albums/{slug}', 'AlbumController@show')->name('albums.show');

Route::resource('photos', 'PhotoController');
