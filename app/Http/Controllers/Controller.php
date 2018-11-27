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
    public function index($page, $lang)
    {
        $locale = config('app.locale');
        if($lang !== $locale) {
            $locale = $lang;
            config(['app.locale' => $locale]);
        }
        $path = '/storage/html/'.$locale.'/'.$page.'.phtml';
        //$content = Storage::get($path);        
        return view('page', [
            'path' => $path
        ]);
    }
}
