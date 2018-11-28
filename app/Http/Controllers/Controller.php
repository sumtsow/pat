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
     * Display a page content from file.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 'index')
    {
        $locale = app()->getLocale();
        $carouselFiles = \Storage::files('/public/img/carousel');
        if($page!='index' && isset($locale)) {
            $path = '/storage/html/'.$locale.'/'.$page.'.phtml';
            $content = \Storage::get(str_replace('storage', 'public', $path));
            $row = explode("</h1>",$content);
            $pageTitle = str_replace('<h1>', '', $row[0]);
            return view('page', [
                'path' => $path,
                'carouselFiles' => $carouselFiles,
                'pageTitle' => $pageTitle,
            ]);
        }
        else {
            return view('/index', [
                'carouselFiles' => $carouselFiles,
            ]);
        }
    }
    
}
