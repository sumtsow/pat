<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        
    /**
     * Display a main page content
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carouselFiles = \Storage::files('/public/img/carousel');
        return view('index', [
            'carouselFiles' => $carouselFiles,
        ]);
    }
    
    /**
     * Display a page content from file.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($page = 'index')
    {
        if(!isset($page)) {
            return redirect('/');
        }
        $locale = app()->getLocale();
        $carouselFiles = \Storage::files('/public/img/carousel');
        $path = '/storage/html/'.$locale.'/'.$page.'.html';
        $exists = Storage::exists(str_replace('storage', 'public', $path));
        if(!$exists) {
            $path = '/storage/html/'.\Config::get('app.fallback_locale').'/'.$page.'.html';
        }
        $content = \Storage::get(str_replace('storage', 'public', $path));
        $row = explode("</h1>",$content);
        $pageTitle = str_replace('<h1>', '', $row[0]);
        return view('page', [
            'path' => $path,
            'carouselFiles' => $carouselFiles,
            'pageTitle' => $pageTitle,
        ]);
    }
    
        
    /**
     * Switch the language.
     *
     * @return \Illuminate\Http\Response
     */
    public function locale($page = 'index', $locale = 'ua')
    {
        if (in_array($page, \Config::get('app.locales'))) {
            return redirect('/')->cookie('locale', $page, 120);
        }
        if (!in_array($locale, \Config::get('app.locales'))) {
            $locale = app()->getLocale();
        }
        return redirect('/'.$page)->cookie('locale', $locale, 120); 
    }
    
}
