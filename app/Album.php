<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
        $this->path = str_replace('public', 'storage', $this->storagePath);
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
    
    // create new Album directory name
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
    
    // write Album title to file
    public function setTitle($locale, $value) 
    {
        return \Storage::put($this->storagePath.'/title_'.$locale.'.html', $value);
    }
    
    // return array of photos
    public function getPhotos() 
    {
        $photos = array();
        $files = \Storage::files($this->storagePath);
        if(isset($files)) {
            foreach($files as $file) {
                if(pathinfo($file)['extension'] != 'html')
                $photos[] = $file;
            }            
        }
        return $photos;
    }
    
    // return number of photos in the Album
    public function getPhotosNum() 
    {
        return count($this->getPhotos());
    }
    
    // delete the Album
    public function delete() 
    {
        return \Storage::deleteDirectory($this->storagePath);
    }
    
}
