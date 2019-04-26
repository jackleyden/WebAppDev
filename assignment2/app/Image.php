<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     function product(){
        return $this->belongsTo('App\Product');
    }
    
    function user(){
        return $this->belongsTo('App\User');
    }
}
