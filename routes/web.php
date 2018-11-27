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
    return view('index');
});

Route::get('/{page}', 'Controller@index')->name('page');

/*Route::post('/{page}', 'Controller@store')->name('lang');*/

Route::post('/{page}/setlocale/{locale?}', function (Illuminate\Http\Request $request) {
    $locale = $request->lang;
    if (in_array($locale, \Config::get('app.locales'))) {
    	Session::put('locale', $locale);      
    }
    return redirect()->back();   
});

