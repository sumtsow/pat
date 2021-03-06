<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Html;
use App\Pdf;

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
        return view('index');
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
        $file = new Html(app()->getLocale(), $page);
        if(!$file->__get('size')) {
            $file = new Html(config('app.fallback_locale'), $page);
        }
        return view('page', [
            'file' => $file,
        ]);
    }
        
    /**
     * Switch the language.
     *
     * @return \Illuminate\Http\Response
     */
    public function locale($locale = 'uk')
    {
        if (!in_array($locale, config('app.locales'))) {
            $locale = app()->getLocale();
        }
        return redirect()->back()->cookie('locale', $locale, 120); 
    }
        
    /**
     * Return searching results.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if(empty($request->search)) {
            return redirect()->back();
        }
        $results = Html::search($request->search);
        $results2 = Pdf::search($request->search);
        return view('search', [
            'results' => $results,
            'results2' => $results2,
            'search' => $request->search,
        ]);
    }
    
    /**
     * Does student's test.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        if(empty($questions = $request->questions)) {
            $questions = config('app.questions');;
        }
        $path = 'storage/html/tests/'.$request->page.'.html';
        $doc = simplexml_load_file($path);
        $total_questions = count($doc->p);
        if($questions > $total_questions) {
            $questions = $total_questions;
        }
        $questions_order = self::rand_select_from_array($questions, $total_questions);
        sort($questions_order);
        return view('test', [
            'questions' => $questions,
            'questions_order' => $questions_order,
            'doc' => $doc,
        ]);
    }
    
    static function rand_select_from_array($sel, $total) {
    
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
