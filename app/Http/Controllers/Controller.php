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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 'index')
    {
        $locale = app()->getLocale();
        $carouselFiles = \Storage::files('/public/img/carousel');
        if($page!='index' && isset($locale)) {
            return view('page', [
                'path' => '/storage/html/'.$locale.'/'.$page.'.phtml',
                'carousel' => $carouselFiles,
            ]);
        }
        else {
            return view('/index', [
                'carousel' => $carouselFiles,
            ]);
        }
    }
    
}
