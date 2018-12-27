<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\UpdateAlbum;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class AlbumController extends BaseController
{
    
    /**
     * Display a listing of the Albums.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = array();
        $dirs = Storage::directories('/public/img/gallery');
        foreach($dirs as $dir) {
            $albums[] = new Album(pathinfo($dir)['basename']);
        }
        return view('gallery', [
            'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create', [
            'album' => new Album(),
            'locales' => \Config::get('app.locales'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $dir
     * @return \Illuminate\Http\Response
     */
    public function show($dir)
    {
        $album = new Album($dir);
        return view('album.show', [
            'album' => $album,
            'photos' => $album->getPhotos(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $dir
     * @return \Illuminate\Http\Response
     */
    public function edit($dir)
    {
        return view('album.edit', [
            'album' => new Album($dir),
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
        $album = new Album($dir);
        $locales = \Config::get('app.locales');
        foreach($locales as $locale) {
            $album->setTitle($locale, $request->$locale);
        }
        return redirect('/gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  sting  $dir
     * @return \Illuminate\Http\Response
     */
    public function destroy($dir)
    {
        $album = new Album($dir);
        $album->delete();
        return redirect('/gallery');
    }

    /**
     * Remove the photo from Album storage.
     *
     * @param  sting  $dir, $photo
     * @return \Illuminate\Http\Response
     */
    public function delete($dir, $photo)
    {
        $album = new Album($dir);
        $album->rmPhoto($photo);
        return redirect('/gallery/'.$album->__get('dir'));
    }

    /**
     * Create new Photo in Album storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhoto $request)
    {
        $album = new Album($request->dir);
        $album->addPhoto($request);
        return redirect('/gallery/'.$album->__get('dir'));
    }
    
}
