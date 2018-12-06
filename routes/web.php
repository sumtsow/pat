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

Route::get('/', 'Controller@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test/{locale?}', 'Controller@test')->name('test');

Route::get('/gallery', 'AlbumController@index')->name('gallery');

Route::get('/admin/gallery', 'AlbumController@index')->name('gallery')->middleware('can:view, App\Album');

Route::get('/gallery/{album?}', 'AlbumController@show')->name('album');

Route::get('/album/create', 'AlbumController@create')->middleware('auth');

Route::get('/gallery/{album}/edit', 'AlbumController@edit')->middleware('auth');

Route::delete('/gallery/{album}', 'AlbumController@destroy')->middleware('auth');

Route::get('/pdf/{page?}', 'Controller@pdf')->name('pdf');

Route::get('{page?}', 'Controller@view')->name('page');

Route::get('/password/reset/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

Route::get('setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

Route::get('{page?}/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');
