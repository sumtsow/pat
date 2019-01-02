<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Photo
{
    
    // @string filename include extension
    private $basename;

    // @string path to Album directory
    private $dirname;
    
    // @string full path to file
    private $path;
    
    // @string path to file from storage root
    private $storagePath;
    
    // @string filename exclude extension
    private $filename;
    
    // @string filename exclude extension
    private $extension;
    
    // @string Album directory
    private $album;
    
    // @int file size (in kilobytes)
    private $size;
    
    // @int file last modified time
    private $lastModified;
    
    // @array valid image types
    private $types;
    
    public function __construct($album, $basename) 
    {
        $result = false;
        if(isset($basename) && isset($album)) {
            $path = '/public/img/gallery/'.$album.'/'.$basename;
            $extension = pathinfo($path)['extension'];
            $imagetypes = config('app.imagetypes');
            if(Storage::exists($path) && in_array(strtolower($extension), $imagetypes)) {
                $this->basename = $basename;
                $this->album = $album;
                $this->dirname = '/public/img/gallery/'.$album;
                $this->storagePath = $path;
                $this->path = str_replace('public', 'storage', $this->storagePath);
                $this->filename = pathinfo($this->storagePath)['filename'];
                $this->extension = $extension;
                $this->size = round(Storage::size($this->storagePath)/1024);
                $this->lastModified = Storage::lastModified($this->storagePath);
                $this->imagetypes = $imagetypes;
                $result = true;
            }
        }
        return $result;
    }

    // @property magic function __get('property')
    public function __get($property) 
    {
        return $this->$property;
    }
}
