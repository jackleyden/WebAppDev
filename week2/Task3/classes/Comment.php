<?php
namespace wp;


class Comment {
    // build Posts
    protected $comments;
    function __construct($user,$comment){
        $this->comments = $comment;
        $this->user = $user;

    }
    
    function getComments(){ //implied
        return $this -> comments;
    }
    
    function getUser(){ //implied
        return $this -> user;
    }
}
?>