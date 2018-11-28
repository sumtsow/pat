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

Route::get('/{page?}/setlocale/{locale?}', function ($page = 'index', $locale = 'ua') {
    if (!in_array($locale, \Config::get('app.locales'))) {
        $locale = app()->getLocale();
    }
    return redirect('/'.$page)->cookie('locale', $locale, 120);;    
});

Route::get('/{page?}', 'Controller@index')->name('page');
