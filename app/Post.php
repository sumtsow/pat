<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Post
{
        
    // @int post id
    private $id = 0;
    
    // @int author id   
    private $author = 0;
    
    // @string post text    
    private $text = '';
    
    // @timestamp post publication time     
    private $time = 0;
    
    // @int post id of parent post; if parent is not exist 
    private $parent = 0;
    
    // @int post id of parent post; if parent is not exist set 0
    private $parent = 0;
    
    // @bool post visiblity
    private $visible = 0;
    
    // @array of string smiles
    private $smiles = [
        'biggrin'=>':))',    
        'smile'=>':)',
        'razz'=>':P)',
        'cool'=>':-)',
        'redface'=>':rf;',
        'wink'=>';))',
        'rolleyes'=>':roll;',
        'confused'=>':((',
        'eek'=>')-`',
        'cry'=>'`-(',
        'angry'=>':+(',
        'fury'=>':-(',    
    ];

    public function __construct($id = null) 
	{ 
            // Если задан $id
            if(isset($id)) {
                $data = $this->readXml();
                foreach($data as $element) {
                    if($element['id']==$id) {
                        $this->id = (isset($element['id'])) ? $element['id'] : null;
                        $this->author = (isset($element['author'])) ? $element['author'] : null;
                        $this->text = (isset($element['text'])) ? $element['text'] : null;
                        $this->time = (isset($element['time'])) ? $element['time'] : null;
                        $this->parent = (isset($element['parent'])) ? (int) $element['parent'] : null;
                        $this->visible =  (isset($element['visible'])) ? (bool) $element['visible'] : null;
                        break;
                    }
                }
                

            }
    }
    
        
    // Возвращает массив всех сообщений, т.е. читает весь файл XML
    static function readXml() {
        try {
            $xml = new Xml(self::FNAME);
            return $xml->getData();
        }
        catch (Exception $e) {
            return "Bad XML or not found";
        } 
    }   
}
