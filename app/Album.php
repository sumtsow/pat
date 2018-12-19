<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePhoto;

class Album
{
    // @string path to Album directory from site root
    private $path;
    
    // @string path to Album directory in Storage directory
    private $storagePath;
    
    // @string array Album title, keys are locale's names, e.g. 'en', 'ua', 'ru'
    private $title;
    
    // @string Album directory
    private $dir;
    
    public function __construct($dir = null) 
    {
        if(isset($dir)) {
            $this->dir = $dir;            
        }
        else {
            self::newName();
        }
        $locales = \Config::get('app.locales');
        $this->storagePath = '/public/img/gallery/'.$this->dir; 
        $this->path = '/storage/img/gallery/'.$this->dir;
        foreach($locales as $locale) {
            $titlePath = $this->storagePath.'/title_'.$locale.'.html';
            if(Storage::exists($titlePath)) {
                $this->title[$locale] = \Storage::get($titlePath);
            }
            else {
                $this->title[$locale] = '';
            }        
        }
        return true;
    }

    // @property magic function __get('property')
    public function __get($property) 
    {
        return $this->$property;
    }
    
    // Create new Album directory name
    public function newName() 
    {
        $i = 1;
        $dir = 'album'.$i;
        while(Storage::exists('/public/img/gallery/'.$dir)) {
            $i++;
            $dir = 'album_'.$i;
        }
        $this->dir = $dir;
        return $this->dir;
    }
    
    // WRite Album title to file
    public function setTitle($locale, $value) 
    {
        return \Storage::put($this->storagePath.'/title_'.$locale.'.html', $value);
    }
    
    // Return array of photos
    public function getPhotos() 
    {
        $photos = array();
        $files = \Storage::files($this->storagePath);
        if(isset($files)) {
            foreach($files as $file) {
                $photo = new Photo($this->dir, pathinfo($file)['basename']);
                if($photo->__get('basename')) {
                    $photos[] = $photo;
                }
            }            
        }
        return $photos;
    }
    
    // Return number of photos in the Album
    public function getPhotosNum()
    {
        return count($this->getPhotos());
    }
    
    // Delete the Album
    public function delete() 
    {
        return \Storage::deleteDirectory($this->storagePath);
    }
    
    // Add new photo to Album
    // @param  \Illuminate\Http\Request  $request
    public function addPhoto(CreatePhoto $request) 
    {
        $filename = $request->file('photo')->getClientOriginalName();
        return $request->file('photo')->storeAs($this->storagePath, $filename);
    }
    
    // Remove the photo from Album
    // @param string photo file name
    public function rmPhoto($photo) 
    {
        return \Storage::delete($this->storagePath.'/'.$photo);
    }    
}
