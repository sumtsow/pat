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
    
    // @string path to file directory
    private $dir;
    
    // @string filename exclude extension
    private $filename;
    
    // @int file size (in kilobytes)
    private $size;
    
    // @int file last modified time
    private $lastModified;
    
    public function __construct($pdffile) 
    {
        $result = false;
        if(isset($pdffile)) {
            $this->basename = $pdffile;
            $this->dir = '/public/pdf';            
            $this->storagePath = $this->dir.'/'.$pdffile;
            $this->path = str_replace('storage', 'public', $this->path);
            $this->filename = pathinfo($this->storagePath)['filename'];
            if(Storage::exists($this->storagePath)) {
                $this->size = round(Storage::size($this->storagePath)/1024);
                $this->lastModified = Storage::lastModified($this->storagePath);
            }
            else {
                $this->size = 0;
                $this->lastModified = 0;                
            }
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
        return $request->file('pdf')->storeAs($this->dir, $this->basename);
    }
    
    // Remove the PDF file from storage
    // @param string photo file name
    public function delete() 
    {
        return \Storage::delete($this->storagePath);
    }
}
