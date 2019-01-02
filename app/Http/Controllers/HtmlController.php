<?php

namespace App\Http\Controllers;

use App\Html;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateHtml;

class HtmlController extends Controller
{
    /**
     * Display a listing of the HTML files.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('html.index', [
            'files' => Html::getAll(),
        ]);
    }

    /**
     * Show the form for creating a new HTML file.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = array();
        $locales = config('app.locales');
        foreach($locales as $locale) {
            $files[$locale] = new Html($locale);
        }
        return view('html.create', [
            'files' => $files,
        ]);
    }

    /**
     * Store a newly created HTML file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = $request->file;
        foreach(config('app.locales') as $locale) {
            $page = new Html($locale, $filename);
            $page->create();
        }
        return redirect('home');
    }

    /**
     * Show the form for editing the specified HTML file.
     *
     * @param  string $filename
     * @param  string $saved
     * @return \Illuminate\Http\Response
     */
    public function edit($filename, $saved = null)
    {
        if(!isset($saved)) {
            $saved = false;
        }
        return view('html.edit', [
            'file' => new Html(app()->getLocale(),$filename),
        ])->with('saved', $saved);
    }

    /**
     * Update the specified HTML file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHtml $request, $filename)
    {
        $file = new Html(app()->getLocale(),$filename);
        $file->__set('content', $request->content);
        $file->update();
        return redirect('/html/'.$filename.'/edit/true');
    }

    /**
     * Remove the specified HTML file from storage.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function destroy($filename)
    {
        foreach(config('app.locales') as $locale) {
            $page = new Html($locale, $filename);
            if($page->__get('lastModified')) {
                $page->delete();
            }
        }
        return redirect('html');
    }
}
