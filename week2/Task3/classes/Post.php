<?php
use wp\Comment;
require_once('Comment.php');

class Post {
    // build Posts
    protected $user;
    protected $message;
    protected $comments;
    protected $Date;
    protected $image;
    
    function __construct($user, $message, $Date, $img){
        // assign values
        $this -> user = $user;
        $this -> message = $message;
        $this -> Date = $Date;
        $this -> image = $img;
         $this -> comments = array();
        
    }
    
    function getUser(){ //implied
        return $this -> user;
    }
    
    function getDate(){//implied
        return $this -> Date;
    }
    
    function getImg(){//implied
        return $this -> image;
    }
    
    function getMessage(){//implied
        return $this -> message;
    }
    
    
    function getComments(){//implied
        return $this -> comments;
    } 
    
     function addComment($user, $comment){//implied
       
        $this->comments[] =  new Comment($user, $comment);
    }
}






?>