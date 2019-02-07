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

// Post visiblity update
Route::get('/blog/check/{id}', 'PostController@update')->middleware('can:admin, App\User');

// Posts admin view
Route::get('/blogadmin', 'PostController@show')->middleware('can:admin, App\User')->name('blogadmin');

// Posts view
Route::get('/blog', 'PostController@index')->name('blog')->middleware('isAdmin');

// Post store
Route::post('/blog', 'PostController@store')->middleware('auth');

// Post delete
Route::delete('/blog/{id}', 'PostController@destroy')->middleware('can:admin, App\User');

// HTML pages list for Admin
Route::get('/html', 'HtmlController@index')->name('html')->middleware('can:admin, App\User');

// new HTML file create form
Route::get('/html/create', 'HtmlController@create')->middleware('can:admin, App\User');

// edit HTML file form
Route::get('/html/{filename}/edit/{saved?}', 'HtmlController@edit')->middleware('can:admin, App\User')->name('htmleditor');

// update HTML file action
Route::put('/html/{filename}', 'HtmlController@update')->middleware('can:admin, App\User');

// delete HTML file action
Route::delete('/html/{filename}', 'HtmlController@destroy')->middleware('can:admin, App\User');

// new HTML file store action
Route::post('/html', 'HtmlController@store')->middleware('can:admin, App\User');

// PDF files list view
Route::get('/pdf/index', 'PdfController@index')->middleware('can:admin, App\User');

// PDF files upload action
Route::post('/pdf/create', 'PdfController@create')->middleware('can:admin, App\User');

// PDF files delete action
Route::delete('/pdf/delete/{page}', 'PdfController@destroy')->middleware('can:admin, App\User');

// PDF page view
Route::get('/pdf/{page?}', 'PdfController@show')->name('pdf');

// User state switch action
Route::get('/users/switchstate/{id}', 'UserController@switchstate')->middleware('can:admin, App\User');

// Users list view
Route::get('/users', 'UserController@index')->name('users')->middleware('can:admin, App\User');

// User edit form
Route::get('/users/{id}', 'UserController@edit')->middleware('can:admin, App\User');

// User update form
Route::put('/users/{id}', 'UserController@update')->middleware('can:admin, App\User');

// Users delete action
Route::delete('/users/{id}', 'UserController@destroy')->middleware('can:admin, App\User');

// Password change form
Route::get('/me', 'UserController@passwd')->middleware('auth');

// Password change action
Route::put('/passwd', 'UserController@savepasswd')->middleware('auth');

// Test attempt
Route::get('/test', 'Controller@test')->name('test');

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

// HTML page view
Route::get('{page?}', 'Controller@view')->name('page');

//Language switch action
Route::get('/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');
