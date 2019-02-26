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

Auth::routes(['verify' => true]);

// Main page
Route::get('/', 'Controller@index')->name('index');

// Admin Dashboard
Route::get('/home', 'HomeController@index')->name('home')->middleware('can:admin, App\User')->middleware('verified');

// Albums List
Route::get('/gallery', 'AlbumController@index')->name('gallery');

// Album view
Route::get('/gallery/{album}', 'AlbumController@show')->name('album');

// Post visiblity update
Route::get('/blog/check/{id}', 'PostController@update')->middleware('can:admin, App\User')->middleware('verified');

// Posts admin view
Route::get('/blogadmin', 'PostController@show')->middleware('can:admin, App\User')->name('blogadmin')->middleware('verified');

// Posts view
Route::get('/blog', 'PostController@index')->name('blog')->middleware('isAdmin')->middleware('verified');

// Post store
Route::post('/blog', 'PostController@store')->middleware('auth')->middleware('verified');

// Post delete
Route::delete('/blog/{id}', 'PostController@destroy')->middleware('can:admin, App\User')->middleware('verified');

// HTML pages list for Admin
Route::get('/html', 'HtmlController@index')->name('html')->middleware('can:admin, App\User')->middleware('verified');

// new HTML file create form
Route::get('/html/create', 'HtmlController@create')->middleware('can:admin, App\User')->middleware('verified');

// edit HTML file form
Route::get('/html/{filename}/edit/{saved?}', 'HtmlController@edit')->middleware('can:admin, App\User')->middleware('verified')->name('htmleditor');

// update HTML file action
Route::put('/html/{filename}', 'HtmlController@update')->middleware('can:admin, App\User')->middleware('verified');

// delete HTML file action
Route::delete('/html/{filename}', 'HtmlController@destroy')->middleware('can:admin, App\User')->middleware('verified');

// new HTML file store action
Route::post('/html', 'HtmlController@store')->middleware('can:admin, App\User')->middleware('verified');

// PDF files list view
Route::get('/pdf', 'PdfController@index')->middleware('can:admin, App\User')->middleware('verified');

// PDF files upload action
Route::post('/pdf/create', 'PdfController@create')->middleware('can:admin, App\User')->middleware('verified');

// PDF files delete action
Route::delete('/pdf/delete/{page}', 'PdfController@destroy')->middleware('can:admin, App\User')->middleware('verified');

// PDF page view
Route::get('/pdf/{page?}', 'PdfController@show')->name('pdf');

// User state switch action
Route::get('/users/switchstate/{id}', 'UserController@switchstate')->middleware('can:admin, App\User')->middleware('verified');

// Users list view
Route::get('/users', 'UserController@index')->name('users')->middleware('can:admin, App\User')->middleware('verified');

// User edit form
Route::get('/users/{id}', 'UserController@edit')->middleware('can:admin, App\User')->middleware('verified');

// User update form
Route::put('/users/{id}', 'UserController@update')->middleware('can:admin, App\User')->middleware('verified');

// Users delete action
Route::delete('/users/{id}', 'UserController@destroy')->middleware('can:admin, App\User')->middleware('verified');

// Password change form
Route::get('/me', 'UserController@passwd')->middleware('auth')->middleware('verified');

// Password change action
Route::put('/passwd', 'UserController@savepasswd')->middleware('auth')->middleware('verified');

// Test attempt
Route::get('/test', 'Controller@test')->name('test');

// Album Create Form page
Route::get('/album/create', 'AlbumController@create')->middleware('can:admin, App\User')->middleware('verified');

// Photo Create Form action
Route::post('/photo/create', 'AlbumController@store')->middleware('can:admin, App\User')->middleware('verified');

// Album Edit Form page
Route::get('/gallery/{album}/edit', 'AlbumController@edit')->middleware('can:admin, App\User')->middleware('verified');

// Album Update action
Route::put('/gallery/{album}', 'AlbumController@update')->middleware('can:admin, App\User')->middleware('verified');

// Album Delete action
Route::delete('/gallery/{album}', 'AlbumController@destroy')->middleware('can:admin, App\User')->middleware('verified');

// Photo Delete action
Route::delete('/gallery/{album}/photo/{photo}', 'AlbumController@delete')->middleware('can:admin, App\User')->middleware('verified');

// HTML page view
Route::get('{page?}', 'Controller@view')->name('page');

//Language switch action
Route::get('/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');
