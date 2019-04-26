<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Fullname', 'email', 'password', 'DOB', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    function like(){
        return $this->hasMany('App\Like');
    }
    
    function comment(){
        return $this->hasMany('App\Comment');
    }
    function image(){
        return $this->hasMany('App\Image');
    }
    function follower(){
        return $this->hasMany('App\Follower');
    }
}
