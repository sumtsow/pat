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
    
    public function __construct($storagePath) 
    {
        $result = false;
        $this->storagePath = $storagePath;   
        $this->path = str_replace('public', 'storage', $storagePath);
        $this->dir = pathinfo($this->path)['basename'];
        if(Storage::exists($this->storagePath)) {
            $locales = \Config::get('app.locales');
            foreach($locales as $locale) {
                $titlePath = $this->storagePath.'/title_'.$locale.'.html';
                if(Storage::exists($titlePath)) {
                    $this->title[$locale] = \Storage::get($titlePath);
                }
            }
            $result = true;
        }
        return $result;
    }

    // magic function __get()
    public function __get($property) 
    {
        return $this->$property;
    }
    
    public function getPhotos() 
    {
        $files = \Storage::files($this->storagePath);
        foreach($files as $file) {
            if(pathinfo($file)['extension'] != 'html')
            $photos[] = $file;
        }
        return $photos;
    }
    
    public function getPhotosNum() 
    {
        return count($this->getPhotos());
    }
    
}
