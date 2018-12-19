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
Route::get('/home', 'HomeController@index')->name('home')->middleware('can:admin, App\User');

// Albums List
Route::get('/gallery', 'AlbumController@index')->name('gallery');

// Album view
Route::get('/gallery/{album}', 'AlbumController@show')->name('album');

// PDF files list view
Route::get('/pdf/index', 'PdfController@index')->middleware('can:admin, App\User');

// PDF files list view
Route::post('/pdf/create', 'PdfController@create')->middleware('can:admin, App\User');

// PDF page view
Route::get('/pdf/{page?}', 'PdfController@show')->name('pdf');

// HTML page view
Route::get('{page?}', 'Controller@view')->name('page');

// Test attempt
Route::get('/test/{locale?}', 'Controller@test')->name('test');

// Album Create Form page
Route::get('/album/create', 'AlbumController@create')->middleware('can:admin, App\User');

// Photo Create Form action
Route::post('/photo/create', 'AlbumController@store')->middleware('can:admin, App\User');

// Album Edit Form page
Route::get('/gallery/{album}/edit', 'AlbumController@edit')->middleware('can:admin, App\User');

// Album Update action
Route::put('/gallery/{album}', 'AlbumController@update')->middleware('can:admin, App\User');

// Album Delete action
Route::delete('/gallery/{album}', 'AlbumController@destroy')->middleware('can:admin, App\User');

// Photo Delete action
Route::delete('/gallery/{album}/photo/{photo}', 'AlbumController@delete')->middleware('can:admin, App\User');

//Language switch action
Route::get('/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');
