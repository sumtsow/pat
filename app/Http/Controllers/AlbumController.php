<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\UpdateAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = array();
        $dirs = \Storage::directories('/public/img/gallery');
        foreach($dirs as $dir) {
            $albums[] = new \App\Album($dir);
        }
        return view('gallery', [
            'albums' => $albums,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dir)
    {
        $album = new Album('/public/img/gallery/'.$dir);
        return view('album.show', [
            'album' => $album,
            'photos' => $album->getPhotos(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dir)
    {
        return view('album.edit', [
            'album' => new \App\Album('/public/img/gallery/'.$dir),
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $dir
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbum $request, $dir)
    {
        $album = new \App\Album('/public/img/gallery/'.$dir);
        $locales = \Config::get('app.locales');
        foreach($locales as $locale) {
            $album->title[$locale] = $request->$locale;
            //$album->save();          
        }
        return redirect('gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
