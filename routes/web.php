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

// Main page
Route::get('/', 'Controller@index')->name('index');

// Admin Dashboard
Route::get('/home', 'HomeController@index')->name('home');

// Albums List
Route::get('/gallery', 'AlbumController@index')->name('gallery');

// Album view
Route::get('/gallery/{album}', 'AlbumController@show')->name('album');

// PDF page view
Route::get('/pdf/{page?}', 'Controller@pdf')->name('pdf');

// HTML page view
Route::get('{page?}', 'Controller@view')->name('page');

// Test attempt
Route::get('/test/{locale?}', 'Controller@test')->name('test');

// Album Create Form page
Route::get('/album/create', 'AlbumController@create')->middleware('can:create, App\Album');

// Album Edit Form page
Route::get('/gallery/{album}/edit', 'AlbumController@edit')->middleware('can:update, App\Album');

// Album Update action
Route::put('/gallery/{album}', 'AlbumController@update')->middleware('can:update, App\Album');

// Album Delete action
Route::delete('/gallery/{album}', 'AlbumController@destroy')->middleware('can:delete, App\Album');

// Password reset Email Form Language switch action
Route::get('/password/reset/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

//Language switch action
Route::get('setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

// HTML Page Language switch action
Route::get('{page?}/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');
