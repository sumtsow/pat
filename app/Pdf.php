<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePdf;

class Pdf
{
    
    // @string filename include extension
    private $basename;
    
    // @string full path to file
    private $path;
    
    // @string path to file from storage root
    private $storagePath;
    
    // @string filename exclude extension
    private $filename;
    
    // @int file size (in kilobytes)
    private $size;
    
    // @int file last modified time
    private $lastModified;
    
    public function __construct($pdffile) 
    {
        $result = false;
        // && Storage::exists('/public/pdf/'.$pdffile);
        if(isset($pdffile)) {
            $this->basename = $pdffile;
            $this->path = '/public/pdf/'.$pdffile;
            $this->storagePath = str_replace('public', 'storage', $this->path);
            $this->filename = pathinfo($this->path)['filename'];
            $this->size = round(Storage::size($this->path)/1024);
            $this->lastModified = Storage::lastModified($this->path);
            $result = true;
        }
        return $result;
    }

    // @property magic function __get('property')
    public function __get($property) 
    {
        return $this->$property;
    }
   
    // Add new pdf file
    // @param  \Illuminate\Http\Request  $request
    public function addFile(CreatePdf $request) 
    {
        $filename = $request->file('pdf')->getClientOriginalName();
        return $request->file('pdf')->storeAs($this->storagePath, $filename);
    }
}
