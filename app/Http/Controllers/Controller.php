<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
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
    
    /**
     * View PDF File.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf($page)
    {
        return response()->file('storage/pdf/'.$page);
    }
    
    /**
     * Does student's test.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        $locale = app()->getLocale();
        if(empty($questions = $request->questions)) {
            $questions = 30;
        }
        $carouselFiles = \Storage::files('/public/img/carousel');
        $path = 'storage/html/'.$locale.'/test.html';
        $doc = simplexml_load_file($path);
        $total_questions = count($doc->p);
        if($questions>$total_questions) {
            $questions = $total_questions;
        }
        $questions_order = self::rand_select_from_array($questions, $total_questions);
        sort($questions_order);
        return view('test', [
            'questions' => $questions,
            'questions_order' => $questions_order,
            'doc' => $doc,
            'carouselFiles' => $carouselFiles,
        ]);
    }
    
    static function rand_select_from_array($sel,$total) {
    
        if($sel > $total || $sel < 1 || $total < 1) {
            $result = false;        
        }
        else {
            $result = array();
            for($i = 0; $i < $sel; $i++) {
                do {
                    $current = rand(1, $total);
                }
                while(in_array($current, $result));
                $result[$i] = $current;
            }
        }
        return $result;
    }
}
