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
            if(in_array($locale, config('app.locales'))) {
                $this->filename = $file;
                $this->basename = $file.'.html';                
                $this->dir = '/public/html/'.$locale;
                $this->storagePath = $this->dir.'/'.$this->basename;
                $this->path = str_replace('public', 'storage', $this->storagePath);
                if( Storage::exists($this->storagePath)) {
                    $this->size = round(Storage::size($this->storagePath)/1024);
                    $this->lastModified = Storage::lastModified($this->storagePath);
                    $this->content = \Storage::get($this->storagePath);
                    $this->pageTitle = html_entity_decode(strip_tags(substr($this->content, 0, strpos($this->content, PHP_EOL)-1)));
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
    
    public static function getAll() {
        return Storage::files('/public/html/'.app()->getLocale());
    }
    
    public static function search($row) {
        $results = array();
        $htmlFiles = self::getAll();
        foreach($htmlFiles as $filename) {
            $htmlFile = new Html(app()->getLocale(), pathinfo($filename)['filename']);
            $haystack = strip_tags($htmlFile->content);
            mb_ereg_search_init($haystack);
            $pos = mb_ereg_search_pos($row, 'i');
            if(false !== $pos && 'navigation' !== pathinfo($filename)['filename']) {
                $found['filename'] = $filename;
                $len = 100;
                $start = ($pos[0] < $len) ? 0 : $pos[0] - $len + 1;
                $foundStr = mb_strcut($haystack, $start, $pos[1] + 2*$len);
                $foundRow = mb_strcut($haystack, $pos[0], $pos[1]);
                $replacement = '<span class="bg-dark text-light">'.$foundRow.'</span>';
                $found['string'] = str_ireplace($foundRow, $replacement, $foundStr);
                array_push($results, $found);
            }
        }
        return $results;
    }  
}
