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

Route::get('/{page?}/setlocale/{locale?}', function ($page, $locale) {
    
    if (in_array($locale, \Config::get('app.locales'))) {
        //$newlocale = $locale;
        app()->setLocale($locale);
    	//Session::put('locale', $newlocale);
        //response($content);
        //return redirect()->back()->header('Content-Type', 'text/html')->cookie('locale', $newlocale, 10);
        //session(['locale' => $locale]);
        //$request->session()->flash('locale', $locale);
        //$request->session()->keep(['locale', $locale]);
        //return redirect()->back()->with('locale', $newlocale);
    }
    return redirect($page)->with('locale', $locale);    
});

