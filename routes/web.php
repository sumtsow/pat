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

Route::get('/', 'Controller@index')->name('index');

Route::get('{page?}', 'Controller@view')->name('page');

Route::get('setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

Route::get('{page?}/setlocale/{locale?}', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

