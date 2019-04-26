<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['name'];
    
    function products(){
        return $this->hasMany('App\Product');
    }
}
