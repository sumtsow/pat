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

Route::get('test/{locale?}', 'Controller@test')->name('test');

Route::get('gallery', 'AlbumController@index')->name('gallery');

Route::get('gallery/{album?}', 'AlbumController@album')->name('album');

Route::get('pdf/{page?}', 'Controller@pdf')->name('pdf');

Route::get('{page?}', 'Controller@view')->name('page');

Route::get('password/reset/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

Route::get('setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

Route::get('{page?}/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');
