<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Html
{
    
    // @string filename include extension
    private $basename;
    
    // @string full path to file
    private $path;
    
    // @string path to file from storage root
    private $storagePath;
    
    // @string path to file directory
    private $dir;
    
    // @string filename exclude extension
    private $filename;
    
    // @string content
    private $content;
    
    // @string pageTitle
    private $pageTitle;
    
    // @int file size (in kilobytes)
    private $size;
    
    // @int file last modified time
    private $lastModified;
    
    
    public function __construct($locale, $file = 'empty') 
    {
        $result = false;
        if(isset($locale)) {
            $locale = strtolower($locale);
            if(in_array($locale, \Config::get('app.locales'))) {
                $this->filename = $file;
                $this->basename = $file.'.html';                
                $this->dir = '/public/html/'.$locale;
                $this->storagePath = $this->dir.'/'.$this->basename;
                $this->path = str_replace('public', 'storage', $this->storagePath);
                if( Storage::exists($this->storagePath)) {
                    $this->size = round(Storage::size($this->storagePath)/1024);
                    $this->lastModified = Storage::lastModified($this->storagePath);
                    $this->content = \Storage::get($this->storagePath);
                    $row = explode("</h1>",$this->content);
                    $this->pageTitle = html_entity_decode(strip_tags(str_replace('<h1>', '', $row[0])));
                }
                else {
                    $this->size = 0;
                    $this->lastModified = 0;                
                }
                $result = true;    
            }            
        }
        return $result;
    }
    
    // @property magic function __get(property)
    public function __get($property) 
    {
        return $this->$property;
    }
    
    // create new HTML file
    public function create() 
    {
        return Storage::copy('/public/html/empty.html', $this->storagePath);
    }
    
    // @property magic function __set(property, value)
    public function __set($property, $value) 
    {
        return $this->$property = $value;
    }
    
    // update HTML file
    public function update() 
    {
        return Storage::put($this->storagePath, $this->content);
    }  
    
    // delete HTML files with same names from all locales
    public function delete() 
    {
        return Storage::delete($this->storagePath);
    }
    
    static function getAll() {
        return Storage::files('/public/html/'.app()->getLocale());
    }
}
