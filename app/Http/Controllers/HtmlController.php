<?php

namespace App\Http\Controllers;

use App\Html;
use Illuminate\Http\Request;

class HtmlController extends Controller
{
    /**
     * Display a listing of the HTML pages.
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
     * Show the form for creating a new HTML page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = array();
        $locales = \Config::get('app.locales');
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
        foreach(\Config::get('app.locales') as $locale) {
            $page = new Html($locale, $filename);
            $page->create();
        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Html  $html
     * @return \Illuminate\Http\Response
     */
    public function show(Html $html)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Html  $html
     * @return \Illuminate\Http\Response
     */
    public function edit(Html $html)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Html  $html
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Html $html)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Html  $html
     * @return \Illuminate\Http\Response
     */
    public function destroy(Html $html)
    {
        //
    }
}
