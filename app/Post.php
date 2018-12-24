<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * Set the Model table name
    *
    * @var string
    */
    protected $table = 'post';
    
    /**
    * Формат хранения столбцов с датами модели.
    *
    * @var string
    */
  
    // @User the Post owner
    public function user() {
        return $this->belongsTo('\App\User', 'id_user');
    }
        
    static function my_mb_ucfirst($str) {
        $fc = mb_strtoupper(mb_substr($str, 0, 1));
        return $fc.mb_substr($str, 1);
    }
}
