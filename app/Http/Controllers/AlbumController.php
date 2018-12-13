<?php

namespace App\Http\Controllers;

use App\Album;
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
        $dirs = \Storage::directories('/public/img/gallery');
        foreach($dirs as $dir) {
            $albums[] = new \App\Album($dir);
        }
        $user = Auth::user();
        return view('gallery', [
            'carouselFiles' => \Storage::files('/public/img/carousel'),
            'albums' => $albums,
            'user' => $user,
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
    public function show($path)
    {
        $photos = array();
        $album = new \App\Album('/public/img/gallery/'.$path);
        if($album) {
            $photos = $album->getPhotos();
        }
        return view('album.show', [
            'carouselFiles' => \Storage::files('/public/img/carousel'),
            'album' => $album,
            'photos' => $photos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($path)
    {
        $album = new \App\Album('/public/img/gallery/'.$path);
        return view('album.edit', [
            'carouselFiles' => \Storage::files('/public/img/carousel'),
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $album)
    {
        $company = \App\Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->website = $request->website;
        $company->logo = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('public', $company->logo);
        $company->save();
        
        return redirect('company');
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
