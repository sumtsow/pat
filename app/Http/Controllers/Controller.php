<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $locale = app()->getLocale();
        if(isset($page) && isset($locale)) {
            return view('page', [
                'path' => '/storage/html/'.$locale.'/'.$page.'.phtml'
            ]);
        }
        else {
            return view('/index');
        }

    }
    
    /**
     * Switch the language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $page
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $page = 'history')
    {
        $locale = $request->lang;
        if (in_array($locale, \Config::get('app.locales'))) {
            //\Session::put('locale', $locale);
            session(['locale' => $locale]);
        }
        return redirect()->back(); 
    }
    
}
