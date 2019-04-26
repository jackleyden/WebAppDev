<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     //protected $fillable = 'product_id';
     
    function product(){
        return $this->belongsTo('App\Product');
    }
    
    function user(){
        return $this->belongsTo('App\User');
    }
    
    function like(){
        return $this->hasMany('App\Like');
    }
    
    
}
