<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\UpdateAlbum;
use App\Http\Requests\CreatePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\LengthAwarePaginator;

class AlbumController extends BaseController
{
    
    /**
     * Display a listing of the Albums.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = array();
        $page = (isset($_REQUEST['page'])) ? (int) $_REQUEST['page'] : 1;
        $page--;
        foreach(Storage::directories('/public/img/gallery') as $dir) {
            $album = new Album(pathinfo($dir)['basename']);
            $photos = array_merge($photos, $album->getPhotos());
        }
        $pnum = config('app.photo_paginate');
        $filenum = count($photos);        
        $arr = array_chunk($photos, $pnum);
        $paginator = new LengthAwarePaginator($arr[$page], $filenum, $pnum);
        return view('photos', [
            'photos' => $paginator->withPath('/photos'),
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
            'locales' => config('app.locales'),
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
        $locales = config('app.locales');
        foreach($locales as $locale) {
            $album->setTitle($locale, $request->$locale);
        }
        return redirect()->route('gallery');
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
        return redirect()->route('gallery');
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
        return redirect()->route('gallery');
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
        return redirect()->route('gallery');
    }
    
}
