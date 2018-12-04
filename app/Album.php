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
    
    public function __construct($storagePath) 
    {
        $result = false;
        $this->storagePath = $storagePath;   
        $this->path = str_replace('public', 'storage', $storagePath);
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
        return $files = \Storage::files($this->storagePath);
    }
    
    public function getPhotosNum() 
    {
        return count($this->getPhotos());
    }
    
}
